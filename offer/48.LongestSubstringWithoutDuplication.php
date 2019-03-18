<?php
/*
 *最长不含重复字符的子字符串
 * 输入一个字符串（只包含 a~z 的字符），求其最长不含重复字符的子字符串的长度。例如对于 arabcacfr，最长不含重复字符的子字符串为 acfr，长度为 4。
 *
 */
function longestSubstringWithoutDuplication($str){
    if($str == ''){
        return 0;
    }
    $position = array();   //数组用来存储每个字母出现的索引，若该字母没有出现，数组中的值为-1
    for($i = 0;$i<26;$i++){
        $position[$i] = -1;
    }
    $curLength = 0;
    $maxLength = 0;
    $arr = str_split($str);
    $len = count($arr);

    for($i = 0;$i<$len;$i++){
        $preIndex = $position[ord($arr[$i]) - ord('a') ];  //该字母上一次出现的索引位置
//        echo $preIndex."</br>";
        $distance = $i - $preIndex;  //当前字母与它上一次出现位置的距离
        if($preIndex < 0 || $distance > $curLength){ //如果$preIndex < 0 说明字母之前还没有出现过，如果$distance > $curLength说明已经超过了最大长度的范围，没必要再去讨论
            $curLength++;
        }
        else{    //否则的话，目前的最大长就是distance
            if($curLength > $maxLength){
                $maxLength = $curLength;  //在当前长度要缩短成distance之前，赶紧更新一下之前的最大长度
            }

            $curLength = $distance;

        }

        $position[ord($arr[$i]) - ord('a')] = $i;  //字母出现在arr数组中的索引，记录在position数组中

    }
  //  print_r($position);
    if($curLength > $maxLength){   //循环结束后，更新我们的最大长度
        $maxLength = $curLength;
    }
    return $maxLength;

}


$str = 'arabcacfr';
echo longestSubstringWithoutDuplication($str);

?>