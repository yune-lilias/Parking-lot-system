<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST["parking"]) && ($_POST['parking'] != "") && isset($_POST["days"]) && ($_POST['days'] != "")) {
            $lot_num = $_POST['parking'];
            $days = $_POST['days'];
            $userid = $_COOKIE['id'];
           include 'model.php';
           $model = new model();

            $query = "SELECT * FROM Lots WHERE lots_id = $lot_num";

            $result = $model->sqlcommend($query);

            if (!empty($result)) {
                foreach($result as $key => $value)
                $row = $value;
                $price = $row["price"];
                $price = $price * $days;
                echo $price;
                
                $sql = "UPDATE Lots 
                        SET 
                            is_available = '0'
                        WHERE 
                            lots_id = $lot_num";
                $model->sqlcommend($sql);
                //Not sure how to insert the parking price into table
                $sql = "INSERT INTO Orders_lots (users_id,lots_id, total_price)
                           VALUES ('$userid','$lot_num', '$price')";
                $model->sqlcommend($sql);
                //header("Location: viewcart.php");

            } else {
                echo '<script language="javascript">';
                echo 'alert("Retrieval Failed")';
                echo '</script>';
            }
        }
    }
    ?>
    <a href="viewcart.php"><input type="button" id="btn1" value="OK"></a>
</body>

</html>