<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blockchain Game</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="background"></div>
    <div id="game-container">
        <div id="logo-container">
            <img src="images/baby_donkey_logo.png" alt="Baby Donkey Logo" id="baby-donkey-logo">
        </div>
        <div id="coin-counter">Total Coins: 0.0000</div>
        <audio id="coin-sound" src="https://freesound.org/data/previews/337/337049_3233960-lq.mp3"></audio>
        
        <div id="login-register-container">
            <div id="login-form">
                <h2>Login</h2>
                <form action="login.php" method="post">
                    <input type="text" name="username" id="login-username" placeholder="Username">
                    <input type="password" name="password" id="login-password" placeholder="Password">
                    <button type="submit" id="login-button">Login</button>
                </form>
            </div>

            <div id="register-form">
                <h2>Register</h2>
                <form action="register.php" method="post">
                    <input type="text" name="firstname" id="register-firstname" placeholder="First Name">
                    <input type="text" name="lastname" id="register-lastname" placeholder="Last Name">
                    <input type="email" name="email" id="register-email" placeholder="Email">
                    <input type="password" name="password" id="register-password" placeholder="Password">
                    <button type="submit" id="register-button">Register</button>
                </form>
            </div>
        </div>
    </div>

    <div id="actions-container">
        <button id="youtube-subscribe">Subscribe to YouTube</button>
        <button id="telegram-join">Join Telegram</button>
        <button id="referral">Referral</button>
    </div>

    <script src="script.js"></script>
</body>
</html>


