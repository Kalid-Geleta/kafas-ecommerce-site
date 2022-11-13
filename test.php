<?php
session_start();
if(isset($_SESSION['uid'])&&!empty($_SESSION['uid'])){
$userid=$_SESSION['uid'];
require_once("dbconnection.php");
if(isset($_POST['fname'])&&!empty($_POST['fname'])){
if(isset($_POST['fname'])){
  $fname=$_POST['fname'];
  
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$password=$_POST['password'];
$role=$_POST['role'];

if($role=="Admin"){
$rol=1;

}else{
  $rol=0;
}


$dbobject= new dbconnection();
  $stmt=$dbobject->dbfunction("UPDATE tbl_users SET first_name=?,last_name=?, email=?,password=?, gender=?, role=? WHERE user_id=?");
  $stmt->bind_param("sssssis",$fname,$lname,$email,$password,$gender,$rol,$userid);
$stmt->execute();
if($stmt->affected_rows>0){
  echo "now";
}


}
}
}
if(isset($_POST['sub'])&&!empty($_POST['sub'])){
  if(isset($_POST['description'])&&!empty($_POST['description'])){
      $productimagesid=$_SESSION['pid'];
      echo  $productimagesid;
  $description=$_POST['description'];
  $quantity=$_POST['quantity'];
  $arrayupload = $_FILES['files'];
              
  
  $imagefullfilename = $arrayupload['name'];
  $arrayname = explode('.', $imagefullfilename);
  $filename = $arrayname[0];
  $tmpfile = $arrayupload['tmp_name'];
  $extension = strtolower($arrayname[1]);
  $imagepath = 'images/' . $filename . "." . $extension;
  move_uploaded_file($tmpfile, $imagepath);
  $dbobject= new dbconnection();
    $stmt=$dbobject->dbfunction("UPDATE tbl_orderdetails SET product_image=?,quantity=?,description=? WHERE productimages_id=?");
    $stmt->bind_param("siss",$imagepath,$quantity,$description,$productimagesid);
  $stmt->execute();
  if($stmt->affected_rows>0){
    echo "now";
  }
  }
  }
  if(isset($_POST['sub1'])&&!empty($_POST['sub1'])){
    require_once("dbconnection.php");
    if(isset($_POST['quantity'])&&!empty($_POST['quantity'])){
      $quantity=$_POST['quantity'];
      $orderdetailid=$_SESSION['orderdetailid'];
      $dbobject= new dbconnection();
      echo $quantity;

     
      $stmt = $dbobject->dbfunction("select product_price from tbl_orderdetails where orderdetails_id=?");
            $stmt->bind_param("s", $orderdetailid);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();
            $price=$data['product_price'];
            $price=$price* $quantity;
       
    
      $stmt=$dbobject->dbfunction("UPDATE tbl_orderdetails SET order_quantity=? , orderdetails_total=? WHERE  orderdetails_id=?");
      $stmt->bind_param("ids",$quantity,$price, $orderdetailid);
    $stmt->execute();
    if($stmt->affected_rows>0){
      echo "now";
    }
    }
    }
?>
