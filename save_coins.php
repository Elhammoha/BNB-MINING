<?php
session_start();
include 'conect.php'; // Ensure this includes the database connection

if (isset($_POST['coins'])) {
    $coins = $_POST['coins'];
    $username = $_SESSION['username']; // Assuming username is stored in the session after login

    // Update the user's coins in the database
    $stmt = $conn->prepare("UPDATE users SET coins = ? WHERE username = ?");
    $stmt->bind_param("ds", $coins, $username);

    if ($stmt->execute()) {
        echo "Coins updated successfully";
    } else {
        echo "Error updating coins: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
