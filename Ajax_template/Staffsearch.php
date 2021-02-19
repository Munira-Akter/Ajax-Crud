<?php

  require_once "../vendor/autoload.php";

  use App\Controller\User;

  $staff = new User;

  $search = $_POST['serach'];

  $data = $staff -> staffserach($search);

  	while ($sigleData  = $data -> fetch_assoc()):
  	  ?>


  	<li class ="clearfix">
		<img src="photos/Staffs/<?php echo $sigleData['photo']?>" style="float: left ; width: 50px; height: 50px;">
		<a href="#" style="float: left;"> <?php echo $sigleData['name']?> </a>
	 </li>
	<hr>



  <?php endwhile;?>

