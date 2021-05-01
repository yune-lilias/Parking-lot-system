<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Your Profile</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div id="navbar">
        <ul>
            <li><a href="menu.php">Home</a></li>
            <li><a href="profile.php">My Profile</a></li>
            <li><a href="inventory.php">Rent a Car</a></li>
            <li><a href="parking.php">Pre-Pay for Parking</a></li>
            <li><a href="viewcart.php">My Cart</a></li>
        </ul>
    </div>
    <div id="profile-page">
        <div class="center">
            <?php
            echo "<h1>Hello, " . $_COOKIE['name'] . "</h1>"
            ?>
            <h2>Display order data here</h2>
            <?php

            ?>
        </div>
    </div>
</body>

</html>