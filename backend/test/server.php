<?php
$servername = "127.0.0.1";
$username = "user";
$password = "password";
$dbname = "db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['event_type'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $event_type = $_POST['event_type'];

    if ($event_type === 'login') {
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            echo "Zalogowano";
        } else {
            echo "Błąd logowania";
        }
    }
}

elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['new_password']) && isset($_POST['event_type'])){
    $username = $_POST['username'];
    $new_password = $_POST['new_password'];
    $event_type = $_POST['event_type'];

    if ($event_type === "change_password") {
        // Aktualizacja hasła w bazie danych dla użytkownika 'admin'
        $sql = "UPDATE users SET password = ? WHERE username = 'admin'";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $new_password); // "s" oznacza typ zmiennej (string)

        if ($stmt->execute()) {
            echo "Hasło dla użytkownika 'admin' zostało zaktualizowane.";
        } else {
            echo "Błąd podczas aktualizacji hasła: " . $stmt->error;
        }

        $stmt->close();
    }

}
else {
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
