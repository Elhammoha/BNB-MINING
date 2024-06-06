<?php
session_start();
include 'conect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Use the same hashing method as in registration

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        $_SESSION['coins'] = $row['coins'];
        echo "Login successful";
    } else {
        echo "Invalid username or password";
    }

    $stmt->close();
    $conn->close();
}
?>
