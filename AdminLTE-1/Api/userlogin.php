<?php 
session_start();
$conn=mysqli_connect("localhost","root","","home_service");
if(mysqli_connect_error())
{
    echo("Error in connection");
}
     
   
    $username="anil@gmal.com";
    $result=mysqli_query($conn,"SELECT * FROM  WHERE  email='$username'  ");
    if($result)

    {
         
        $row =mysqli_fetch_assoc($result);
        
        $count=mysqli_num_rows($result);
        if($count==1)
        {
         
            $_SESSION['user_id'] =$row['user_id'];
            $myarray['messege']='success';
            
        }
    }
    else
    {
        $myarray['message']='somthing went wrong';
      
      echo json_encode("Error");
    }

    
 
 
?>