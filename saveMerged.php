<?php

$mergedStats=file_get_contents("php://input");

file_put_contents('./stats/mergedStats.txt',$mergedStats);


?>