<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

$email = $_SESSION['email'];
$coins = $_SESSION['coins'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to the Blockchain Game</h1>
        <p>Hello, <?php echo htmlspecialchars($email); ?>!</p>
        <p>Total Coins: <span id="coin-counter"><?php echo htmlspecialchars($coins); ?></span></p>
        <a href="logout.php">Logout</a>
    </div>
    <script>
        // Pass PHP variable to JavaScript
        var totalCoins = <?php echo json_encode($coins); ?>;
    </script>
    <script src="script.js"></script>
</body>
</html>

