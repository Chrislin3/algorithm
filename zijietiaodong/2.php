<?php
//$N = trim(fgets(STDIN));
$N = 1;
for($i = 0;$i<$N;$i++){
   // $string[$i] = trim(fgets(STDIN));
    $string[$i] = "woooooooooow";
    $arr = str_split($string[$i]);
    $length = count($arr);
    if($length >= 3){
        $same = 1;
        for($j = 1;$j<$length;$j++){
//            echo $arr[$j-1];
//            echo "</br>";
//            echo $arr[$j];
//            echo "</br>";
           if($arr[$j-1]==$arr[$j]){
               $same ++;
           }
           else{
               $same = 1;
           }
           if($same >= 3){
               $j--;
               unset($arr[$j]);
               $arr = array_filter(array_values($arr));
               print_r($arr);
           }
            echo $same;
            echo "</br>";
        }

    }

    if($length >= 4){
        for($j = 3;$j<$length;$j++){
            if($arr[$j-3]==$arr[$j-2] && $arr[$j-1]==$arr[$j]){
                unset($arr[$j]);
            }
        }
    }

//    if($length >= 6){
//        for($j = 5;$j<$length;$j++){
//            if($arr[$j-5]==$arr[$j-4] && $arr[$j-3]==$arr[$j-2] && $arr[$j-1]==$arr[$j]){
//                unset($arr[$j-2]);
//            }
//        }
//    }

    echo implode('',$arr);
    echo "</br>";

}



?>