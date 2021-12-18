<?php 

namespace App\supporters;
/**this class is for all validation
 * 
*/
class Validate{

    /**
     * validate message
     */
    public static function mgs($text, $type='danger'){
       return "<p class=\"alert alert-{$type}\">{$text} <button class=\"close\" data-dismiss=\"alert\">&times;</button></p>";
    }

    /**
     * show validate mgs
     */
    public static function showMgs($mgs){
        echo $mgs ?? '';
    }

    /**
     * email validation
     */
    public static function validEmail($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)==true) {
            return true;
        } else {
            return false;
        }
        
    }


     /**
     * upload file
     */
    public static function upload_file($file, $path='/'){
    

        $file_name= time() . '-' . rand() . '-' . $file['name'];
        $file_tmp= $file['tmp_name'];
        $file_size= $file['size'];
        move_uploaded_file($file_tmp, $path . $file_name);
        return $file_name;



    }

    /**
     * get old data into input field
     */
    public static function oldData($name){
       
       echo $_POST[$name] ?? '';
        
    }

    /**
     * clear data from input field
     */
    public static function clearData(){
        echo $_POST="";
    }

    /**
     * phone number validation
     */
    public static function validPhone($cell){
            $length= strlen($cell);
            if (substr($cell, 0, 2)=='01' || $length>10) {
                return true;
            }elseif (substr($cell, 0, 4)=='8801' || $length>12) {
                return true;

            }elseif (substr($cell, 0, 5)=='01' || $length>13) {
                return true;
            } else {
                return false;

            }
            
    }

    /**
     * 
     */









}


?>