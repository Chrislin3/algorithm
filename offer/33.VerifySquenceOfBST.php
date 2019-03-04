<?php
header("content-type:text/html;charset=utf-8");
/*
 * 输入一个整数数组，判断该数组是不是某二叉搜索树的后序遍历的结果。如果是则输出Yes,否则输出No。假设输入的数组的任意两个数字都互不相同。 P179
 */
function VerifySquenceOfBST($sequence)
{
    $length = count($sequence);
    if($sequence == null){
        return null;
    }
    if($length == 1){
        return true;
    }
    $first = 0;
    $last = $length - 1;

    return verify($sequence,$first,$last);


}

function verify($sequence,$first,$last){
    //echo "=======";
    $root = $sequence[$last];
    if($last <= $first + 1){
        echo "=======";
        return true;
    }
    $index = $first;
    while ($index < $last && $root >= $sequence[$index]){
      // echo $index;
        $index ++;

    }
    for($i = $index ;$i < $last;$i++){
        if($root > $sequence[$i]){
            return false;
        }

    }
    return verify($sequence,$first,$index-1) && verify($sequence,$index,$last-1);

}
$sequence = [8,2,3,6,7,5];
VerifySquenceOfBST($sequence);