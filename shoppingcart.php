<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Cart</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <?php

    class shoppingcart
    {
        function getEntries()
        {
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
            $sql = mysqli_query($conn, "SELECT * FROM cart");
            while($row = mysqli_fetch_array($sql)){
                $items[] = $row['item'];
                $prices[] = $row['price'];
            }
            $conn->close();
            return array($items, $prices);
        }
    }
    ?>
</body>

</html>