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
    ?>
    <div id="navbar">
        <ul>
            <li><a href="menu.php">Home</a></li>
            <li><a href="profile.php">My Profile</a></li>
            <li><a href="inventory.php">Rent a Car</a></li>
            <li><a href="parking.php">Pre-Pay for Parking</a></li>
            <li><a href="viewcart.php">My Cart</a></li>
        </ul>
    </div>
    <div>
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
        
        $sql = "SELECT * FROM cars";
        $result = $conn->query($sql);
        echo "<h3>Cars</h3>";
        if ($result->num_rows > 0) {
            // output data of each row
            echo "<table><tr><th>Cars</th><th>Type</th><th>Seats</th><th>Cost</th></tr>";
            while ($row = $result->fetch_assoc()) {
                $carname = $row["carname"];
                $cartype = $row["cartype"];
                $seats = $row["seats"];
                $price = $row["price"];


                echo "<tr><td>" . $carname . "</td><td>" . $cartype . "</td><td>" . $seats . "</td><td>" . $price . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
        <form action="addtocart.php" method="post">

        </form>
    </div>
</body>

</html>