
<?php
session_start();
require_once("dbconnection.php");
$userid=$_POST['id'];
$_SESSION['uid']=$userid;
echo $userid;


if(isset($_POST['id'])&&!empty($_POST['id'])){

    $dbobject=new dbconnection();
$stmt=$dbobject->dbfunction("select first_name,last_name,email,password,gender,role from tbl_users where user_id=?");
$stmt->bind_param("s",$userid);
$stmt->execute();
$result=$stmt->get_result();
$data=$result->fetch_assoc();



}


?>
<?php 
if(isset($_POST['did'])&&!empty($_POST['did'])){
    $userid=$_POST['did'];
    $dbobject=new dbconnection();
  $stmt=$dbobject->dbfunction("DELETE FROM tbl_users WHERE user_id=?");
  $stmt->bind_param("s",$userid);
$stmt->execute();
if($stmt->affected_rows>0){
  echo "now";
  header("Location:adminpanel.php");
}
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
                <h1>Add User</h1>
                <hr>


                <form action="test.php" method="post">
                    <div class="box1">
                       
                        <div class="input">
                            <label for="s">First Name </label>
                            <input type="text" name="fname" id="s" value=<?php echo $data['first_name']; ?>>
                        </div>
                        <div class="input">
                            <label for="s">Last Name </label>
                            <input type="text" name="lname" id="s" value=<?php echo $data['last_name']; ?>>
                        </div>

                        <div class="input">
                            <label for="s">Gender</label>
                            <input type="radio" name="gender" value="f"  <?php if($data['gender']=='f'){ echo "checked";}  ?> >
                            <label for="s">Female</label>
                            <input type="radio" name="gender" value="m"   <?php if($data['gender']=='m'){ echo "checked";}  ?>>
                            <label for="s">Male</label>
                        </div>
                       
                      

                    </div>
                    <div class="box2">
                        <div class="input">
                            <div class="label">
                                <img src="adminicon.png" width="50px" height="50px">

                                <label for="s">Email </label>
                            </div>
                            <input type="text" name="email" value=<?php echo $data['email']; ?> >

                        </div>


                        <div class="input">
                            <div class="label">

                                <img src="passwordicon.png" width="40px" height="40px">
                                <label for="s">Password</label>
                            </div>
                            <input type="text" name="password" value=<?php echo $data['password']; ?>>




                        </div>
                        <div class="input">
                            <div class="label">
                                <label for="s">Role </label>
                             
                            </div>
                            <input type="text" name="role" id="s" value=<?php if($data['role']==1){echo "Admin";}else{echo "User";}?>>
                        </div>



                        <button type="submit" name="sub" value="b3">Update</button>

                    </div>
                </form>

            </div>
        </div>

</body>
</html>
<?php

?>


