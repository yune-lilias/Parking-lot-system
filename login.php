<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST["name"]) && ($_POST['name'] != "") && isset($_POST["password"]) && ($_POST['password'] != "")){
        $name = $_POST["name"];
        $userpass = $_POST["password"];

        include 'model.php';
        $model = new model();
        
        $query = "SELECT *
                  FROM Users
                  WHERE name = '$name' AND password = '$userpass'";

        $result = $model->sqlcommend($query);

        if(!$result){
            echo ' Database Error Occured ';
        }
        if(!empty($result)){
            foreach($result as $key => $value){
                $row = $value;
                $id = $row["users_id"];
            }
            echo "Name found";
            
           setcookie("id", $id);
           setcookie("name", $name);
            header("Location: menu.php");
        }else{
            echo '<script language="javascript">';
            echo 'alert("Login Failed")';
            echo '</script>';
        }

    }else{
        echo '<script language="javascript">';
        echo 'alert("Login Failed")';
        echo '</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <title>Login Page</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <div id="box">
            <form action="login.php" method="post">
            <p>Username: <input id="name" type="text" name="name"></p>
		    <p>Password: <input name="password" type="password"></p>
            <input type="submit" id="" value="Login">
            </form>
            <div>
                <p>Don't have an account? Register Here:</p>
                <a href="register.php">Register</a>
            </div>
        </div>
    </body>

</html>