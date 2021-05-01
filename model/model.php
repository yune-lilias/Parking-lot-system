
      
<?php
     
 $db = "";    

include 'dbconnect.php';
    class model {
        public $conn; 
        function __construct(){ 
            $dbcon = new dbconnect();
            $this->conn = $dbcon->connect();
        }

       


        function select( $table , $where='' , $match='' ,$other = ''){
            if(!$where == '' ){
                $where = 'where '.$where.' = ';
            }
            if(!$match == '' ){
                $match = '\''.$match.'\'';
            }

            $rr = "SELECT * FROM  $table $where $match $other";
         //   echo $rr;
            $sele = $this->conn->query($rr);
            return $sele->fetch();
        }

        function showtables(){
        	 $sele = $this->conn->query('show tables;');
            return $sele->fetch();
        }

        function sqlcommend($string){
           $sele = $this->conn->query($string);
           return $sele->fetchAll();
        }


    }



?>

