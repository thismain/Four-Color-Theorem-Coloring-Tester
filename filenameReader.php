<?php
/*
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
*/
$subDir='data';
if(isset($_GET['subDir'])){$subDir=$_GET['subDir'];}

$filenames=array();

//the directory to scan for files
$dir="../graph2/".$subDir."/";

//last modified shown at the top
function mtimecmp($a, $b){
$mt_a=filemtime($a);
$mt_b=filemtime($b);
if($mt_a == $mt_b){return 0;}else if($mt_a < $mt_b){return -1;}else{return 1;}
}//end mtimecmp

$filenames=glob($dir."*.{txt,TXT}", GLOB_BRACE);

usort($filenames, "mtimecmp");
array_reverse($filenames);
for($j=0;$j<count($filenames);$j++){$filenames[$j]=basename($filenames[$j]);}

?>
<script>
filenames='<?php echo json_encode($filenames); ?>';
</script>


