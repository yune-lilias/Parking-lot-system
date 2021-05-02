<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <title>View Cart</title>
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
    <div id="content-wrap">
        <div class="item-area">
            <h1>Inventory</h1>
            <?php
            include 'model.php';
            include 'User.php';
            $total = 0;
             $user = unserialize($_COOKIE['cache']);  
             $cart = $user->cart;
             $result = $cart->lots;
            if (!empty($result)) {
                // output data of each row
                   
                foreach($result as $key => $value) {
                    $row = $value;
                    print_r($value);
                    $lotnum = $row["lots_id"];
                    $price = $row["total_price"];
                    $total = $total + $price;
                echo "Parking Space: $lotnum<br>";
                echo "Price: $price";
                echo "<br><br>";
                }
            } else {
                echo "No lot in cart <br> <br>";
            }
             $result = $cart->cars;
            if (!empty($result)) {
                // output data of each row

                foreach($result as $key => $value) {
                    $row = $value;
                    $card = $row["cars_id"];
                    $price = $row["total_price"];
                    $car = $row["carname"];
                    $cart = $row["cartype"];
                    $cars = $row["seats"];
                    $total = $total + $price;
                     echo "Car name: $car $cart<br>";
                     echo "Seat: $cars<br>";
                     echo "Price: $price<br>";
                echo "<br>";
                }
            } else {
                echo "No car in cart <br> <br>";
            }


            ?>
        </div>
        <div id="price-area">
            <h1>Total</h1>
            <?php
            echo $total.'$';
            ?>
        </div>
        <div class="item-area">
            <h1>Payment</h1>
        <form action="checkout.php" method="post">
            <p>Name: <input id="name" type="text"></p>
		    <p>Email: <input name="email" type="email"></p>
            <p>Shipping Address: <input name="shipping" type="text" size="40"></p>
            <p>Billing Address: <input name="billing" type="text" size="40"></p>
            <p>Phone Number: <input name="phone" type="tel" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"></p>
            <h4>Credit Card Info</h4></br>
            <div>
                <div class="credit-card">
                    <label for="cardnumber">Card Number</label>
                    <input id = "cardnumber" type="number" name="cardnumber">
                </div>
                <div class="credit-card">
                    <label for="code">Security Code</label>
                 <input id = "code" type="password" name="code" size="4">
                </div>
            </div>
            <div>
            <div class="credit-card">
                    <label for="cardname">Name on Card</label>
                    <input id = "cardname" type="text" name="cardname">
                </div>
                <div class="credit-card">
                    <label for="expiration">Expiration</label>
                    <select id="month" name="month">
                        <option value ="">MM</option>
                        <option value ="1">01</option>
                        <option value ="2">02</option>
                        <option value ="3">03</option>
                        <option value ="4">04</option>
                        <option value ="5">05</option>
                        <option value ="6">06</option>
                        <option value ="7">07</option>
                        <option value ="8">08</option>
                        <option value ="9">09</option>
                        <option value ="10">10</option>
                        <option value ="11">11</option>
                        <option value ="12">12</option>
                    </select>
                    <select id="year" name="year"> 
                        <option value ="">YY</option>
                        <option value ="21">21</option>
                        <option value ="22">22</option>
                        <option value ="23">23</option>
                        <option value ="24">24</option>
                        <option value ="25">25</option>
                        <option value ="26">26</option>
                        <option value ="27">27</option>
                        <option value ="28">28</option>
                        <option value ="29">29</option>
                        <option value ="30">30</option>
                    </select>
                </div>
            </div>
            <p>Coupon: <input id="coupon" type="text"></p>
            <input type="submit" value="Submit">
        </form>
    </div>
    </div>
    </body>

</html>