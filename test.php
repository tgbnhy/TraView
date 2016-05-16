<?php
//include "includes/functions.php";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
$lat = -37.881654;
$lng = 145.133312;

$lat = -37.897318;
$lng = 145.011187;
$MIN_LAT = -38.084735;
$MAX_LAT = -37.676849; //0.407886                
$MIN_LNG = 144.542231;
$MAX_LNG = 146.944805;//2.402574

$y = ($lat-$MIN_LAT)/($MAX_LAT - $MIN_LAT);
$x = ($lng-$MIN_LNG)/($MAX_LNG - $MIN_LNG);

$x1 = 0.24609375;
$y1 = 0.49609375;
$x2 = 0.25;
$y2 = 0.5;

echo $lat." - ".$lng."</br>";

echo $x1." - ".$x." - ".$x2."</br>";
echo $y1." - ".$y." - ".$y2."</br>";

//$x = 0.24609375;
//$y = 0.49609375;

$lat = $y*($MAX_LAT - $MIN_LAT) + $MIN_LAT;
$lng = $x*($MAX_LNG - $MIN_LNG) + $MIN_LNG;

echo $lat." - ".$lng."</br>";
*/
$output = shell_exec('main.exe 31.08,144.23,33.12,144.12,35.34,143.56,34.78,145.89,32.12,144.01 tower,coffee,square');
echo "<pre>$output</pre>";
/*
$oparray = preg_split("[\n]", $output);
foreach ($oparray as $row){
    echo 
    d$row.'</br>';
}
 */
//print_r($oparray);