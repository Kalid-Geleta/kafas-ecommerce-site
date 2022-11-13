<?php
session_start();
require_once("dbconnection.php");

$userid=$_SESSION['userid'];

$dbobject= new dbconnection();
$stmt = $dbobject->dbfunction("select orderdetails_total from tbl_orderdetails where user_id=?");
$stmt->bind_param("s",$userid);
$stmt->execute();
$result = $stmt->get_result();
$total=0;

while ($row = $result->fetch_assoc()) {
    $total=$total+$row['orderdetails_total'];
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
                <h1>Total Bill With TAX</h1>
                <hr>


                <form action="test.php" method="post">
                    <div class="box1">
                       
                        <div class="input">
                            <label for="s">total bill: </label>
                            <input type="text" name="quantity" id="s" style=" border:1px solid black;" value=<?php echo $total; ?> >
                        </div>
                        
                       
                        <button type="submit" name="sub1" value="b3">Buy</button>
                      

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



