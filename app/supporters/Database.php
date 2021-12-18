<?php 

namespace App\supporters;

use mysqli;

/**
 * this class is for connection with database and  all kinds og query
 */
abstract class Database{

    /**
     * database connection propertise
     */

     private $host= HOST;
     private $user= USER;
     private $pass= PASS;
     private $db= DB;
     private $connection;

     /**
      * connection with database
      */
      private function connection(){
         return $this->connection= new mysqli($this->host, $this->user, $this->pass, $this->db);
      }

      /**
       * create data into database
       */
      protected function create($sql){
            return $this->connection()->query($sql);
      }

      /**
       * select all data from database
       */
      protected function all($table, $order='DESC'){
          return $this->connection()->query("SELECT * FROM {$table} ORDER BY id {$order}");
      
      }

      /**
       * select all data with id
       */
      protected function singleData($table, $id){
          return $this->connection()->query("SELECT * FROM {$table} WHERE id='{$id}'");
      }

      /**
       * set photo with id
       */
      protected function uploadPhoto($table, $photo, $id){
          return $this->connection()->query("UPDATE {$table} SET photo='{$photo}' WHERE id= '{$id}'");
      }

      /**
       * update all data for student into a col
       */
      protected function updateData($table, $name, $class, $section, $roll, $shift, $id){
          return $this->connection()->query("UPDATE {$table} SET name='{$name}', class='{$class}', section='{$section}', roll='{$roll}', shift='{$shift}' WHERE id= '$id' ");
      }

        /**
       * update all data for teacher into a col
       */
      protected function updateTeacherData( $name, $email, $cell, $department, $gender, $id){
        return $this->connection()->query("UPDATE teachers SET name='{$name}', email='{$email}', cell='{$cell}', department='{$department}', gender='{$gender}' WHERE id= '$id' ");
    }

            /**
       * update all data for staff into a col
       */
      protected function updateStaffData( $name, $email, $cell, $post, $gender, $id){
        return $this->connection()->query("UPDATE staffs SET name='{$name}', email='{$email}', cell='{$cell}', post='{$post}', gender='{$gender}' WHERE id= '$id' ");
    }












}






?>