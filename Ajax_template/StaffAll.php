<?php

  require_once "../vendor/autoload.php";

  use App\Controller\User;

  $staff = new User;

  $data = $staff ->  allStaff();
  $i =1 ; 
  while($alldata = $data -> fetch_assoc()):
?>

  <tr>
							<td><?php echo $i; $i++ ; ?></td>
							<td><?php echo $alldata ['name']?> </td>
							<td><?php echo $alldata ['email']?></td>
							<td><?php echo $alldata ['cell']?></td>
							<td><img src="photos/Staffs/<?php echo $alldata ['photo']?>" alt=""></td>
							<td>

							<?php
								if($alldata['status'] == 'active' ):
							?>
								<a href="#" class="btn btn-sm btn-success" id="active_id" active_id="<?php echo $alldata ['id']?> " ><i class="fas fa-toggle-on"></i></a>

							<?php
								else:
							?>
								<a href="#" class="btn btn-sm btn-dark" id="inactive_id" inactive_id="<?php echo $alldata ['id']?> " ><i class="fas fa-toggle-off"></i></a>

								<?php endif; ?>


								<a href="#" class="btn btn-sm btn-info"id="view_id" view_id="<?php echo $alldata ['id']?> " ><i class="fas fa-eye"></i></a>

								<a class="btn btn-sm btn-primary" href="#" id="staff_update_modal" edit_id="<?php echo $alldata ['id']?>"><i class="fas fa-edit"></i></a>

								<a id="delete_id" delete_id="<?php echo $alldata ['id']?> " class="btn btn-sm btn-danger" href="#"><i class="fas fa-trash-alt"></i></a>
							</td>
						</tr>


  <?php endwhile; ?>