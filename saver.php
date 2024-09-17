<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$graphData="";
$saving="";
$loading="";
$dataFileName="default.txt";

if(isset($_GET['graphData'])){$graphData=$_GET['graphData'];}else{$graphData='';}

if(isset($_GET['saving'])){$saving=$_GET['saving'];}
else{$saving='';}

if(isset($_GET['loading'])){$loading=$_GET['loading'];}
else{$loading='';}

if(isset($_GET['dataFileName'])){$dataFileName=$_GET['dataFileName'];}
else{$dataFileName='default.txt';}


if($saving){

$graphDataFile=fopen("/storage/emulated/0/Venter/HopWeb/Projects/graph/data/".$dataFileName, "w") or die("Unable to open file!");
fwrite($graphDataFile, $graphData);
fclose($graphDataFile);
}//saving


if($loading){
$graphDataFile=fopen("/storage/emulated/0/Venter/HopWeb/Projects/graph/data/".$dataFileName, "r") or die("Unable to open file!");
$graphData=fread($graphDataFile,filesize("data/".$dataFileName));
fclose($graphDataFile);
}//loading

echo $graphData;
?>
<html>
<head></head>
<body style="font-size:40px;font-family:monospace;overflow-vertical:scroll;";>
<script>
dataSend='<?php echo $graphData?>';
</script>
</body>
</html>