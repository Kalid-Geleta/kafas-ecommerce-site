<?php
require_once("dbconnection.php");
session_start();
$userid=$_SESSION['userid'];
?>
<?php

?>
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">

<head>

</head>

<body>

    <div class="head">

        <div class="side">



            <a class="u">Menu</a>

            <a href="#tac1">cart</a></li>

            <a href="#tac2">history</a></li>

            
            
        </div>

    </div>

    <div class=sidecontent>
        <div class="net" id="tac1">
        <table>
            <thead>
<form action="finalpage.php" method="post">
                <tr>
                    <th>orderdetails-Id</th>
                    <th>Order-Id</th>
                    <th>User-Id</th>
                    <th>Product-Id</th>
                    <th> Product Price </th>
                    <th> Order Quantity </th>
                    <th> Total Order Details</th>
                    <th> Created At</th>
                    <th> Updated At</th>
                    <th width="200px" > <button type="submit" name="tru" style="width:150px">Check Out</button></th>
                  
                </tr>
</form>
            </thead>
            <tbody>
                <?php
                $dbold = new dboldconnection();
                echo $userid;
                $result = $dbold->res("select orderdetails_id,order_id,user_id,product_id,product_price,order_quantity,orderdetails_total,created_at,updated_at from tbl_orderdetails where user_id='".$userid."'");


                while ($row = $result->fetch_assoc()) {
                    echo "<tr>"
                    ."<form action=\"updatecart.php\" method=\"post\">"
                        . "<td>" . $row['orderdetails_id'] . "</td>"
                        
                        . "<td>" . $row['order_id'] . "</td>"
                        . "<td>" . $row['user_id'] . "</td>"
                        . "<td>" . $row['product_id'] . "</td>"
                        . "<td>" . $row['product_price'] . "</td>"
                        . "<td>" . $row['order_quantity'] . "</td>"
                        . "<td>" . $row['orderdetails_total'] . "</td>"
                        . "<td>" . $row['created_at'] . "</td>"
                        . "<td>" . $row['updated_at'] . "</td>"
                        . "<td >"."<button name=\"pid\" value=\"". $row['orderdetails_id']."\" type=\"submit\" style=\"width:100px\">update</button>"."<br>"."<br>"."<button name=\"dpid\" value=\"". $row['orderdetails_id']."\" type=\"submit\" style=\"width:100px\">Delete</button>"."</td>"."</tr>"
                        . "</form>";
                }
                ?>



            </tbody>
        </table>
           
        </div>
        <div class="net" id="tac2">
            <table>
        <thead>

                <tr>
                    <th>orderdetails-Id</th>
                    <th>Order-Id</th>
                    <th>User-Id</th>
                    <th>Product-Id</th>
                    <th> Product Price </th>
                    <th> Order Quantity </th>
                    <th> Total Order Details</th>
                    <th> Created At</th>
                    <th> Updated At</th>
                    
                  
            </tr>

            </thead>
            <tbody>
                <?php
                $dbold = new dboldconnection();
                $result = $dbold->res("select orderdetails_id,order_id,user_id,product_id,product_price,order_quantity,orderdetails_total,created_at,updated_at from tbl_orderdetails where user_id='".$userid."'");


                while ($row = $result->fetch_assoc()) {
                    echo "<tr>"
                    
                        . "<td>" . $row['orderdetails_id'] . "</td>"
                        . "<td>" . $row['order_id'] . "</td>"
                        . "<td>" . $row['user_id'] . "</td>"
                        . "<td>" . $row['product_id'] . "</td>"
                        . "<td>" . $row['product_price'] . "</td>"
                        . "<td>" . $row['order_quantity'] . "</td>"
                        . "<td>" . $row['orderdetails_total'] . "</td>"
                        . "<td>" . $row['created_at'] . "</td>"
                        . "<td>" . $row['updated_at'] . "</td>"."</tr>";
                        
                        
                }
                ?>



            </tbody>
        </table>
           
        </div>
        

        <div class="net" id="tac3">

            
        </div>
        
<div class="net" id="tac4">
       


    </div>
    
    
    
    </div>
    

</body>

</html>