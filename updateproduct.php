<?php

require_once("dbconnection.php");



session_start();


if(isset($_POST['pid'])&&!empty($_POST['pid'])){
    $productimagesid=$_POST['pid'];
    $_SESSION['pid']= $productimagesid;
    $dbobject=new dbconnection();
$stmt=$dbobject->dbfunction("select description,quantity from tbl_productimages where productimages_id=?");
$stmt->bind_param("s",$productimagesid);
$stmt->execute();
$result=$stmt->get_result();
$data=$result->fetch_assoc();



}



?>
<?php 
if(isset($_POST['dpid'])&&!empty($_POST['dpid'])){
    $productimagesid=$_POST['dpid'];
    $dbobject=new dbconnection();
  $stmt=$dbobject->dbfunction("DELETE FROM tbl_productimages WHERE productimages_id=?");
  $stmt->bind_param("s",$productimagesid);
$stmt->execute();
if($stmt->affected_rows>0){
  echo "now";
  header("Location:adminpanel.php");
}
}

?>
<?php
if(isset($_POST['sub'])&&!empty($_POST['sub'])){
    if(isset($_POST['description'])&&!empty($_POST['description'])){
        $productimagesid=$_POST['pid'];
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
      $stmt=$dbobject->dbfunction("UPDATE tbl_productimages SET product_image=?,quantity=?,description=? WHERE productimages_id=?");
      $stmt->bind_param("siss",$imagepath,$quantity,$description,$productimagesid);
    $stmt->execute();
    if($stmt->affected_rows>0){
      echo "now";
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
                <h1>Update Product</h1>
                <hr>


                <form action="test.php" method="post" enctype="multipart/form-data" class="tgform">
                    <div class="box1">
                       
                        <div class="input">
                            <label for="s">Description </label>
                            <input type="text" name="description" id="s" value=<?php echo $data['description']; ?>>
                        </div>
                        <div class="input">
                            <label for="s">Quantity </label>
                            <input type="text" name="quantity" id="s" value=<?php echo $data['quantity']; ?>>
                        </div>
                      


                    </div>
                    <div class="box2">
                        <div class="input">
                            <div class="label">
                                <img src="9.png" width="40px" height="40px">

                                <label for="s">Edit Image</label>
                            </div>
                            <input type="file" name="files">

                        </div>

                    </div>
                    <div>
                        
                       
                            <input type="text" name="cpassword" id="s">
                        </div>



                        <button type="submit" name="sub" value="b10">Update</button>

                    </div>
                </form>

            </div>
        </div>

</body>
</html>

  




<?php

require_once("dbconnection.php");



session_start();


if(isset($_POST['pid'])&&!empty($_POST['pid'])){
    $productimagesid=$_POST['pid'];
    $_SESSION['pid']= $productimagesid;
    $dbobject=new dbconnection();
$stmt=$dbobject->dbfunction("select description,quantity from tbl_productimages where productimages_id=?");
$stmt->bind_param("s",$productimagesid);
$stmt->execute();
$result=$stmt->get_result();
$data=$result->fetch_assoc();



}



?>
<?php 
if(isset($_POST['dpid'])&&!empty($_POST['dpid'])){
    $productimagesid=$_POST['dpid'];
    $dbobject=new dbconnection();
  $stmt=$dbobject->dbfunction("DELETE FROM tbl_productimages WHERE productimages_id=?");
  $stmt->bind_param("s",$productimagesid);
$stmt->execute();
if($stmt->affected_rows>0){
  echo "now";
  header("Location:adminpanel.php");
}
}

?>
<?php
if(isset($_POST['sub'])&&!empty($_POST['sub'])){
    if(isset($_POST['description'])&&!empty($_POST['description'])){
        $productimagesid=$_POST['pid'];
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
      $stmt=$dbobject->dbfunction("UPDATE tbl_productimages SET product_image=?,quantity=?,description=? WHERE productimages_id=?");
      $stmt->bind_param("siss",$imagepath,$quantity,$description,$productimagesid);
    $stmt->execute();
    if($stmt->affected_rows>0){
      echo "now";
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
                <h1>Update Product</h1>
                <hr>


                <form action="test.php" method="post" enctype="multipart/form-data" class="tgform">
                    <div class="box1">
                       
                        <div class="input">
                            <label for="s">Description </label>
                            <input type="text" name="description" id="s" value=<?php echo $data['description']; ?>>
                        </div>
                        <div class="input">
                            <label for="s">Quantity </label>
                            <input type="text" name="quantity" id="s" value=<?php echo $data['quantity']; ?>>
                        </div>
                      


                    </div>
                    <div class="box2">
                        <div class="input">
                            <div class="label">
                                <img src="9.png" width="40px" height="40px">

                                <label for="s">Edit Image</label>
                            </div>
                            <input type="file" name="files">

                        </div>

                    </div>
                    <div>
                        
                       
                            <input type="text" name="cpassword" id="s">
                        </div>



                        <button type="submit" name="sub" value="b10">Update</button>

                    </div>
                </form>

            </div>
        </div>

</body>
</html>

  




