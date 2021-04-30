<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
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
            //Once done go to viewcart.php
        ?>
    </body>

</html>