<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Car Invetory</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydb";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //Create tables to check registered users
    $sql = "CREATE TABLE users (
                name VARCHAR(255), 
                password VARCHAR(255)
                )";

    if (mysqli_query($conn, $sql)) {
        echo "Table USERS created successfully<br>";
    } else {
        echo "Error creating table users: " . mysqli_error($conn) . "<br>";
    }

    //Create table holding orders made by users
    $sql = "CREATE TABLE orders (
        username VARCHAR(255), 
        item VARCHAR(255),
        price VARCHAR(10)
        )";

    if (mysqli_query($conn, $sql)) {
        echo "Table orders created successfully<br>";
    } else {
        echo "Error creating table orders: " . mysqli_error($conn) . "<br>";
    }

    //Create shopping cart table to store everything added to cart
    $sql = "CREATE TABLE cart ( 
                    item VARCHAR(255),
                    price VARCHAR(10)
                    )";

    if (mysqli_query($conn, $sql)) {
        echo "Table CART created successfully<br>";
    } else {
        echo "Error creating table cart: " . mysqli_error($conn) . "<br>";
    }
    
    //Create table for the car inventory
    $sql = "CREATE TABLE cars (
        carname VARCHAR(255), 
        cartype VARCHAR(255),
        seats INT(2),
        price VARCHAR(10)
        )";

        if(mysqli_query($conn, $sql)){
            echo "Table cars created successfully<br>";
        } else {
            echo "Error creating table cars: " . mysqli_error($conn). "<br>";
        }
    //Add cars to table
    $sql = "INSERT INTO cars (carname, cartype, seats, price)
            VALUES
                ('Chrysler 300', 'Luxury', '5', '205'),
                ('Nissan Rogue', 'SUV', '5', '95'),
                ('Dodge Grand Caravan', 'Mini-Van', '7', '175'),
                ('Chevrolet Malibu', 'Fullsize', '5', '87'),
                ('Volkswagon Jetta', 'Standard', '5', '127')";
    if ($conn->query($sql) === TRUE) {
        echo "Successfully saved";
    } else {
        echo "Error: Failed to be saved" . $sql . "<br>" . $conn->error;
    }
    ?>
</body>

</html>