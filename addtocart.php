<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
</head>

<body>
    <?php
    class addtocart
    {
        function _construct()
        {
        }

        function addToShoppingCart()
        {
            $carname = $_POST['carname'];
            $carprice = $_POST['carprice'];

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mydb";
            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            mysqli_select_db($conn, "mydb");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO cart (item, price)
                VALUES ('$carname', '$carprice')";
        }
    }
    ?>
</body>

</html>