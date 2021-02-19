<?php require_once "vendor/autoload.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/all.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>

	<div class="msg"></div>
	<div class="wrap-table shadow">
		<a href="#modalshow" class="btn btn-info btn-lg" data-toggle="modal">Add Staff</a>
		<div class="card">
			<div class="card-body">
				<h2>All Data</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="alldata">

					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- modal user add -->
	<div class="modal fade" id="viewSingle">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h2>Staff Profile</h2>
					<button class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<table class="table table-striped">
						<tbody id="singledata">
							<tr>
								<td style="margin:auto;"> <img src="photos/Staffs/<?php echo $sigleData['photo']?>"
										style="width: 100% ; height:250px; margin-bottom:20px;" alt="" ></td> <br>
							</tr>
							<tr>
								<td>Name : </td>
								<td id="naam">Name</td>
							</tr>
							<tr>
								<td>Email : </td>
								<td id="mail">Email</td>
							</tr>
							<tr>
								<td>Cell : </td>
								<td id="phone">Cell</td>
							</tr>

						</tbody>
					</table>
				</div>
				<div class="modal-footer">

				</div>
			</div>
		</div>
	</div>

	<!-- modal user add -->
	<div class=" modal fade" id="modalshow">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h2>Add Staff</h2>
					<button class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">

					<p></p>

					<div class="card-body">
						<form action="" id="Staffform" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label for="">Name</label>
								<input class="form-control" type="text" name="name">
							</div>
							<div class="form-group">
								<label for="">Email</label>
								<input class="form-control" type="text" name="email" id="email_check">
								<span id="value_check"></span>
							</div>
							<div class="form-group">
								<label for="">Cell</label>
								<input class="form-control" type="text" name="cell" id="cell_check">
								<span id="value_check_cell"></span>
							</div>
							<div class="form-group">
								<label for="" id="photo_label">Photo</label> &nbsp; &nbsp;
								<label for="photofor"><img id="photo_icon" src="assets\media\img\pp_photo\camera.png" width="60" alt="camera-icon"></label>


								<input class="form-control-file" style="display: none;" type="file" id="photofor"
								name="profile"><br><br>
								<img src="" id="imgshow" style="max-width:100%;"> <br><br>
								<a href="#" id="remove_photo" style="display:none;">Remove Photo</a>
							</div>
							<div class="form-group">
								<input class="btn btn-primary" type="submit" value="Sign Up" id="add_vlue" >
							</div>
						</form>
					</div>
				</div>
				<div class="modal-footer">
					<h5 class="text-dark" style="font-size: 14px; text-align:left;">Create Account with Facebook</h5>
				</div>
			</div>
		</div>
	</div>



		<!-- modal user add -->
		<div class="modal fade" id="modal_update">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h2>Update Staff</h2>
					<button class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
				<p class="msg"></p>
					<div class="card-body">
						<form action="" id="Staffform_update" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label for="">Name</label>
								<input class="form-control" type="text" name="name">
								<input class="form-control" type="hidden" name="id">
							</div>
							<div class="form-group">
								<label for="">Email</label>
								<input class="form-control" type="text" name="email">
							</div>
							<div class="form-group">
								<label for="">Cell</label>
								<input class="form-control" type="text" name="cell">
							</div>
							<div class="form-group">
								<label for="" id="photo_label-up">Photo</label> &nbsp; &nbsp;
								<label for="photofor-up"><img id="photo_icon-up" src="assets\media\img\pp_photo\camera.png" width="60" alt="camera-icon"></label>

								<input class="form-control-file" style="display: none;" type="hidden" 
								name="old_profile"><br><br>
								
								<input class="form-control-file" style="display: none;" type="file" id="photofor-up"
								name="new_profile"><br><br>
								

								<img src="" id="imgshow-up" style="max-width:100%;"> <br><br>
								<a href="#" id="remove_photo-up" style="display:none;">Remove Photo</a>
							</div>
							<div class="form-group">
								<input class="btn btn-primary" type="submit" value="Update">
							</div>
						</form>
					</div>
				</div>
				<div class="modal-footer">
					<h5 class="text-dark" style="font-size: 14px; text-align:left;">Create Account with Facebook</h5>
				</div>
			</div>
		</div>
		</div>




		<!-- JS FILES  -->
		<script src="assets/js/jquery-3.4.1.min.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/custom.js"></script>
</body>

</html>