
<?php

use App\controllers\StudentController;
use App\supporters\Validate;

include_once "vendor/autoload.php";
$student_data= new StudentController;
if (isset($_GET['student_id'])) {
    $student_id= $_GET['student_id'];

    $single_student_data_arr= $student_data->singleStudentData($student_id);
    $single_student_data = $single_student_data_arr->fetch_object();





}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php echo $single_student_data->name; ?></title>


    <!--CSS FILES-->
    <link rel="stylesheet" href="assets/font/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <!--FAVINCON-->
    <link rel="shortcut icon" href="assets/img/icon.png" type="image/x-icon">

</head>
<body>

<div class="container">
        <div class="row">
            <div class="col-md-10 offset-1">
            <div class="profile_menu">
    
        
            <ul class="nav navbar d-flex justify-content-center">
                <li class="nav-item"><a style="margin: 10px; height:30px; width:130px; padding-bottom:30px;" class="nav-link btn btn-primary" href="index.php">Home</a></li>
                <li class="nav-item"><a style="margin: 10px; height:30px; width:130px; padding-bottom:30px;" class="nav-link btn btn-primary" href="studentEdit.php?student_id=<?php echo $single_student_data->id;  ?>">Edit Profile</a></li>
                <li class="nav-item"><a style="margin: 10px; height:30px; width:130px; padding-bottom:30px;" class="nav-link btn btn-primary" href="">Upload Photo</a></li>
                <li class="nav-item"><a style="margin: 10px; height:30px; width:130px; padding-bottom:30px;" class="nav-link btn btn-primary" href="data.php">All Student</a></li>
            </ul>
        
    </div>
</div>
            </div>
        </div>
        <?php
        $mgs="";

            if (isset($_POST['upload'])) {
                $file=$_FILES['photo'];
                
                if (empty($_FILES['photo']['name'])) {
                    $mgs= Validate::mgs("Please select a photo");
                   

                } else {
                 
                    $photo= Validate::upload_file($file, 'assets/photo/student/');
                    $student_data->uploadStudentPhoto($photo, $single_student_data->id);
                    
                    
                   

                    
                }
                



            } 
            
        
        ?>

<div class="row">
  <div class="col-md-4 offset-4">
<div class="profile_body ">
    <div style="text-align: center;" class="card shadow">
        <div class="card-body ">

            <?php if(isset($single_student_data->photo)) : ?>
                <img style="height: 250px; width:250px; border-radius:50%" src="assets/photo/student/<?php echo $single_student_data->photo; ?>" alt="">
                <?php else : ?>
            <img style="height: 250px; width:250px; border-radius:50%" src="assets/media/img/avatar.png" alt="">
            <?php endif; ?>
            
            
            
            <br><br>
            <?php 
            
            Validate::showMgs($mgs);
            
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input name="photo" type="file">
                    <input name="upload" type="submit" value="upload">
                </div>
            </form>
            

    
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