<?php
//彩色的砖块
$info_array = str_split(trim(fgets(STDIN)),1);
//$info_array = str_split("ABAB",1);
//print_r($info_array);
$length = count($info_array);

$arr = array_count_values($info_array);
if(count($arr) == 1){
    echo 1;
}
elseif (count($arr) == 2){
    echo 2;
}
else{
    echo 0;
}

?>