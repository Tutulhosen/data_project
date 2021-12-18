<?php
namespace App\controllers;


/**
 * this class is controller all teacher data with database
 */
class TeacherController extends StudentController{
    /**
     * send data to teacher table
     */
    public function sent_teacher_data($name, $email,$cell, $department, $gender){
        return parent::create("INSERT INTO teachers (name, email, cell, department, gender) VALUE ('$name', '$email', '$cell', '$department', '$gender')");
    }

    /**
     * get all data from student table
     */
    public function all_teacher_data(){
        return parent::all('teachers');
    }

    /**
     * get all data for a single id
     */
    public function single_teacher_data($id){
        return parent::singleData('teachers', $id);
    }

        /**
     * for photo upload
     */
    public function uploadTeacherPhoto($photo, $id){

        return parent::uploadPhoto('teachers', $photo, $id);



    }

    /**
     * for update teacher data
     */
    public function update_teacher_data($name, $email, $cell, $department, $gender, $id){

        return parent::updateTeacherData($name, $email, $cell, $department, $gender, $id);
        
    }











}






?>