<?php 

namespace App\controllers;

use App\supporters\Database;

/**
 * this class is for controlled all query for the student table
 */
class StudentController extends Database{

    /**
     * sent data to student table
     */
    public function sentData($name, $class, $section, $roll, $shift){
            return parent::create("INSERT INTO students (name, class, section, roll, shift) VALUE ('$name', '$class', '$section', '$roll', '$shift')");
    }

    /**
     * get all data from student table
     */
    public function getData(){
                return parent::all('students');
    }
    /**
     * get all data for a single student
     */
    public function singleStudentData($id){
            return parent::singleData('students', $id);
    }

    /**
     * for photo upload
     */
    public function uploadStudentPhoto($photo, $id){

        return parent::uploadPhoto('students', $photo, $id);



    }

    /**
     * edit all data for a single id
     */
    public function editData( $name, $class, $section, $roll, $shift, $id){
            return parent::updateData('students', $name, $class, $section, $roll, $shift, $id);
    }














}












?>