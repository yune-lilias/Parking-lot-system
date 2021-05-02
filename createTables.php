<?php
include 'model.php';
$model = new model();

$sql = "UPDATE Lots SET is_available = '1'WHERE lots_id = 6";
$model->sqlcommend($sql);


$username = 'root';
$password = '';
$dbName = 'project4';
$dbHost = "35.222.85.157";
$conn = mysqli_connect($dbHost, $username, $password, $dbName);
 /*   
$sql = "DELETE FROM Orders_lots";
    if (mysqli_query($conn, $sql)) {
        echo "Table cleared<br>";
    } else {
        echo "Error creating database: " . mysqli_error($conn) . "<br>";
    }*/
    $sql = "SELECT * FROM Orders_lots";
            $result = $model->sqlcommend($sql);
            if (!empty($result)) {
                // output data of each row

                echo "<table class='table-inline'><tr><th>Car Name</th><th>Type</th><th>Seats</th><th>Price</th></tr>";
                foreach ($result as $key => $value) {
                    $row = $value;
                    $id = $row["users_id"];
                    $car = $row["lots_id"];
                    $type = $row["datetime"];
                    $seats = $row["total_price"];


                    echo "<tr><td>" . $car . "</td><td>" . $type . "</td><td>" . $seats . "</td><td>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }

            $sql = "SELECT * FROM Orders_cars";
            $result = $model->sqlcommend($sql);
            if (!empty($result)) {
                // output data of each row

                echo "<table class='table-inline'><tr><th>Car Name</th><th>Type</th><th>Seats</th><th>Price</th></tr>";
                foreach ($result as $key => $value) {
                    $row = $value;

                    $car = $row["cars_id"];
                    $type = $row["users_id"];
                    $seats = $row["datetime"];


                    echo "</td><td>" . $type . "</td><td>" . $seats . "</td><td>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
