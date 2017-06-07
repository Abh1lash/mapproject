<?php 



function writeToFile($path, $newLine) 
{
    $exists = file_exists($path);
    $handle = fopen($path, 'c');
    if (!$exists) {
        // first write to log file
        $line = '{"type":"FeatureCollection","features":[' .  PHP_EOL . $newLine . PHP_EOL . "]}";
    } else {
        // file exists so it has one or more logged lines
        $line = "," . PHP_EOL . $newLine . PHP_EOL . "]}";
        fseek($handle , -(strlen(PHP_EOL) + 2) , SEEK_END);
    }
    fwrite($handle, $line);
    fclose($handle);
}



if(!empty($_POST))
{


$path = $_POST['layer'] . ".geo.json";
writeToFile( $path ,  $_POST['message']);



}



?>