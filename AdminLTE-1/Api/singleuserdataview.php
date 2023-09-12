

<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "home_service");

if (mysqli_connect_errno()) {
    die("Error in connection");
}



$query = mysqli_query($conn,"SELECT * FROM user_reg ");
$data=mysqli_fetch_assoc($query);
if($query)
{
     $myarray['data'] =$data ;
}
else
{
    $myarray['message'] = 'failed';
}
echo json_encode($myarray);
?>


