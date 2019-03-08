<?php
function getSeat($N,$M,$arr){
    if($N > 2 * $M){
        return false;
    }
    if($N == $M){
        return;
    }
    $result = array();
    //需要单桌的人数
    $single = 2 * $M - $N;
    sort($arr);

    for($i = 0;$i<($N-$single)/2;$i++){
        $result[$i] = $arr[$i] + $arr[$N-$single-$i-1];
    }

    return max($result);
}

$handle = fopen ("php://stdin","r");
$s = fgets($handle);
while ($s != "</br>") {
    $a = explode(" ", $s);
    $N = $a[0];
    $M = $a[1];

    print ("\n");
    $s = fgets($handle);
}
fclose($handle);

$arr = array(4,1,8,2,6);
$a = getSeat(5,3,$arr);
print_r($a);
?>