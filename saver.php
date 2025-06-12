<?php
ini_set('display_errors','1');
ini_set('display_startup_errors','1');
error_reporting(E_ALL);
//ini_set("log_errors", 1);
//ini_set("error_log", "/tmp/php-error.log");
//error_log( "Hello, errors!" );



$path='../graph2/';
$dir='data';
$fileName='default.txt';
$data=file_get_contents("php://input");

if(isset($_GET['dir'])){$dir=$_GET['dir'];
}else{$dir='data';}

if(isset($_GET['fileName'])){$fileName=$_GET['fileName'];
}else{$fileName='default.txt';}
/*
if($fileName=='mergedStats.txt'){

$existingData=file_get_contents('./stats/mergedStats.txt');

$json=json_decode($existingData);
$data=json_decode($data);

$alreadyThere=false;

foreach($json as $ex){
if($data->numVerts==$ex->numVerts){
$alreadyThere=true;


$combinedAvgPctFlex=
($data->flexiblesCountAvgPercent*
$data->numSolves+
$ex->flexiblesCountAvgPercent*
$ex->numSolves)/
($data->numSolves+$ex->numSolves);

$combinedAvgPctFlex=round($combinedAvgPctFlex,2);

$combinedNumSolves=
$data->numSolves+$ex->numSolves;

$combinedDupes=
$data->dupeSolves+$ex->dupeSolves;


$combinedAvgFlex=
($data->flexiblesCountAvg*
$data->numSolves+
$ex->flexiblesCountAvg*
$ex->numSolves)/
($data->numSolves+$ex->numSolves);

$combinedAvgFlex=round($combinedAvgFlex,2);


if($data->maxFlexibles>$ex->maxFlexibles){
$ex->maxFlexibles=$data->maxFlexibles;
}
if($data->minFlexibles<$ex->minFlexibles){
$ex->minFlexibles=$data->minFlexibles;
}

$ex->graphDegree=(float)$ex->graphDegree;

$ex->flexiblesCountAvg=(float)$combinedAvgFlex;
$ex->flexiblesCountAvgPercent=(float)$combinedAvgPctFlex;
$ex->numSolves=$combinedNumSolves;
$ex->dupeSolves=$combinedDupes;


}//==
}//foreach



usort($json,function($a,$b){
return $a->numVerts-$b->numVerts;});
$existingData=json_encode($json);

if(!$alreadyThere){
$existingData=substr($existingData,0,-1);
$existingData=$existingData.",".json_encode($data);
$existingData=$existingData."]";
}//if(!$alreadyThere){

$json=json_decode($existingData);
usort($json,function($a,$b){
return $a->numVerts-$b->numVerts;});
$existingData=json_encode($json);

file_put_contents('./stats/mergedStats.txt',$existingData);
//print_r($existingData);
//file_put_contents($path.$dir.'/'.$fileName,$existingData);
}else{
*/
file_put_contents($path.$dir.'/'.$fileName,$data);
//}

?>
<script>
mergedStatsSaved='<?php echo json_encode($existingData); ?>';
</script>