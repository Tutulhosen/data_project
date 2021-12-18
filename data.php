<?php

use App\controllers\StudentController;

include_once "vendor/autoload.php";
$studentData= new StudentController;


?>






<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Students</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
	<!-- student card  -->

<div class="container">
	<a class="btn btn-primary btn-lg" href="signup.php">Add A New Student</a> 
	<a class="btn btn-primary btn-lg" href="index.php">Go Home</a> <br> <br>
	
	<div class="row">
			<?php
			
			/**
			 * student info
			 */
			$all_student_data_arr=$studentData->getData();
			

			while($all_student_data= $all_student_data_arr->fetch_object()) :
			
			
			
			
			?>
			
			<div  class="col-sm-3">			
				<div  class="card shadow">
					<div style="text-align: center; color:white; background-color: darkcyan;" class="card-body">

					<?php if(isset($all_student_data->photo)) : ?>
						<img style="height: 150px; width:150px; border-radius:50%;" src="assets/photo/student/<?php echo $all_student_data->photo; ?>" alt="">
						<?php else : ?>
							<img style="height: 150px; width:150px; border-radius:50%;" src="assets/media/img/avatar.png" alt="">
							<?php endif; ?>
						
						<br><br>
						<h4><?php echo $all_student_data->name ?></h4>
						<p>Class :<?php echo $all_student_data->class ?></p>
						<p>Roll: <?php echo $all_student_data->roll ?></p>
						<a class="btn btn-dark" style="text-decoration: none; color: white;" href="studentProfile.php?student_id=<?php echo $all_student_data->id; ?>">View Details</a>
					</div>
				</div>
	
		</div>


		<?php endwhile; ?>
		 


	</div>
	</div>








	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>

</html>