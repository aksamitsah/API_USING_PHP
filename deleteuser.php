<?php

    require 'connection.php';

    $id = $_POST['id'];
    $deleteuser = mysqli_query($con,"DELETE FROM user id = '$id'");

    if($deleteuser>0)
    {
        $response['error']="200";
        $response['message']="Account has been deleated Sucessful..!";
    }
    else
    {
        $response['error']="400";
        $response['message']="Account has Not been deleated!";
    }
    echo json_encode($response);


?>