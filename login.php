
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <title>Login Page</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
    <?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST["name"]) && ($_POST['name'] != "") && isset($_POST["password"]) && ($_POST['password'] != "")){
        $name = $_POST["name"];
        $password = $_POST["password"];
        
    }else{
        echo '<script language="javascript">';
        echo 'alert("Login Failed")';
        echo '</script>';
    }
}
?>
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