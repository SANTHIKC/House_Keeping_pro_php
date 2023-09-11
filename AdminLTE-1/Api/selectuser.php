<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "home_service");

if (mysqli_connect_errno()) {
    die("Error in connection");
}
      
$result = mysqli_query($conn, "SELECT * FROM user_reg  ");



if ($result) {
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);

    
    if ($count == 1 ) {
    
        $_SESSION['user_id'] = $row['user_id'];
        $myarray['data'] = 'successful';

        $myarray['message'] = $row;
    } 
    
    else {
        $myarray['message'] = 'something went wrong';
    }
    

    echo json_encode($myarray);
}
?>

