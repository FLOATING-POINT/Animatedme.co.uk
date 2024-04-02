<?php

if (isset($GLOBALS["HTTP_RAW_POST_DATA"])){
    // Get the data
    $imageData=$GLOBALS['HTTP_RAW_POST_DATA'];
 
    // Remove the headers (data:,) part. 
    // A real application should use them according to needs such as to check image type
    $filteredData=substr($imageData, strpos($imageData, ",")+1);
 
    // Need to decode before saving since the data we received is already base64 encoded
    $unencodedData=base64_decode($filteredData);
 
    //echo "unencodedData".$unencodedData; 
    // Save file.  This example uses a hard coded filename for testing,
    // but a real application can specify filename in POST variable
    $filename = "gallery/".microtime().'.png';
    $filename = str_replace(' ','', $filename);
    //$filename = str_replace('.','', $filename);
    $filename = preg_replace('/\./', '', $filename, 1);

    $fp = fopen( $filename, 'wb' );
    fwrite( $fp, $unencodedData);
    fclose( $fp );

    echo $filename.'|'.md5($filename.'sparkfunfestival');

}


?>