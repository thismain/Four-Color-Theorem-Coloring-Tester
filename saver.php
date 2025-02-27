<?php
/*
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
*/
$dir="../graph2/data/";
$dataFileName="pentagon.txt";
$graphData=file_get_contents("php://input"); 

if(isset($_GET['dataFileName'])){$dataFileName=$_GET['dataFileName'];}
else{$dataFileName='pentagon.txt';}

file_put_contents($dir.$dataFileName,$graphData);
?>
