<?php

use App\controllers\StudentController;
use App\supporters\Validate;

include_once "vendor/autoload.php";

$studentData= new StudentController;




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
					$class= $_POST['class'];
					$section= $_POST['section'];
					$roll= $_POST['roll'];
					if (isset($_POST['shift'])) {
					$shift= $_POST['shift'];
					}

					/**
					 * form validation
					 */
					if (empty($name) || empty($class) || empty($section) || empty($roll) || empty($shift)) {
						$mgs= Validate::mgs("All fields are require!");
					}else {
						$studentData->sentData($name, $class, $section, $roll, $shift);
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
						<h2>Student Info</h2>

					
					<?php 
					
					Validate::showMgs($mgs);
					
					?>

						<form action="" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label for="">Name</label>
								<input name="name" class="form-control" type="text" value="<?php  Validate::oldData('name') ?>">
							</div>

							<div class="form-group">
								<label for="">Class</label>
								<input name="class" class="form-control" type="text" value="<?php  Validate::oldData('class') ?>">
							</div>
							
							<div class="form-group">
								<label for="">Section</label>
								<input name="section" class="form-control" type="text" value="<?php  Validate::oldData('section') ?>">
							</div>

							<div class="form-group">
								<label for="">Roll</label>
								<input name="roll" class="form-control" type="text" value="<?php  Validate::oldData('roll') ?>">
							</div>

							<div class="form-group">
								<label for="">Shift</label> <br>
								<input name="shift" type="radio" id="morning" value="Morning">  <label for="morning">Morning</label>
								<input name="shift" type="radio" id="day" value="day"> <label for="day">Day</label>
							</div>





							<div class="form-group">
								
								<input name="submit" class="btn btn-primary" type="submit" value="Submit">

							</div>

						</form>
						<br>
						OR 
						<br><br>
						<a class="btn btn-success " href="data.php">See All Student</a>
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