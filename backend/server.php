<?php
$servername = "127.0.0.1";
$username = "user";
$password = "password";
$dbname = "db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])
    && $_POST['event_type'] == 'login'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Haszowanie hasła przed zapytaniem
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Sprawdzenie hasza hasła z bazy danych
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            echo "Zalogowano";
        } else {
            echo "Błąd logowania";
        }
    } else {
        echo "Błąd logowania";
    }
}

elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['new_password']) &&
    $_POST['event_type'] === 'change_password'){
    $username = $_POST['username'];
    $new_password = $_POST['new_password'];

    // Haszowanie nowego hasła
    $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

    $sql = "UPDATE users SET password = ? WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $hashed_new_password, $username);

    if ($stmt->execute()) {
        echo "Hasło dla użytkownika '$username' zostało zaktualizowane.";
    } else {
        echo "Błąd podczas aktualizacji hasła: " . $stmt->error;
    }

    $stmt->close();
}
elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['event_name']) && isset($_POST['start_date']) &&
    isset($_POST['end_date']) && isset($_POST['description']) && isset($_POST['image_url']) &&
    isset($_POST['category_id']) && $_POST['event_type'] === 'add_event'){

    $event_name = $_POST['event_name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];
    $category_id = $_POST['category_id'];

    // Zapytanie SQL do wstawienia danych do tabeli events
    $sql = "INSERT INTO events (event_name, start_date, end_date, description, image_url, category_id) 
            VALUES ('$event_name', '$start_date', '$end_date', '$description', '$image_url', $category_id)";

    if ($conn->query($sql) === TRUE) {
        echo "Nowe wydarzenie zostało dodane pomyślnie.";
    } else {
        echo "Błąd podczas dodawania wydarzenia: " . $conn->error;
    }

}
elseif ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['event_name'] === 'display_events'){
    $sql = "SELECT * FROM events";
    $result = $conn->query($sql);

    $events = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $events[] = $row;
        }
    }

    echo json_encode($events);
}

$conn->close();
?>
