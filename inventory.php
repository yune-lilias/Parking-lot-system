<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Car Inventory</title>
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
            <h3>Cars</h3>
            <?php
            include 'model.php';
            $model = new model();

            $sql = "SELECT * FROM Cars";
            $result = $model->sqlcommend($sql);

            $carname = [];
            $carprice = [];
            $carid = [];
            if (!empty($result)) {
                // output data of each row

                echo "<table class='table-inline'><tr><th>Car Name</th><th>Type</th><th>Seats</th><th>Price</th></tr>";
                foreach ($result as $key => $value) {
                    $row = $value;
                    $id = $row["cars_id"];
                    $car = $row["carname"];
                    $type = $row["cartype"];
                    $seats = $row["seats"];
                    $price = $row["price"];
                    array_push($carname, $car);
                    array_push($carprice, $price);
                    array_push($carid, $id);
                    echo "<tr><td>" . $car . "</td><td>" . $type . "</td><td>" . $seats . "</td><td>" . $price . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            ?>
        </div>
        <div class="inline">
        <h2>Choose a Car</h2>
            <form action="addtocart.php" method="post">
                <?php
                echo "<label for='car'>Car Name</label>";
                echo "<select id='car' name='car'>";
                for ($i = 0; $i < sizeof($carname); $i++) {
                    echo "<option value='$carname[$i]'>$carname[$i]</option>";
                }
                echo "</select>";
                ?>
                 <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>

</html>