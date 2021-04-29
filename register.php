
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <title>Register Page</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
    <?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST["name"]) && ($_POST['name'] != "") && isset($_POST["password"]) && ($_POST['password'] != "")){
        $name = $_POST["name"];
        $userpass = $_POST["password"];
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mydb";
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        $sql = "CREATE DATABASE mydb";
        if (mysqli_query($conn, $sql)) {
            echo "Database created successfully<br>";
        } else {
            echo "Error creating database: " . mysqli_error($conn) . "<br>";
        }
        mysqli_select_db ( $conn , "mydb" );
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }    
 
        $sql = "CREATE TABLE users (
            name VARCHAR(255), 
            password VARCHAR(255)
            )";

            if(mysqli_query($conn, $sql)){
                echo "Table school created successfully<br>";
            } else {
                echo "Error creating table: " . mysqli_error($conn). "<br>";
            }
        
        $sql = "INSERT INTO users (name, password)
                VALUES ('$name', '$userpass')";

        if ($conn->query($sql) === TRUE) {
            echo "New artist successfully saved";
        } else {
            echo "Error: New artist failed to be saved" . $sql . "<br>" . $conn->error;
        }
        $conn->close();
        //Redirect to Login
        header("Location: login.php");
        
    }else{
        echo '<script language="javascript">';
        echo 'alert("Register Failed")';
        echo '</script>';
    }
}
?>
        <div id="box">
            <form action="register.php" method="post">
            <fieldset>
            <legend>New User Signup</legend>
            <p>Name: <input id="name" type="text" name ="name"></p>
		    <p>Password: <input name="password" type="password"></p>
            <input type="submit" value="Sign Up">
        </fieldset>
            </form>
        </div>
    </body>

</html>