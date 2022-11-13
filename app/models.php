<?php 




/***
 * Create a Data 
 */
function createData($location, $array) {

    $data = json_decode(file_get_contents($location), true);
    array_push($data, $array);
    file_put_contents($location, json_encode($data));

}



/***
 * Read a Data 
 */
function readData( $location ) {

    return json_decode(file_get_contents($location), false);    

}