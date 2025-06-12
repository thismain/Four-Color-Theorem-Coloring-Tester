<?php

$path='../graph2/';
$dir='data';
$fileName='default.txt';
$numFileSizeChecks=0;
$fileExists=false;
$status='not_found';
$fileSize=0;

if(isset($_GET['dir'])){$dir=$_GET['dir'];
}else{$dir='data';}

if(isset($_GET['fileName'])){$fileName=$_GET['fileName'];
}else{$fileName='default.txt';}

if(isset($_GET['lastFileSize'])){
$lastFileSize=$_GET['lastFileSize'];
}else{$lastFileSize=0;}

if(isset($_GET['numFileSizeChecks'])){
$numFileSizeChecks=$_GET['numFileSizeChecks'];
}else{$numFileSizeChecks=0;}


if(!$fileExists){
$fileExists=file_exists($path.$dir.'/'.$fileName);
}

if($fileExists){
$fileSize=filesize($path.$dir.'/'.$fileName);

if($fileSize>0&&$fileSize==$lastFileSize){//&&$numFileSizeChecks>3){
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
