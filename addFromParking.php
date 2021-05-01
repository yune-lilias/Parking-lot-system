<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST["parking"]) && ($_POST['parking'] != "") && isset($_POST["days"]) && ($_POST['days'] != "")) {
            $lot_num = $_POST['parking'];
            $days = $_POST['days'];

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
            $query = "SELECT * FROM Lots WHERE lots_id = $lot_num";

            $result = mysqli_query($conn, $query);
            if (!$result) {
                echo ' Database Error Occured ';
            }
            if (mysqli_num_rows($result) >= 1) {
                $row = $result->fetch_assoc();
                $price = $row["price"];
                $price = $price * $days;
                
                //Not sure how to insert the parking price into table
               /* $sql = "INSERT INTO Orders_lots
                        VALUES ($price)";*/
                //header("Location: viewcart.php");
            } else {
                echo '<script language="javascript">';
                echo 'alert("Login Failed")';
                echo '</script>';
            }
        }
    }
    ?>
    <a href="viewcart.php"><input type="button" id="btn1"  value="OK"></a>
</body>

</html>