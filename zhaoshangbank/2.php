<?php
$nk = explode(" ", trim(fgets(STDIN)));
$n = $nk[0];
$k = $nk[1];
$info_array = explode(" ", trim(fgets(STDIN)));

sort($info_array);
 $arr = array();
for($i = $n-1;$i>=0;$i++){
    if($i < $n-1){
        $num = $info_array[$i] - $info_array[$i-1];
    }
    else{
        $num = 0;
    }

}

print_r($info_array);
?>