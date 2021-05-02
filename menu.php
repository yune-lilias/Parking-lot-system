<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <title>Home Page</title>
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
            <div id="main-content">
                <div id="banner-l">
                    <?php
                        echo "<h1>Welcome USER</h1>";
                        //Let's try to output the name of whoever logged in
                    ?>
                </div>
                <div id="banner-r">
                    <ul>
                        <li><a href="invetory.php">Rent a Car</a></li>
                        <li><a href="">Pre-Pay for Parking</a></li>
                    </ul>
                </div>
            </div>
    </body>

</html>
