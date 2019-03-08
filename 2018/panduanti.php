<?php

$info_array = explode(' ',trim(fgets(STDIN)));

$n = $info_array[0];//总题数
$t = $info_array[1];//自认为正确
$a = $info_array[2];//实际正确


$t_no = $n - $t;
$a_no = $n - $a;

$score1 = $a > $t ? $t : $a;
$score2 = $a_no > $t_no ? $t_no : $a_no;
echo $score1 + $score2;
?>