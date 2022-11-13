<?php
require_once("dbconnection.php");
if(isset($_POST['sub'])){
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$password=$_POST['password'];
$checked=0;
$deleted=0;
$userid=keygenerate("select user_id from tbl_users","user_id");
echo $userid;
if(!empty($password)){
if($password==$_POST['password']){
    $dbobject=new dbconnection();
    $stmt=$dbobject->dbfunction("insert into tbl_users(user_id,first_name,last_name,email,password,gender, role,is_deleted)values(?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssii" ,$userid,$fname,$lname,$email,$password,$gender,$checked,$deleted);
    $stmt->execute();
}
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


                <form action="signup.php" method="post">
                    <div class="box1">
                       
                        <div class="input">
                            <label for="s">First Name </label>
                            <input type="text" name="fname" id="s">
                        </div>
                        <div class="input">
                            <label for="s">Last Name </label>
                            <input type="text" name="lname" id="s">
                        </div>

                        <div class="input">
                            <label for="s">Gender</label>
                            <input type="radio" name="gender" value="f">
                            <label for="s">Female</label>
                            <input type="radio" name="gender" value="m">
                            <label for="s">Male</label>
                        </div>


                    </div>
                    <div class="box2">
                        <div class="input">
                            <div class="label">
                                <img src="adminicon.png" width="50px" height="50px">

                                <label for="s">Email </label>
                            </div>
                            <input type="text" name="email">

                        </div>


                        <div class="input">
                            <div class="label">

                                <img src="passwordicon.png" width="40px" height="40px">
                                <label for="s">Password</label>
                            </div>
                            <input type="text" name="password">




                        </div>
                        <div class="input">
                            <div class="label">
                                <label for="s">confirm password </label>
                             
                            </div>
                            <input type="text" name="cpassword" id="s">
                        </div>



                        <button type="submit" name="sub" value="b3">Sign UP</button>

                    </div>
                </form>

            </div>
        </div>

</body>
</html>


