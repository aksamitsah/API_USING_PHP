<?php

require 'connection.php';

$users = "SELECT username, email FROM user";

$result = mysqli_query($con,$users);

if(mysqli_num_rows($result)>0)
{

    while($row = $result->fetch_assoc()){
        $response['users'][] = $row;
    }
}
else
{
    $response['error']="400";
}

echo json_encode($response);


?>