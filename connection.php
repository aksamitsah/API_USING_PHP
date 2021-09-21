<?php 

$dbName = "userdata";
$dbUser = "root";
$hostname = "localhost";
$db_password = "";


$con = mysqli_connect($hostname,$dbUser,$db_password,$dbName);
if(!$con)
{
    echo "Connection not Successful";
}
else
{
    //echo "Connection Successful";
}
?>