<?php
//数字转换机
$info_array = explode(' ',trim(fgets(STDIN)));
if($info_array[2] / $info_array[0] != $info_array[3] / $info_array[1]){
    echo -1;
    return;
}

$beishu = floor($info_array[2] / $info_array[0]);
if($beishu % 2 == 0){
    echo $info_array[2] % $info_array[0] + $beishu / 2;
}
else{

}
?>