<?php

  require_once "../vendor/autoload.php";

  use App\Controller\User;

  $staff = new User;
  $name = $_POST['name'];
  $id = $_POST['id'];
  $email = $_POST['email'];
  $cell = $_POST['cell'];
  $old_photo = $_POST['old_profile'];

  // photo update
  $file_name = $_FILES['new_profile']['name'];
  $file_tmp_name = $_FILES['new_profile']['tmp_name'];

  $new_photo = md5(time().rand()) . $file_name;
  

 if(!empty($file_name)){
  move_uploaded_file( $file_tmp_name, '../photos/Staffs/' . $new_photo);
  $photo =  $new_photo;
  unlink('../photos/Staffs/' . $old_photo);
  
 }else{
  $photo =  $old_photo;
 }


 $data =  $staff -> staff_Update_data($name,$email,$cell,$photo,$id);

 if($data){
  echo '<p class="alert alert-success">Staff Update Successfully! <button class="close" data-dismiss="alert">&times;</button></p>';
 }