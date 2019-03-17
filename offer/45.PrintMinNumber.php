<?php

function PrintMinNumber6($numbers){

    usort($numbers,function ($str1,$str2){
        if($str1.$str2 > $str2.$str1){
            return 1;
        }
        else{
            return -1;
        }
    });
    return implode('',$numbers);
}

function PrintMinNumber($numbers)
{
    // write code here
    sort($numbers);
    $len = count($numbers);
    $temp = $numbers[0];
    for($i = 1; $i<$len; $i++){
        $str1 = $temp.$numbers[$i];//echo $str1;echo "<br>";
        $str2 = $numbers[$i].$temp;//echo $str2;echo "<br>";
        if((int)$str1 > (int)$str2){
            $temp = $str2;
//            echo '---'.$temp;echo "<br>";
        }else{
            $temp = $str1;
        }
    }
    return $temp;
}

$numbers = [36,5,1,4,29];
echo PrintMinNumber($numbers);

?>