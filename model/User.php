
      
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

       


    }



?>

