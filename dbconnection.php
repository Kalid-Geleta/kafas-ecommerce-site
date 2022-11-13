<?php
 class dbconnection {
  private  $servername="sql210.epizy.com";
private $username="epiz_32160717";

private $pass="VTWARGsaw5";
private $database="epiz_32160717_ecom";
private $con=null;
private $stmt=null;
public function __construct(){
$this->con=new mysqli($this->servername,$this->username ,$this->pass,$this->database);

 

}
function  checkconnection(){
    if($this->con->connect_error){
        echo "failed";
    }
    else{
        echo "connected";
    }
    }
function checkstmt(){
    if($this->stmt){
        echo "templated created ";
    }
    else{
        echo "no template created";
    }

}
  function  dbfunction($sql){
    $this->stmt=$this->con->prepare($sql);
    return $this->stmt;
    }

} 
function dbchecker($sql,$column,$key){
    $dbobject=new dbconnection();
    $stmt=$dbobject->dbfunction($sql);
    $stmt->execute();
    $result=$stmt->get_result();
    if($result->num_rows<=0){
        $value=true;
    }
    else{
    while($data=$result->fetch_assoc()){
        if($data[$column]==$key){
$value=false;
break;
        }
        else{
            $value=true;

        }


    }
}
    return $value;
}
function keygenerate($sql,$column){
    $str="abcdefghijklmnopqrtuvwxyz1234567890";
    $key=substr(str_shuffle($str),0,8);
    $value= dbchecker($sql,$column,$key);
   
    while(!$value){
        $key=substr(str_shuffle($str),0,8);
        $value= dbchecker($sql,$column,$key);

    }
    return $key;

}
class dboldconnection{
    private  $servername="sql210.epizy.com";
    private $username="epiz_32160717";
    
    private $pass="VTWARGsaw5";
    private $database="epiz_32160717_ecom";
    private $con=null;
    private $stmt=null;
    public function __construct(){
    $this->con=new mysqli($this->servername,$this->username ,$this->pass,$this->database);
    
     
    
    }
    function res($sql){
        if($this->con->query($sql)){
          
$result=$this->con->query($sql);

        }
       
        return $result;

    }

}




?>