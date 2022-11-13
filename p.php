<?php
$username="root";
$pass="";
$server="localhost";
$database="ecom";
$conn=new mysqli($server,$username,$pass,$database);
if($conn->connect_error){
    echo "failed";
}
else{
    echo "Live";
}
$sql="SELECT * FROM tbl_users ";
$result=$conn->query($sql);

?>

   
   <!DOCTYPE html>
   <head>
    <link rel="stylesheet" href="style.css">
</head>
<html>
    <body>
        <table>
            <thead>
            <tr>
                <th>user_id </th>
                <th>first_name </th>
                <th>last_name </th>
                <th>email </th>
                <th>password </th>
                <th>gender</th>
                <th>role </th>
                <th>is_deleted </th>
                <th>Actions </th>
            </tr>
        </thead>
        <tbody>
           
            <?php

while($row = $result->fetch_assoc()) {
  echo '<tr>'.
    '<td>'. $row['user_id'].'</td>'.
     '<td>'. $row['first_name'].'</td>'.
     '<td>'. $row['last_name'].'</td>'.
     '<td>'. $row['email'].'</td>'.
    '<td>'. $row['password'].'</td>'.
     '<td>'. $row['gender'].'</td>'.
     '<td>'. $row['role'].'</td>'.
    '<td>'. $row['is_deleted'].'</td>'.
   '<td>' .'<div style="width:400px;  position:relative; display:flex; justify-content:center; gap:30px" ><div><button style="width:160px;" >Edit </button></div><div> <button style="width:160px;"> Delete</button><div></div>'.'</td>'.
  '</tr>' ;
    }
?> 
            
       
    </tbody>
    </table>
    
</body>
</html>

<?php
$username="root";
$pass="";
$server="localhost";
$database="ecom";
$conn=new mysqli($server,$username,$pass,$database);
if($conn->connect_error){
    echo "failed";
}
else{
    echo "Live";
}
$sql="SELECT * FROM tbl_users ";
$result=$conn->query($sql);

?>

   
   <!DOCTYPE html>
   <head>
    <link rel="stylesheet" href="style.css">
</head>
<html>
    <body>
        <table>
            <thead>
            <tr>
                <th>user_id </th>
                <th>first_name </th>
                <th>last_name </th>
                <th>email </th>
                <th>password </th>
                <th>gender</th>
                <th>role </th>
                <th>is_deleted </th>
                <th>Actions </th>
            </tr>
        </thead>
        <tbody>
           
            <?php

while($row = $result->fetch_assoc()) {
  echo '<tr>'.
    '<td>'. $row['user_id'].'</td>'.
     '<td>'. $row['first_name'].'</td>'.
     '<td>'. $row['last_name'].'</td>'.
     '<td>'. $row['email'].'</td>'.
    '<td>'. $row['password'].'</td>'.
     '<td>'. $row['gender'].'</td>'.
     '<td>'. $row['role'].'</td>'.
    '<td>'. $row['is_deleted'].'</td>'.
   '<td>' .'<div style="width:400px;  position:relative; display:flex; justify-content:center; gap:30px" ><div><button style="width:160px;" >Edit </button></div><div> <button style="width:160px;"> Delete</button><div></div>'.'</td>'.
  '</tr>' ;
    }
?> 
            
       
    </tbody>
    </table>
    
</body>
</html>

