
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
        
        include 'model.php';
        $model = new model();
        
        $sql = "INSERT INTO Users (name, password)
                VALUES ('$name', '$userpass')";
        $model->sqlcommend($sql);
        
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