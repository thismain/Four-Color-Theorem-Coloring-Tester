<?php
/*
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
*/
$dir="../graph2/data/";
$dataFileName="pentagon.txt";
$numFileSizeChecks=0;
$fileExists=false;
$status='not_found';
$fileSize=0;

if(isset($_GET['dataFileName'])){$dataFileName=$_GET['dataFileName'];}
else{$dataFileName='pentagon.txt';}

if(isset($_GET['lastFileSize'])){
$lastFileSize=$_GET['lastFileSize'];
}else{$lastFileSize=0;}

if(isset($_GET['numFileSizeChecks'])){
$numFileSizeChecks=$_GET['numFileSizeChecks'];
}else{$numFileSizeChecks=0;}


if(!$fileExists){
$fileExists=file_exists($dir.$dataFileName);
}

if($fileExists){
$fileSize=filesize($dir.$dataFileName);

if($fileSize>0&&$fileSize==$lastFileSize&&$numFileSizeChecks>3){
$status='done_saving';
}else{
$status='in_progress';
}

}else if(!$fileExists){
$status='save_error';
}

$lastFileSize=$fileSize;

$statusResponse=array(
"fileExists"=>$fileExists,
"lastFileSize"=>$lastFileSize,
"status"=>$status
);

echo json_encode($statusResponse);

?>
