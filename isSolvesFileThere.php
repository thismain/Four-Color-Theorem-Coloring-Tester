<?php

$fileExists=false;
$solveFileUrl='notThere.txt';

if(isset($_GET['solveFileUrl'])){$solveFileUrl=$_GET['solveFileUrl'];}

$fileExists=file_exists($solveFileUrl);

$statusResponse=array("fileExists"=>$fileExists);

echo json_encode($statusResponse);
?>


