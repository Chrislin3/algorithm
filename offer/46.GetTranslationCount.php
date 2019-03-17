<?php
function getTranslationCount1($s){

    if($s < 0){
        return false;
    }
    //采用递归方法，例如：12258 有5种翻译方法，它的递归数组是这样的 Array ( [4] => 1 [3] => 1 [2] => 2 [1] => 3 [0] => 5 )
    //可以的带这样的公式：f(i) = f(i+1) + g(i,i+1) * f(i+2)  当第i位和第i+1位拼接起来的范围是在10~25之间时,g(i,i+1)的值为1，否则是0

    $sum = array();//递归数组，用来存放当前位置的不同翻译的数目
    $len = strlen($s);
    $s = str_split($s); //转换成数组这里不要漏了
    for($i = $len-1;$i>=0;$i--){//从后向前开始遍历

        if($i<$len-1){    //如果不在最后一个数，那么当前的翻译数目等于前一次f(i+1)翻译数目（目前是这样，后面还会加）
            $count = $sum[$i+1];
        }
        else{

            $count = 1;//如果当前是最后一个数，那就只有一种翻译方法
        }
        if($i<$len-1){
            $first = $s[$i];
            $second = $s[$i+1];

            if($first.$second >=10 && $first.$second <= 25){  //如果两个连续的数字组起来范围在字母范围内，那么就要加上再前一次f(i+2)的数目

//                echo $first.$second;
//                echo "</br>";
                if($i< $len -2){
                    $count += $sum[$i+2];

                }
                else{   //对于前两次，只做加1操作，因为这里的索引+2，会溢出
                    $count += 1;
                }
            }
        }
        $sum[$i] = $count;
    }
    return $sum[0];
}

function getTranslationCount2($s){
    if($s < 0){
        return false;
    }
    $sum = array();
    $s = str_split($s);
    $len = count($s);

    for ($i = 0;$i<$len;$i++){
        if($i>0){
            $count = $s[$i-1];
        }
        else{
            $count = 1;
        }
        $first = $s[$i-1];
        $second = $s[$i];
        if($i>0){
            if($first.$second >=10 && $first.$second <= 25){
                if($i>2){
                    $count += $s[$i-2];
                }
                else{
                    $count += 1;
                }

            }
        }
        $sum[$i] = $count;
    }
    return $sum[$len-1];
}

$s = 12;
echo getTranslationCount2($s);

?>