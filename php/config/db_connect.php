<?php 

//connect to database
$conn = mysqli_connect('localhost', 'raufil', '5nowmonday', 'daily_tasks');

//check connection
if(!$conn){
  echo 'Connection error: ' . mysqli_connect_error();
}


 ?>