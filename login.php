<?php

require 'connection.php';

$email = $_POST['email'];
$password = md5($_POST['password']);

$checkUser = "SELECT * FROM user WHERE email='$email'";
$result = mysqli_query($con,$checkUser);


if(mysqli_num_rows($result)>0)
{
    $checkUserquery = "SELECT id,username,email FROM user WHERE email='$email' AND password='$password'";
    $resultant = mysqli_query($con,$checkUserquery);

    if(mysqli_num_rows($resultant)>0)
    {
        while($row = $resultant->fetch_assoc()){
            $response['user'] = $row;
        }
    
        $response['error']="000";
        $response['message']="Login Sucess!";
    }
    else
    {
        $response['user'] = (object)[];
        $response['error']="200";
        $response['message']="Wrong Password.. Login Failed!";
    }

}
else
{
    $response['user'] = (object)[];
    $response['error']="400";
    $response['message']="Email not Found.. Login Failed!";
}
echo json_encode($response);


?>