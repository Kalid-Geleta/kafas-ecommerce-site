<?php
session_start();
require_once("dbconnection.php");
$dbobject = new dbconnection();

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

            <a href="#tac1">Add new Catagory or <br> Add new sub Catagory</a></li>

            <a href="#tac2">Add User</a></li>

            <a href="#tac3">Add new clothing item</a></li>
            <a href="#tac4"> View Products </a></li>
            <a href="#tac5"> View users</a></li>
            <a href="#tac6"> View </a></li>
        </div>

    </div>

    <div class=sidecontent>
        <div class="net" id="tac1">
            <form action="adminpanel.php" method="post">
                <h1 class="header" style="color:#c27272; text-align: center;">Add Catagory</h1>
                <div class="fom">
                    <label for="x1">Catagory name:</label> <input type="text" id="x1" name="cname">

                    <label for="x2">Catagory identification symbol:</label> <input type="text" id="x2" name="cid">
                </div>


                <div class="fom">
                    <label for="x3">Catagory type:</label> <input type="text" id="x3" name="ctype">
                    <label for="x4">Catagory Recyclability:</label> <input type="text" id="x4" name="crec">
                </div>

                <div class="fom">
                    <label for="x5">Catagory max price:</label> <input type="text" id="x5" name="cmax">


                    <label for="x6">Catagory min price :</label> <input type="text" id="x6" name="cmin">
                </div>
                <button type="submit" name="sub" value="b1">SUBMIT</button>

                <?php
                if(isset($_POST['cname'])&&!empty($_POST['cname'])){
                if (isset($_POST['cname'])) {
                    $cname = $_POST['cname'];
                    $category_id = keygenerate("select category_id from tbl_categories", "category_id");
                    $checked = 0;
                    $stmt = $dbobject->dbfunction("insert into tbl_categories(category_id,category_name,is_deleted)values(?,?,?)");
                    $stmt->bind_param("ssi", $category_id, $cname, $checked,);
                    $stmt->execute();
                }
                }
                ?>


                <h1 class="header" style="text-align: center; color:#c27272;">Add SubCatagory</h1>
                <div class="fom">
                    <label for="x7">SubCatagory name:</label> <input type="text" id="x7" name="sname">

                    <label for="x8">SubCatagory type:</label> <input type="text" id="x8" name="sid">
                </div>

                <button class="t" type="submit" name="sub" value="b2">SUBMIT</button>
            </form>
            <?php

            if (isset($_POST['sname'])) {
                $sname = $_POST['sname'];
                $subcategory_id = keygenerate("select subcategory_id from tbl_subcategories", "subcategory_id");
                $checked = 0;
                if (!empty($_POST['sname'])) {
                    $stmt = $dbobject->dbfunction("insert into tbl_subcategories(subcategory_id,subcategory_name,is_deleted)values(?,?,?)");
                    $stmt->bind_param("ssi", $subcategory_id, $sname, $checked);
                    $stmt->execute();
                }
            }
            ?>
        </div>
        <div class="net" id="tac2">
            <div class="register">
                <h1>Add User</h1>
                <hr>


                <form action="adminpanel.php" method="post">
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
                            <input type="radio" name="gender" id="s" value="f">
                            <label for="s">Female</label>
                            <input type="radio" name="gender" id="s" value="m">
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



                        <button type="submit" name="sub" value="b3">ADD</button>

                    </div>
                </form>
            </div>
        </div>
        <?php


        if (isset($_POST['fname'])) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $checked = 0;
            $deleted = 0;
            $userid = keygenerate("select user_id from tbl_users", "user_id");

            if (!empty($password)) {
                if ($password == $_POST['cpassword']) {

                    $stmt = $dbobject->dbfunction("insert into tbl_users(user_id,first_name,last_name,email,password,gender, role,is_deleted)values(?,?,?,?,?,?,?,?)");
                    $stmt->bind_param("ssssssii", $userid, $fname, $lname, $email, $password, $gender, $checked, $deleted);
                    $stmt->execute();
                }
            } else {
            }
        }
        ?>



        <div class="net" id="tac3">

            <form action="adminpanel.php" method="post" enctype="multipart/form-data" class="tgform">
                <div class="tform">
                    <div class="arrange">
                        <label>Catagory</label>
                        <select style="height:40px; border:1px solid #c27272" ; name="catchoice">''
                            <?php
                            $stmt = $dbobject->dbfunction("select category_name,category_id from tbl_categories");
                            $stmt->execute();
                            $result = $stmt->get_result();

                            while ($row = $result->fetch_assoc()) {
                                echo "<option value=\"" . $row['category_id'] . "\">" . $row['category_name'] . "</option>";
                            }
                            ?>
                        </select>

                        <label> Unit Price</label>
                        <input type="text" name="price">
                        <label>Item name</label>
                        <input type="text" name="itemname">
                        <label>Subcategory</label>
                        <select style="height:40px; border:1px solid #c27272" name=subchoice>
                            <?php
                            $stmt = $dbobject->dbfunction("select subcategory_name,subcategory_id from tbl_subcategories");
                            $stmt->execute();
                            $result = $stmt->get_result();

                            while ($row = $result->fetch_assoc()) {
                                echo "<option value=\"" . $row['subcategory_id'] . "\">" . $row['subcategory_name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="arrange">
                        <label>product description</label>
                        <textarea rows="5" cols="3" style="border:1px solid #c27272" name="description">type here</textarea>
                        <label>Image of product</label>
                        <input type="file" name="files">
                        <label>number of quantity</label>

                        <input type="text" name="quantity">





                    </div>
                </div>

                <div class="one">
                    <button type="submit" name="sub" value="b4">Insert</button>
                </div>
            </form>
        </div>
        <?php
        if (isset($_POST['itemname'])&&!empty($_POST['itemname'])) {
            $email = $_SESSION['email'];
          
            $stmt = $dbobject->dbfunction("select first_name from tbl_users where email=?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();
            $addedby = $data['first_name'];
            
            $productid = keygenerate("select product_id from tbl_product", "product_id");
            $productimagesid = keygenerate("select productimages_id from tbl_productimages", "productimages_id");
            $price = $_POST['price'];
            $productname = $_POST['itemname'];
            $catchoice = $_POST['catchoice'];
            $subchoice = $_POST['subchoice'];
            $description = $_POST['description'];
            $quantity = $_POST['quantity'];
            $date = date("y-m-d h:i:sa");
            $deleted = 0;
            $arrayupload = $_FILES['files'];
            

            $imagefullfilename = $arrayupload['name'];
            $arrayname = explode('.', $imagefullfilename);
            $filename = $arrayname[0];
            $tmpfile = $arrayupload['tmp_name'];
            $extension = strtolower($arrayname[1]);
            $imagepath = 'images/' . $filename . "." . $extension;
            move_uploaded_file($tmpfile, $imagepath);

            $stmt = $dbobject->dbfunction("insert into tbl_product(product_id,product_name,category_id,unit_price,subcategory_id,created_at,updated_at,added_by,is_deleted)values(?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("sssdssssi",  $productid, $productname, $catchoice, $price, $subchoice, $date, $date, $addedby, $deleted);
            $stmt->execute();
            $stmt = $dbobject->dbfunction("insert into tbl_productimages(productimages_id,product_image, product_id, description, quantity, unit_price, created_at, updated_at,  added_by,is_deleted)values(?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("ssssiisssi",  $productimagesid, $imagepath, $productid, $description, $quantity, $price,$date, $date, $addedby, $deleted);
            $stmt->execute();
        }
        ?>
<div class="net" id="tac4">
        <table>
            <thead>
                <tr>
                    <th>Product images id</th>
                    <th>Product images</th>
                    <th>Product_id</th>
                    <th>Description</th>
                    <th> Quantity</th>
                    <th> Created At</th>
                    <th> Updated At</th>
                    <th> added by</th>
                    <th width="200px" > Action</th>
                </tr>

            </thead>
            <tbody>
                <?php
                $dbold = new dboldconnection();
                $result = $dbold->res("select productimages_id,product_image, product_id, description,  quantity,  created_at,  updated_at,  added_by from tbl_productimages");


                while ($row = $result->fetch_assoc()) {
                    echo "<tr>"
                    ."<form action=\"updateproduct.php\" method=\"post\">"
                        . "<td>" . $row['productimages_id'] . "</td>"
                        . "<td>" . "<img src=\"" . $row['product_image'] . "\" width=\"" . "100px" . "height=\"" . "100px" . "\">" . "</td>"
                        . "<td>" . $row['product_id'] . "</td>"
                        . "<td>" . $row['description'] . "</td>"
                        . "<td>" . $row['quantity'] . "</td>"
                        . "<td>" . $row['created_at'] . "</td>"
                        . "<td>" . $row['updated_at'] . "</td>"
                        . "<td>" . $row['added_by'] . "</td>"
                        . "<td >"."<button name=\"pid\" value=\"". $row['productimages_id']."\" type=\"submit\" style=\"width:100px\">update</button>"."<br>"."<br>"."<button name=\"dpid\" value=\"". $row['productimages_id']."\" type=\"submit\" style=\"width:100px\">Delete</button>"."</td>"
                        . "</form>";
                }
                ?>



            </tbody>
        </table>


    </div>
    
    <div class="net" id="tac5">
    <table>
            <thead>
                <tr>
                    <th>User id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th> Password</th>
                    <th> Gender</th>
                    <th> role</th>
                   
                    <th width="200px" > Action</th>
                </tr>

            </thead>
            <tbody>
                <?php
                $dbold = new dboldconnection();
                $result = $dbold->res("select user_id,first_name, last_name,email,password, gender, role,is_deleted from tbl_users");


                while ($row = $result->fetch_assoc()) {
                    echo "<tr>"
                    ."<form action=\"updateuser.php\" method=\"post\">"
                        . "<td>" . $row['user_id'] . "</td>"
                        . "<td>" . $row['first_name'] . "</td>"
                        . "<td>" . $row['last_name'] . "</td>"
                        . "<td>" . $row['email'] . "</td>"
                        . "<td>" . $row['password'] . "</td>"
                        . "<td>" . $row['gender'] . "</td>"
                        . "<td>" . $row['role'] . "</td>"
                        . "<td >"."<button name=\"id\" value=\"". $row['user_id']."\" type=\"submit\" style=\"width:100px\">update</button>"."<br>"."<br>"."<button name=\"did\" value=\"". $row['user_id']."\" type=\"submit\" style=\"width:100px\">Delete</button>"."</td>"
                       . "</form>";
                        
                }
                ?>



            </tbody>
        </table>


            </div>
            <div class="net" id="tac6">
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
                $result = $dbold->res("select orderdetails_id,order_id,user_id,product_id,product_price,order_quantity,orderdetails_total,created_at,updated_at from tbl_orderdetails ");


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
                        . "<td>" . $row['updated_at'] . "</td>"."<\tr>";
                        
                        
                }
                ?>



            </tbody>
        </table>
           
        </div>
    
    </div>
    

</body>

</html>