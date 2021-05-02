<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <title>Checkout</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <?php
            $userid = $_COOKIE['id'];
            include 'model.php';
            $model = new model();
            $orders = new Orders($userid,$model);
        ?>
    
    </body>

</html>