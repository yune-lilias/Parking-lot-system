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
            class checkout{
                function _construct(){

                }
                function addToOrders(){
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
                    
                    $sql = "INSERT INTO orders (username, item, price)
                        VALUES ('$carname', '$carprice')";
                }
            }
        ?>
    
    </body>

</html>