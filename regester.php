<?php
include 'conect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $username = strtolower($firstName . $lastName . substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, 6));

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Email address already exists!";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, password, username, coins) VALUES (?, ?, ?, ?, ?, 0)");
        $stmt->bind_param("sssss", $firstName, $lastName, $email, $password, $username);

        if ($stmt->execute()) {
            echo "Registration successful";
        } else {
            echo "Error: " . $conn->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>


