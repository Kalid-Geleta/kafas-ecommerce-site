<?php

require_once("dbconnection.php");
$dbobject = new dbconnection();
?>
<?php
session_start();
if(isset($_POST['bop'])&&!empty($_POST['bop'])){
$userid=$_SESSION['userid'];
$sql="select order_id from tbl_order where user_id=? ";
$stmt= $dbobject->dbfunction($sql);
$stmt->bind_param("s",$userid);
$stmt->execute();
$result1=$stmt->get_result();
$data1=$result1->fetch_assoc(); 


$orderstatus=0;
$payment=0;
$isdeleted=1;
$date = date("y-m-d h:i:sa");
$productid=$_POST['bop'];
$sql="select unit_price from tbl_product where product_id=? ";
$stmt= $dbobject->dbfunction($sql);
$stmt->bind_param("s",$productid);
$stmt->execute();
$result=$stmt->get_result();
$data=$result->fetch_assoc(); 
$orderdetailsid=keygenerate("select orderdetails_id from tbl_orderdetails", "orderdetails_id");
$price=$data['unit_price'];

if($result1->num_rows>0){
    $orderquantity=1;
    $orderid=$data1['order_id'];
    $sql="select order_id from tbl_order where user_id=? ";
$stmt= $dbobject->dbfunction($sql);
$stmt->bind_param("s",$userid);
$stmt->execute();
$result=$stmt->get_result();
$data=$result->fetch_assoc(); 
$orderid=$data['order_id'];

$stmt = $dbobject->dbfunction("insert into tbl_orderdetails(orderdetails_id,order_id,user_id,product_id,product_price,order_quantity,orderdetails_total,created_at	,updated_at,is_deleted	)values(?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssssiddssi", $orderdetailsid, $orderid, $userid, $productid, $price, $orderquantity,$price, $date, $date, $isdeleted);
$stmt->execute();

    

} else if($result1->num_rows==0){
$orderamount=1;
$orderid=keygenerate("select order_id from tbl_order", "order_id");
$orderquantity=1;

$stmt = $dbobject->dbfunction("insert into tbl_order(order_id,user_id,order_amount,order_status,created_at,payment_type,updated_at,is_deleted)values(?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssiisisi",$orderid, $userid,$orderamount , $orderstatus, $date, $payment, $date,$isdeleted);
$stmt->execute();
$stmt = $dbobject->dbfunction("insert into tbl_orderdetails(orderdetails_id,order_id,user_id,product_id,product_price,order_quantity,orderdetails_total,created_at	,updated_at,is_deleted	)values(?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssiddssi", $orderdetailsid, $orderid, $userid, $productid, $price, $orderquantity,$price, $date, $date, $isdeleted);
    $stmt->execute();
   
}

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
<link rel="stylesheet" href="style.css">
<title>home</title>
    </head>
    <body>
      
    <div class="nav">
<div class="na">
   <div class="na0">
    <ul>      
        <li>HOME</li>
         <li >SHOP</li>  
         <li>ARTICLES</li>
         <li><a href="register.php">CONTACT</a></li>
        <span class="o"><strong>KAFAS</strong></span>
         <li >TESTMONAILS</li>
         <li >CUSTOMERS</li>
        
     </ul> 
 
   </div>
 
    <div class="na2">
        <ul>
            <button class="btn1" style="font-size:15px;"> <a href="clientpanel.php"><img src ="cart.png" width="17" height="17" 
    ></a></button> 
            <button class="btn2" style="font-size:17px; width:70px;"><a>logout</a></button> 
           
        
        </ul>
        </div>
    
</div>

<div class="i">
    <p>
        Easy and Fast Shopping Experience
        <br>
        You Deserve Better
        <br>
        <span>kafas is one of the leading websites for online shopping approximately 20,000 house holds use our product</span>
        <br>
        <a style="color:white; text-decoration:none; font-size:large; padding-top:10px; padding-bottom:10px; padding-right:20px;padding-left:20px; background-color:#810b39">Shop </a>
</p>
</div>
</div>
<p style="
    text-align:center; font-size: 30px;">Products</<p>


   <div class="nav2">
 
   <?php
   
              $stmt = $dbobject->dbfunction("select productimages_id,product_image, product_id, description,  quantity,unit_price,  created_at,  updated_at,  added_by from tbl_productimages");
              $stmt->execute();
              $result = $stmt->get_result();

               
             
              while ($row = $result->fetch_assoc()) {
                echo"<div style=\"height:370px;\">
                
                
                <div style=\"text-align:center;\">
                    <img src =\"".$row['product_image']."\" width=\"183\" height=\"275\" style=\"left:50%;\">
                </div>
                
                    <div>
                <p >".$row['description']."</p>
                <p><strong>".$row['unit_price']."</strong></p>
                ". " <form action=\"logedindex.php\" method=\"post\" style=\" all:unset\">"."
                <button name=\"bop\" type=\"submit\" value=\"".$row['product_id']."\" style=\"width:110px; height:40px; border-radius:1px; padding:2px;\">Add to Cart</button>
                
                </div>
                "."<\form>"."
                
                </div>";

               
               
                }
            
                ?>


</form>  
</div>

<br>
<div class="parent1" style="width:100vw; background-color:#f2f2f2 ;height:550px;">
    <div>
        <h1> Contact Us</h1>
    </div>
  <div class="parent">
    <div class="child1" style="width:400; height:400;">
        <p style="text-align:center;">Madaraka Estate, Nairobi, Kenya
            <br>
            <span>0707093963
                <br>
                kalid.dessalegn@strathmore.edu</span>
            </p>

    </div>
    <div lass="child2" style="width:400; height:400;">
        <div>
<input style="width: 190px; height:40px" type="text" id="o" name="d" placeholder="name" >
<input style="width: 190px; height:40px" type="text" id="6" name="5"placeholder="phone"  >
        </div>
        <div >
            <br>
            <input style="width: 400px; height:40px"type="text" id="o" name="d" placeholder="email" width="50px" >
        </div>
        <div>
           
            <br>
            <textarea style="width: 400px;" id="txtid" name="txtname" rows="4" cols="50" maxlength="200">
                message
                </textarea>
                
        </div>
    </div>
</div>
</div>
<br>
<div class="cc" style ="height:450px; width:100vw; background-color: #f2f2f2;">
    <div>
        <h1>CUSTOMERS</h1>
    </div>
    <div class="a">
    <div>
<img src="4.jpg">
    </div>
    <div>
        <img src="5.jpg">
    </div>
    <div>
        <img src="6.jpg">
    </div>
    <div>
        <img src="7.jpg">
    </div>
</div>

</diV>

</html>

