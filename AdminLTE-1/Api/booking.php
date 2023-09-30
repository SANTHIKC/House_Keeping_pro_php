<?php
$conn=mysqli_connect("localhost","root","","home_service");
if(mysqli_connect_error())
{
    die("Error in connection");
}
$user_id=$_POST['user_id'];
$service_type=$_POST['service_type'];
$date=$_POST['date'];


$sql=mysqli_query($conn,"INSERT INTO booking ('user_id','service_type','date','status')Values('$user_id''$service_type','$date','pending')");




?>
