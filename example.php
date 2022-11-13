
<!DOCTYPE html>
<html>
    <body>
        <div style="width:200px; display:flex; height:200px; justify-content:space-around">
            <div style="width:80px; height:80px;">
yueieiieiei
            </div>
            <div style="width:80px; height:80px;">
hdjdjdjkdkdkdk
            </div>
        </div>
        <form action="example.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file">
            <button type="submit">submit</button>
;

        </form>
    </body>

</html>
<?php
$arrayupload=$_FILES['file'];

$filename= $arrayupload['name'];
$arrayofname=explode('.',$filename);
$filen=$arrayofname[0];
$extension=$arrayofname[1];
$tmpfile=$arrayupload['tmp_name'];
$path="images/".$filen.".".$extension;
echo $path;
move_uploaded_file($tmpfile,$path);
echo "uploaded";






?>
<!DOCTYPE html>
<html>
    <body>
        <div style="width:200px; display:flex; height:200px; justify-content:space-around">
            <div style="width:80px; height:80px;">
yueieiieiei
            </div>
            <div style="width:80px; height:80px;">
hdjdjdjkdkdkdk
            </div>
        </div>
        <form action="example.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file">
            <button type="submit">submit</button>
;

        </form>
    </body>

</html>
<?php
$arrayupload=$_FILES['file'];

$filename= $arrayupload['name'];
$arrayofname=explode('.',$filename);
$filen=$arrayofname[0];
$extension=$arrayofname[1];
$tmpfile=$arrayupload['tmp_name'];
$path="images/".$filen.".".$extension;
echo $path;
move_uploaded_file($tmpfile,$path);
echo "uploaded";






?>