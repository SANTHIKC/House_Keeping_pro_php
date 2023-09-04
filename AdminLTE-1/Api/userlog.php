<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "home_service");

if (mysqli_connect_errno()) {
    die("Error in connection");
}



$email =$_POST['email'];
$password=$_POST['password'];   
    

$result = mysqli_query($conn, "SELECT user_id,user_name,email,type,password FROM user_reg WHERE email='$email' ");



if ($result) {
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);
    $type=$row['type'];
    
    if ($count == 1 &&  $type =='user' ) {

        $email = $row['email'];
        $password = $row['password'];
    
        $_SESSION['user_id'] = $row['user_id'];
        $myarray['data'] = 'successful';

        $myarray['message'] = $row;
    } else {
        $myarray['message'] = 'something went wrong';
    }

    echo json_encode($myarray);
}
?>

