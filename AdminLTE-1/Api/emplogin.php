<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "home_service");

if (mysqli_connect_errno()) {
    die("Error in connection");
}

$email = "abin@gmail.com"; 

$result = mysqli_query($conn, "SELECT * FROM employee_reg WHERE email='$email'");

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        // Fetch both email and password from the database
        $emailFromDB = $row['email'];
        $passwordFromDB = $row['password'];

        
        $_SESSION['emp_id'] = $row['emp_id'];
        $myarray['message'] = 'success';
    } else {
        $myarray['message'] = 'something went wrong';
    }

    echo json_encode($myarray);
}
