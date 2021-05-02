
      
<?php   
 $db = "";    
    class Cart {
        public $cars;
        public $lots; 
        function __construct($userid,$model){ 
            $sql1 = 'select * from Cart_cars natural join Cars where users_id ='.$userid;
            $sql2 = 'select * from Cart_lots natural join Lots where users_id ='.$userid;
            $result1 = $model ->sqlcommend($sql1);
            $result2 = $model ->sqlcommend($sql2);
            $this->cars = [];
            $this->lots = [];
            if (!empty ($result1)) {
                foreach ($result1 as $key => $value) {
                     # code...
                    $tmp_array = [];
                    $row = $value;
                    $carid = $row["cars_id"];
                    $carname = $row["carname"];
                    $cartype = $row["cartype"];
                    $seat = $row["seats"];
                    $price = $row["price"];
                    $tmp_array["cars_id"] = $carid;
                    $tmp_array["carname"] = $carname;
                    $tmp_array["cartype"]= $cartype;
                    $tmp_array["seats"] = $seat;
                    $tmp_array["price"] = $price;
                    array_push($this->cars,$tmp_array);
            }}

            if (!empty ($result2)) {
                foreach ($result2 as $key => $value) {
                     # code...
                    $tmp_array = [];
                    $row = $value;
                    $lotid = $row["lots_id"];
                    $hour_price = $row["price"];
                    $total_price = $row["total_price"];
                    $vip = $row["is_vip"];
                    array_push($tmp_array, $lotid);
                    array_push($tmp_array, $hour_price);
                    array_push($tmp_array, $total_price);
                    array_push($tmp_array, $vip);
                    array_push($this->lots,$tmp_array);
            }

        }


    }


}


?>

