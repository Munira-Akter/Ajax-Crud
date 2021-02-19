<?php

 include_once "../vendor/autoload.php";

 use App\Controller\User;

  $staff = new User;

  $cell = $_POST['cell'];

  $data = $staff -> cellCheck($cell);

  if($data == true){
  	echo "ok";
  }else{
  	echo "not";
  }
  


