<?php
namespace App\controllers;

/**
 * this class is for controlling all data for a staff
 */
class StaffController extends TeacherController {

    /**
     * insert data into staff table
     */
    public function sent_staff_data($name, $email, $cell, $post, $gender){
        return parent::create("INSERT INTO staffs (name, email, cell, post, gender) VALUE ('$name', '$email', '$cell', '$post', '$gender')");
    }

    /**
     * get all data from staff table
     */
    public function all_staff_data(){
        return parent::all('staffs');
    }

    /**
     * select all data for a single id
     */
    public function single_staff_data($id){
        return parent::singleData('staffs', $id);
    }

    /**
     * upload staff photo
     */
    public function upload_staff_photo($photo, $id){
        return parent::uploadPhoto('staffs', $photo, $id);
    }

    /**
     * update all data for a single staff
     */
    public function update_staff_data($name, $email, $cell, $post, $gender, $id){
        return parent::updateStaffData($name, $email, $cell, $post, $gender, $id);
     }












}








?>