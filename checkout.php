<?php
    $name_set = false;
    $email_set = false;
    $shipping_set = false;
    $billing_set = false;
    $phone_set = false;
    $coupon_set = false;
    $cardnumber_set = false;
    $code_set = false;
    $cardname_set = false;
    $month_set = false;
    $year_set = false;
    //---------Start of checking for POST variables-------------
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST["name"]) && ($_POST['name'] != "")) {
            $name_set = true;
           // echo "Name set\n";
        }
        if (isset($_POST["email"]) && ($_POST['email'] != "")) {
            $email_set = true;
           // echo "Email set\n";
        }
        if (isset($_POST["shipping"]) && ($_POST['shipping'] != "")) {
            $shipping_set = true;
           // echo "Shipping set\n";
        }
        if (isset($_POST["billing"]) && ($_POST['billing'] != "")) {
            $billing_set = true;
            //echo "Billing set\n";
        }
        if (isset($_POST["phone"]) && ($_POST['phone'] != "")) {
            $phone_set = true;
            //echo "Phone set\n";
        }
        if (isset($_POST["cardnumber"]) && ($_POST['cardnumber'] != "")) {
            $cardnumber_set = true;
           // echo "Card Numb set\n";
        }
        if (isset($_POST["code"]) && ($_POST['code'] != "")) {
            $code_set = true;
           // echo "Code set\n";
        }
        if (isset($_POST["cardname"]) && ($_POST['cardname'] != "")) {
            $cardname_set = true;
           // echo "Cardname set\n";
        }
        if (isset($_POST["month"]) && ($_POST['month'] != "")) {
            $month_set = true;
           // echo "Month set\n";
        }
        if (isset($_POST["year"]) && ($_POST['year'] != "")) {
            $year_set = true;
            //echo "Year set\n";
        }
        if (isset($_POST["coupon"]) && ($_POST['coupon'] != "")) {
            $coupon = $_POST['coupon'];
            if ($coupon == 'save5') {
                $coupon_set = true;
            }
        }
        //------------End of checking for set POST variables------------
        if ($name_set && $email_set && $shipping_set && $billing_set && $phone_set && $cardnumber_set && $code_set && $cardname_set && $month_set && $year_set) {
            include 'model.php';
            include 'User.php';
            $total = 0;
            $model = new model();
            $userid = $_COOKIE['id'];
            $username = $_COOKIE['name'];
            $user = new User($userid, $username, $model);
            $user->checkout($model);
            if($coupon_set){
                echo "Your coupon is valid<br>";
            }
            include 'Creditcard.php';
            $card = new Creditcard($_POST['cardnumber']);
            echo "Thank you for using ".$card->type."<br>";
            echo "checkout success<br>";
        } else {
            echo "Error with Checkout<br>";
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <a href="viewcart.php"><input type="button" id="btn1" value="Back to Cart"></a>
</body>

</html>