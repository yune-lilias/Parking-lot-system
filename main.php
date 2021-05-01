<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <title>Main Page</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    $sql = "CREATE DATABASE mydb";
    if (mysqli_query($conn, $sql)) {
        echo "Database created successfully<br>";
    } else {
        echo "Error creating database: " . mysqli_error($conn) . "<br>";
    }
    mysqli_select_db ( $conn , "mydb" );
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }    
    ?>
        
    <div id="main">
        <div id="banner-r">
        <ul>
            <li><a href = "login.php">Login</a></li>
            <li><a href = "register.php">Register</a></li>
        </ul>
        </div>
    </div>
    <div id="banner-l">
            <h1>Welcome!</h1>
        </div>
    
    </body>

</html>