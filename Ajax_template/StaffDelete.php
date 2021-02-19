<?php

  require_once "../vendor/autoload.php";

  use App\Controller\User;

  $staff = new User;

  $delete_id = $_POST['del_id'];

  $data = $staff -> deleteId($delete_id);
  
  if($data){
    echo '<p class="alert alert-success">Staff Delete Successfully! <button class="close" data-dismiss="alert">&times;</button></p>';
  }
  


