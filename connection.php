<?php 
$servername= "localhost";
$username= "root";
$password="";
$dbname= "crudoperations";


$conn= mysqli_connect($servername,$username,$password,$dbname,3307);
if($conn->connect_error){
    die("database not connected".$conn->connect_error);
}
echo "";

?>
