<?php

 include_once "../vendor/autoload.php";

 use App\Controller\User;

  $staff = new User;

  $email = $_POST['email'];

  $data = $staff -> emailCheck($email);

  if($data == true){
  	echo "ok";
  }else{
  	echo "not";
  }
  


