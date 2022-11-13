<?php
session_start();
if(isset($_POST['username'])&&isset($_POST['log']) )
{
require_once("dbconnection.php");
$username=$_POST['username'];
$password=$_POST['password'];
$log=$_POST['log'];
$dbobject=new dbconnection();


if($log=="admin"){
    $sql="select email,password from tbl_users where role='1' and email=? ";
  $stmt= $dbobject->dbfunction($sql);
  $stmt->bind_param("s",$username);
  $stmt->execute();
  $result=$stmt->get_result();
  $data=$result->fetch_assoc();


    if($password==$data["password"]){
        $_SESSION['email']=$username;
        header("Location:adminpanel.php");
        
    }
    else{
$message="password or username incorrect";
    }

}
else {
    $sql="select email,password,user_id from tbl_users where role='0' and email=? ";
    $stmt= $dbobject->dbfunction($sql);
    $stmt->bind_param("s",$username);
    $stmt->execute();
    $result=$stmt->get_result();
    $data=$result->fetch_assoc();
    if($password==$data["password"]){
        echo $data["password"];
        $_SESSION['email']=$username;
        $_SESSION['userid']=$data['user_id'];
        header("Location:logedindex.php");
        
    }
    else{
        $message="password or username incorrect";
    }

}
}

?>

<!DOCTYPE html>

<html lang="en">
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">

<body class="adminloginback">
    <div class="loginpanelparent">
        <div class="loginpanelchild">
            <h1>Sign in</h1>


            <form action="anylogin.php" method="post">
                <div class="input">
                    <img src="adminicon.png" width="50px" height="50px">
                    <input type="text" name="username">

                </div>

                <div class="input">
                    <img src="passwordicon.png" width="40px" height="40px">
                    <input type="text" name="password">

                </div>
                <div class="ch1">
                    
                <div class="ch"> 
                   <div>
                    <input type="radio" name="log" id="ad" value="admin">
                    <label for="ad">Admin</label>
</div>
<div>
                    <input type="radio" name="log" id="cu" value="customer">
                    <label for="cu">Customer</label>
</div>
</div>
</div>
                <div class="input" id="log">
                    
                <button class="btn1" type="submit">Login</button>
                </div>

                <div class="input" >
                    
                <h4><?php if(isset($message)&&!empty($message)){echo $message;}?></h4>
                </div>
                

            </form>
           
        </div>
      
    </div>



</body>

</html>