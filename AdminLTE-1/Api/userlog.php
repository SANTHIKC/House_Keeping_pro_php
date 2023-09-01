<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "home_service");

if (mysqli_connect_errno()) {
    die("Error in connection");
}

$email = "abhi@gmail.com"; 
$user_name = "abhi"; 
$user_id = 1;
$type='user';



    
    

$result = mysqli_query($conn, "SELECT * FROM user_reg WHERE user_id='$user_id'AND email='$email' AND user_name='$user_name' ");

if ($type == 'user') {
    $myarray['data'] = 'User registration successful';
} else {
    $myarray['data'] = 'User type is not user';
}  

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        // Fetch both email and password from the database
        $user_id=$row['user_id'];
        $email = $row['email'];
        $password = $row['password'];
        $user_name=$row['user_name'];

        $_SESSION['user_id'] = $row['user_id'];
        $myarray['message'] = 'success';
    } else {
        $myarray['message'] = 'something went wrong';
    }

    echo json_encode($myarray);
}
?>

