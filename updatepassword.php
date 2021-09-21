<?php

    require 'connection.php';

    $current = md5($_POST['current']);
    $new = md5($_POST['new']);
    $email = $_POST['email'];

    $checkUser = "SELECT * FROM user WHERE email = '$email' AND password = '$current'";
    $result = mysqli_query($con,$checkUser);

    if(mysqli_num_rows($result)>0)
    {
        $updatePass = mysqli_query($con,"UPDATE user SET password = '$new' Where email='$email'");

       if($updatePass>0 && $current!=$new)
       {
        $response['error']="200";
        $response['message']="Password Update Success!";
       }
       else
        {
            $response['error']="400";
            $response['message']="Current and Old Password Same Update failed!";
        }
    }
    else
    {
        $response['error']="400";
        $response['message']="Email or Password Not Exist!";
    }
    echo json_encode($response);


?>