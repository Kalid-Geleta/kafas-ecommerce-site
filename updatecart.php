<?php
require_once("dbconnection.php");
?>
<?php 

if(isset($_POST['dpid'])&&!empty($_POST['dpid'])){
    $orderdetailid=$_POST['dpid'];
    $dbobject=new dbconnection();
  $stmt=$dbobject->dbfunction("DELETE FROM tbl_orderdetails WHERE orderdetails_id=?");
  $stmt->bind_param("s", $orderdetailid);
$stmt->execute();
if($stmt->affected_rows>0){
  echo "now";
  header("Location:clientpanel.php");
}
}

?>
<?php

require_once("dbconnection.php");



session_start();


if(isset($_POST['pid'])&&!empty($_POST['pid'])){
    $orderdetailid=$_POST['pid'];
    $_SESSION['orderdetailid']= $orderdetailid;
    $dbobject=new dbconnection();
$stmt=$dbobject->dbfunction("select order_quantity from tbl_orderdetails where orderdetails_id=?");
$stmt->bind_param("s",$orderdetailid);
$stmt->execute();
$result=$stmt->get_result();
$data=$result->fetch_assoc();



}




?>
<!DOCTYPE html>


<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
   <body>
   <div class="net" id="tac2">
            <div class="register">
                <h1>Update Quantity</h1>
                <hr>


                <form action="test.php" method="post">
                    <div class="box1">
                       
                        <div class="input">
                            <label for="s">Quantity </label>
                            <input type="text" name="quantity" id="s" style=" border:1px solid black;" value=<?php echo $data['order_quantity']; ?> >
                        </div>
                        
                       
                        <button type="submit" name="sub1" value="b3">Update</button>
                      

                    </div>
                    <div class="box2">
                        


                        

                    </div>
                </form>

            </div>
        </div>

</body>
</html>
<?php

?>



