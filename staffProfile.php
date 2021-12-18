
<?php

use App\controllers\StaffController;

include_once "vendor/autoload.php";
$staff_data= new StaffController;


if (isset($_GET['staff_id'])) {
    $staff_id= $_GET['staff_id'];
    $single_staff_data_arr= $staff_data->single_staff_data($staff_id);
    $single_staff_data= $single_staff_data_arr->fetch_object();







}else {
    header('location:staffData.php');
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php echo $single_staff_data->name; ?></title>


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
                <li class="nav-item"><a style="margin: 10px; height:30px; width:130px; padding-bottom:30px;" class="nav-link btn btn-primary" href="staffEdit.php?staff_id=<?php echo $single_staff_data->id;  ?>">Edit Profile</a></li>
                <li class="nav-item"><a style="margin: 10px; height:30px; width:130px; padding-bottom:30px;" class="nav-link btn btn-primary" href="staffPhoto.php?staff_id=<?php echo $single_staff_data->id; ?>">Upload Photo</a></li>
                <li class="nav-item"><a style="margin: 10px; height:30px; width:130px; padding-bottom:30px;" class="nav-link btn btn-primary" href="staffData.php">All Staff</a></li>
            </ul>
        
    </div>
</div>
            </div>
            </div>


<div class="row">
  <div class="col-md-6 offset-3">
<div class="profile_body ">
    <div style="text-align: center;" class="card shadow">
        <div class="card-body ">
            <?php if($single_staff_data->photo) :?>
            <img style="height: 300px; width:300px; border-radius:50%" src="assets/photo/staff/<?php echo $single_staff_data->photo; ?>" alt="">
            <?php else : ?>
                <img style="height: 300px; width:300px; border-radius:50%" src="assets/media/img/avatar.png" alt="">
                <?php endif; ?>
            
            <br><br>
            <h2><?php echo $single_staff_data->name; ?></h2><br>
            <table class="table table-bordered ">
                <tr>
                    <td>Name</td>
                    <td><?php echo $single_staff_data->name; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $single_staff_data->email; ?></td>
                </tr>
                <tr>
                    <td>Cell</td>
                    <td><?php echo $single_staff_data->cell; ?></td>
                </tr>
                <tr>
                    <td>Post</td>
                    <td><?php echo $single_staff_data->post; ?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><?php echo $single_staff_data->gender; ?></td>
                </tr>
            </table>
    
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