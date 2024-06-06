<?php
$host = "localhost";
$user = "root";
$pass = "loogin"; // Make sure this is your actual MySQL password
$db = "register"; // Replace with your actual database name

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Failed to connect to DB: " . $conn->connect_error);
} else {
    echo "Connection successful";
}

?>

