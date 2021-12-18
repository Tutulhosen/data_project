<?php

use App\controllers\TeacherController;
use App\supporters\Validate;

include_once "vendor/autoload.php";
$teacherData= new TeacherController;






?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>SignUp</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>







			<!--form area-->
				<?php 




				/**
				 * form isseting
				 */

					$mgs= "";

					if (isset($_POST['submit'])) {
					
					/**
					 * get value from input field
					 */
					$name= $_POST['name'];
					$email= $_POST['email'];
					$cell= $_POST['cell'];
					$department= $_POST['department'];
					if (isset($_POST['gender'])) {
					$gender= $_POST['gender'];
					}

					/**
					 * form validation
					 */
					if (empty($name) || empty($email) || empty($cell) || empty($department) || empty($gender)) {
						$mgs= Validate::mgs("All fields are require!");
					}elseif (Validate::validEmail($email) == false) {
						$mgs= Validate::mgs("Invaid Email Address", "warning");

					}elseif (Validate::validPhone($cell)==false) {
						$mgs= Validate::mgs("Invaid Phone number", "warning");

					} else {
						$teacherData->sent_teacher_data($name, $email, $cell, $department, $gender);
						$mgs= Validate::mgs("Successfully add the student info", "success");
						Validate::clearData();
					}
					









				}
				
				
				
				
				
				
				?>

			<div class="container-fluit">
				<div class="row">
					<div class="col-md-4 offset-4">
					<div class=" shadow">
				<div class="card">
					<div class="card-body">
						<h2>Teacher Info</h2>

					
					<?php 
					
					Validate::showMgs($mgs);
					
					?>

						<form action="" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label for="">Name</label>
								<input name="name" class="form-control" type="text" value="<?php Validate::oldData('name'); ?>">
							</div>

							<div class="form-group">
								<label for="">Eamil</label>
								<input name="email" class="form-control" type="text" value="<?php Validate::oldData('email'); ?>">
							</div>
							
							<div class="form-group">
								<label for="">cell</label>
								<input name="cell" class="form-control" type="text" value="<?php Validate::oldData('cell'); ?>">
							</div>

							<div class="form-group">
								<label for="">Department</label>
								<input name="department" class="form-control" type="text" value="<?php Validate::oldData('department'); ?>"> 
							</div>

							<div class="form-group">
								<label for="">Gender</label> <br>
								<input name="gender" type="radio" id="male" value="Male">  <label for="male">Male</label>
								<input name="gender" type="radio" id="female" value="Female"> <label for="female">Female</label>
							</div>





							<div class="form-group">
								
								<input name="submit" class="btn btn-primary" type="submit" value="Submit">

							</div>

						</form>
						<br>
						OR 
						<br><br>
						<a class="btn btn-success " href="teacherData.php">See All Student</a>
					</div>
				</div>
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