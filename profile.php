<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Your Profile</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <div id="navbar">
        <ul>
            <li><a href="menu.php">Home</a></li>
            <li><a href="profile.php">My Profile</a></li>
            <li><a href="inventory.php">Rent a Car</a></li>
            <li><a href="parking.php">Pre-Pay for Parking</a></li>
            <li><a href="viewcart.php">My Cart</a></li>
        </ul>
    </div>
    <div id="profile-page">
        <div class="center">
            <?php
            echo "<h1>Hello, " . $_COOKIE['name'] . "</h1>"
            ?>
            <h2>Display order data here</h2>
            
            <?php
            
            $userid = $_COOKIE['id'];
            include 'model.php';
            include 'Orders.php';
            $model = new model();
            $orders = new Orders($userid,$model);
            print_r($orders->cars);
            echo "<br><br>";
            print_r($orders->lots);
            $orders_cars = $orders->cars;
            $orders_lots = $orders->lots;
           
          /*
          $db = "";    

           class Orders {
            public $cars;
            public $lots; 
            function __construct($userid,$model){ 
              $sql="SELECT * FROM ORDERS WHERE users_id=username;";
              $result = $model ->sqlcommend($sql);
              $this->orders = [];
              if (!empty ($result1)) { 
                foreach ($result1 as $key => $value) {
                $tmp_array = [];
                $row = $value;
                $carid = $row["cars_id"];
                $carname = $row["carname"];
                $cartype = $row["cartype"];
                $seat = $row["seats"];
                $price = $row["price"];
                $time = $row["datetime"];
                $tmp_array["cars_id"]= $carid;
                $tmp_array["carname"]= $carname;
                $tmp_array["cartype"]= $cartype;
                $tmp_array["seats"]= $seat;
                $tmp_array["price"]= $price;
                $tmp_array["datetime"]= $time;
                array_push($this->cars,$tmp_array);
                }
              }
            }
        } */
            ?>
        </div>
    </div>
</body>

</html>