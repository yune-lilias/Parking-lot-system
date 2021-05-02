
      
<?php
     
 $db = "";    

include 'Cart.php';
include 'Orders.php';
    class User {
        public $id = 0;
        public $username = ''; 
        public $cart;
        public $orders;

        function __construct($id,$un,$model){ 
            $this->id = $id;
            $this->username = $un;
            $this->cart = new Cart($id,$model);
            $this->orders = new Orders($id,$model);
        }

        function checkout($model){
            $sql1 = 'delete from Cart_cars where users_id ='.$this->id;
            $sql2 = 'delete from Cart_lots where users_id ='.$this->id;
            $result = $model->sqlcommend($sql1);
            $result = $model->sqlcommend($sql2);
             $userid = $this->id;
             $cart = $this->cart;
            
                // output data of each row
                 $result = $cart->lots;
            if (!empty($result)) {
                // output data of each row
                   
                foreach($result as $key => $value) {
                    $row = $value;
                    $lotnum = $row["lots_id"];
                    $price = $row["total_price"];
                      $sql = "INSERT INTO Orders_lots(lots_id, users_id,total_price)
                           VALUES ($lotnum, $userid,$price)";
                    $model->sqlcommend($sql);  
                }
            } 

             $result = $cart->cars;
            if (!empty($result)) {
                // output data of each row

                foreach($result as $key => $value) {
                    $row = $value;
                    $carid = $row["cars_id"];
                    $price = $row["total_price"];

                      $sql = "INSERT INTO Orders_cars(cars_id, users_id,total_price)
                           VALUES ($carid, $userid,$price)";
                    $model->sqlcommend($sql);                  
                }
            }
              
            $this->cart = new Cart($userid,$model);
            $this->orders = new Orders($userid,$model);

               
            } 


        }
       






?>

