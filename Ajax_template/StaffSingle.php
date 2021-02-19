<?php

  require_once "../vendor/autoload.php";

  use App\Controller\User;

  $staff = new User;

  $view_id = $_POST['view_id'];

  $data = $staff -> staffSingle($view_id);

  $sigleData = $data -> fetch_assoc();

  echo json_encode($sigleData);

 