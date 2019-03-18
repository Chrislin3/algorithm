<?php

    $n = trim(fgets(STDIN));
//    fscanf(STDIN, "%[^\n]s", $line);
    $info_l = explode(" ", trim(fgets(STDIN)));
//    fscanf(STDIN, "%[^\n]s", $line);
    $info_d = explode(" ", trim(fgets(STDIN)));

//    $info_l = str_split(trim(fgets(STDIN)),1);
//    $info_d = str_split(trim(fgets(STDIN)),1);
    if($n == 1){
        echo 0;
    }
    if($n == 2 && $info_l[0]==$info_l[1]){
        echo 0;
    }
    elseif($n == 2 && $info_l[0]!=$info_l[1]){
        echo min($info_d);
    }
    else{
        $arr = array_count_values($info_l);
        //   print_r($arr);
        $maxCount = max($arr);
        //  echo $maxCount;
        if($maxCount >= floor($n/2)+1){
            $num = array_search($maxCount,$arr);
            //      echo $num;
            $result = 0;
            for($i = 0;$i<$n;$i++){
                if($info_l[$i]>$num){
                    $result += $info_d[$i];
                }
            }
            echo $result;
        }
        else{
            return false;
        }
    }



?>