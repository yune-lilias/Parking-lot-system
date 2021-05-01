<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Parking Spaces</title>
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
    
    <div class="flexbox">
        <div class="inline">
        <h3>Parking Spaces available</h3>
            <?php
            $username = 'root';
            $password = '';
            $dbName = 'project4';
            $dbHost = "35.222.85.157";
            // Create connection

            $conn = mysqli_connect($dbHost, $username, $password, $dbName);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $lot_array = [];
            $price_array = [];
            $avail_array = [];
            $vip_array = [];

            $sql = "SELECT * FROM Lots";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row

                echo "<table class='table-inline'><tr><th>Parking Space</th><th>Availability</th><th>VIP Status</th><th>Price</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    $lot = $row["lots_id"];
                    $price = $row["price"];
                    $avail = $row["is_available"];
                    $vip = $row["is_vip"];

                    array_push($lot_array, $lot);
                    array_push($price_array, $price);
                    array_push($avail_array, $avail);
                    array_push($vip_array, $vip);
                    echo "<tr><td>" . $lot . "</td><td>" . $avail . "</td><td>" . $vip . "</td><td>" . $price . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }

            $conn->close();
            ?>
        </div>
        <div class="inline">
        <h2>Choose a Parking Lot</h2>
            <form action="addtocart.php" method="post">
                <?php
                echo "<label for='parking'>Parking Lot Number</label>";
                echo "<select id='parking' name='parking'>";
                for ($i = 1; $i < sizeof($avail_array) + 1; $i++) {
                    $check = $avail_array[$i];
                    if ($check == 1) {
                        echo "<option value='$i'>$i</option>";
                    }
                }
                echo "</select>";
                ?>
                <label for="days">Duration of Rental:</label>
                 <input type="number" id="days" name="days" max="30">
                 <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>

</html>