<?php

  require_once "../vendor/autoload.php";

  use App\Controller\User;

  $staff = new User;

  $edit_id = $_POST['edit_id'];

  $data = $staff -> staffSingleedit($edit_id);

  $sigleDataEdit = $data -> fetch_assoc();

  echo json_encode($sigleDataEdit);