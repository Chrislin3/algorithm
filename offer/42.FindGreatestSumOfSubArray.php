<?php
header("content-type:text/html;charset=utf-8");
/*
 * 连续子数组的最大和
 * 例如:{6,-3,-2,7,-15,1,2,2},连续子向量的最大和为8(从第0个开始,到第3个为止)。给一个数组，返回它的最大连续子序列的和 P218
 */
function FindGreatestSumOfSubArray($array){
    if($array == null){
        return;
    }
    if(count($array) == 1){
        return $array[0];
    }

    $max = $array[0]; //注意这里的max一定要是数组的起始值，防止数组全部都是负数
    $sum = 0;
    for ($i = 0;$i<count($array);$i++){
        if($sum >= 0){         //如果连续和大于0，那么它就有连起来的必要，sum就加上当前值
            $sum += $array[$i];
        }
        else{               //如果连续和小于0了，那证明就要舍弃这一片连续和了，连续和起始位置从当前开始；
            $sum = $array[$i];
        }
        if($sum > $max){   //如果连续和比现在的最大值大，那就进行替换，max一直保存着连续和最大的值
            $max = $sum;
        }
    }
    return $max;

}

$array = [1,-2,3,10,-4,7,2,-5];
echo FindGreatestSumOfSubArray($array);
?>