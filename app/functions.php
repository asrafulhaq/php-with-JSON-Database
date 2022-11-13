<?php 

/**
 * Validator Message 
 */
function validate($message , $type = 'danger'){

    return "<p class=\"alert alert-{$type} d-flex justify-content-between\">{$message} <button class=\"btn-close\" data-bs-dismiss=\"alert\" ></button></p>";

}

/**
 * Phone Validate BD
 */
function isPhone ($cell){

    $d2 =  substr($cell, 0, 2); 
    $d4 =  substr($cell, 0, 4); 
    $d5 =  substr($cell, 0, 5); 

    if( $d2 == '01' || $d4 == '8801' || $d5 == '+8801' ){
        return true;
    } else {
        return false;
    }

}



/**
 * Phone Validate BD
 */
function saveFile ($file, $location = '/'){

   // file info 
   $filename = $file['name'];
   $filename_tmp = $file['tmp_name'];
   $file_arr = explode('.', $filename);
   $file_ext = end($file_arr);
   $filename_unique = md5(time().rand(100000, 1000000000)).'.'.$file_ext;

   move_uploaded_file($filename_tmp, $location . $filename_unique);

   return $filename_unique;

}


/**
 * Phone Validate BD
 */
function old ($name){

    echo $_POST[$name] ?? '';
 
}

/**
 * Phone Validate BD
 */
function clearForm (){

    return $_POST = [];
 
}

/**
 * Unique ID 
 */
function uniqueID($len = 10){

    $tmp_id = md5(time().rand(100, 10000000));
    return substr($tmp_id, 5, $len);

}

/**
 * Find Index 
 */
function findIndex($array, $col, $data) {
    return array_search( $data , array_column($array , $col));
}
 
 


