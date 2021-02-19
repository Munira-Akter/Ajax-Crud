<?php

  require_once "../vendor/autoload.php";

  use App\Controller\User;

  $staff = new User;


    // staff data add

    $name = $_POST['name'];
    $email = $_POST['email'];
    $cell = $_POST['cell'];


    // file upload function

    $file_name = $_FILES['profile']['name'];
    $file_name_tmp = $_FILES['profile']['tmp_name'];

    $photo = md5(time()) . $file_name;

    move_uploaded_file($file_name_tmp , '../photos/Staffs/'  . $photo);


    $data = $staff -> StaffInsert($name,$email,$cell,$photo);

   if($data){
    echo '<p class="alert alert-success">Staff Add Successfully! <button class="close" data-dismiss="alert">&times;</button></p>';
  }
  














