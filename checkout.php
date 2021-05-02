<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <title>Checkout</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <?php
             include 'model.php';
            include 'User.php';
            $total = 0;
             $model = new model();
             $userid = $_COOKIE['id'];
                $username = $_COOKIE['name'];
                $user = new User($userid, $username,$model);
                $user->checkout($model);
                echo "checkout success";
        ?>
    <a href="viewcart.php"><input type="button" id="btn1" value="OK"></a>
    </body>

</html>