<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head><meta charset="UTF-8">
		<title>Sign up success</title>
		<link href="https://codd.cs.gsu.edu/~lhenry23/Web/HW/Asg03/nerdieluv.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		<!-- Need to modify before upload to github -->
		
		<br>
        <br>
      
         <div id = "bannerarea">
<div id = "q1">
<h2>Sql code: </h2> 
<form action="dao.php" method="post">
<?php echo 'Input code' ?>
  <textarea name="q1" rows="10" cols="50"></textarea>
  <input type="submit" name="SubmitButton"/>
</form>    <br>
<script type="text/javascript">
var data = <?php echo json_encode($_POST) ?>;
//if(typeof data.q1 == 'undefined' || data.q1 == [])



</script>

</div>


      
<?php
     
 $db = "";    

include 'dbconnect.php';
    class dao {
        public $conn; 
        function __construct(){ 
            $dbcon = new dbconnect();
            $this->conn = $dbcon->connect();
            echo "Worked";
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
           return $sele->fetch();
        }


    }

    function test($string){
$dao = new dao();
return $dao ->sqlcommend($string);
     //	$stmt = $dao ->select('entries');
     }

?>


<?php 
if(isset($_POST['q1'])){
	print_r(test($_POST['q1']));}
      ?>
      
</body>
</html>