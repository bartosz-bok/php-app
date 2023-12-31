<?php

require 'vendor/autoload.php'; // Dodanie biblioteki PHP-JWT
use ReallySimpleJWT\Token;

$servername = "mysql";
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

    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Sprawdzenie hasza hasła z bazy danych
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            // Generate a token
            $secret = 'sec!ReT423*&';
            $expiration = time() + 3600;
            $issuer = 'localhost';

            $token = Token::create($username, $secret, $expiration, $issuer);
            echo json_encode(["status" => "success", "access_token" => $token]);

        } else {
            header('HTTP/1.0 404 Not Found');
            echo json_encode(["status" => "bad username / bad password"]);
        }
    } else {
        echo json_encode(["status" => "failed"]);
    }
}

elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['new_password']) &&
    $_POST['event_type'] === 'change_password' && isset($_POST['access_token'])){

    $token = $_POST['access_token'];
    $secret = 'sec!ReT423*&';

    $token_result = Token::validate($token, $secret);

    if ($token_result===true) {
        $username = $_POST['username'];
        $new_password = $_POST['new_password'];

        // Haszowanie nowego hasła
        $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET password = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $hashed_new_password, $username);
    }

    if ($stmt->execute()) {
        echo "Hasło dla użytkownika '$username' zostało zaktualizowane.";
    } else {
        echo "Błąd podczas aktualizacji hasła: " . $stmt->error;
    }
    $stmt->close();
}
elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['event_name']) && isset($_POST['start_date']) &&
    isset($_POST['end_date']) && isset($_POST['description']) && isset($_POST['image_url']) &&
    isset($_POST['category_id']) && $_POST['event_type'] === 'add_event' && isset($_POST['access_token'])){

    $token = $_POST['access_token'];
    $secret = 'sec!ReT423*&';

    $token_result = Token::validate($token, $secret);

    if ($token_result===true) {

        // Dane z formularza
        $event_name = $_POST['event_name'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $description = $_POST['description'];
        $image_url = $_POST['image_url'];
        $category_id = intval($_POST['category_id']); // zmiana na liczbę całkowitą

        // Zapytanie SQL do wstawienia danych do tabeli events
        $sql = "INSERT INTO events (event_name, start_date, end_date, description, image_url, category_id) 
            VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sssssi", $event_name, $start_date, $end_date, $description, $image_url, $category_id);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "Nowe wydarzenie zostało dodane pomyślnie.";
            } else {
                echo "Błąd podczas dodawania wydarzenia: " . $conn->error;
            }
        } else {
            echo "Błąd przygotowania zapytania.";
        }
    }
}
elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['event_name']) && isset($_POST['start_date']) &&
    isset($_POST['end_date']) && isset($_POST['description']) && isset($_POST['image_url']) &&
    isset($_POST['category_id']) && isset($_POST['event_id']) && $_POST['event_type'] === 'change_event'
    && isset($_POST['access_token'])){

    $token = $_POST['access_token'];
    $secret = 'sec!ReT423*&';

    $token_result = Token::validate($token, $secret);

    if ($token_result===true) {

        // Dane z formularza
        $event_name = $_POST['event_name'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $description = $_POST['description'];
        $image_url = $_POST['image_url'];
        $category_id = intval($_POST['category_id']); // zmiana na liczbę całkowitą
        $event_id = intval($_POST['event_id']); // zmiana na liczbę całkowitą

        $sql = "UPDATE events 
        SET event_name = ?, start_date = ?, end_date = ?, description = ?, image_url = ?, category_id = ?
        WHERE id = ?";
        $stmt = $conn->prepare($sql);



        if ($stmt) {
            $stmt->bind_param("sssssii", $event_name, $start_date, $end_date, $description, $image_url, $category_id, $event_id);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "Nowe wydarzenie zostało zmienione pomyślnie.";
            } else {
                echo "Błąd podczas edycji wydarzenia: " . $conn->error;
            }
        } else {
            echo "Błąd przygotowania zapytania.";
        }
    }
}
elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['event_id']) && $_POST['event_type'] === 'delete_event'
    && isset($_POST['access_token'])){

    $token = $_POST['access_token'];
    $secret = 'sec!ReT423*&';

    $token_result = Token::validate($token, $secret);

    if ($token_result === true) {

        // ID wydarzenia do usunięcia
        $event_id = intval($_POST['event_id']); // zmiana na liczbę całkowitą

        $sql = "DELETE FROM events WHERE id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("i", $event_id);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "Wydarzenie zostało usunięte pomyślnie.";
            } else {
                echo "Błąd podczas usuwania wydarzenia: " . $conn->error;
            }
        } else {
            echo "Błąd przygotowania zapytania.";
        }
    }
}
elseif ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['event_name'] === 'display_events'){
    $sql = "SELECT * FROM events";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

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
