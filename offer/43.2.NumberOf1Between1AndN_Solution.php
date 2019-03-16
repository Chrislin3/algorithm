<?php
header("content-type:text/html;charset=utf-8");
/*
 * 整数中1出现的次数 非常规方法 P221
 */
function NumberOf1Between1AndN_Solution($n){
    settype($n, 'string');
    if($n == 0 || strlen($n) == 0){
        return 0;
    }
    //要知道我们每一次迭代，分析的依据是该位的情况，比如21345，第一次先分析,01346~21345，第二次就是0346~1345，第三次是046~345 。。。
    //先分析最高位
    $first = $n[0];
    if($first > 1){

        $numFirstDigit = powerBase10(strlen($n) - 1);//如果最高位大于1
    }
    else{                       //如果最高位是1，那么1的个数就是除最高位剩下的数字加1
        $numFirstDigit = substr($n,1) + 1; //从字符串的第二位开始截取的数字
    }
    //下面讨论除去最高位剩下的位数每一位出现1的情况
    //如果首位first大于1，那就要拆开分析，剩下的几位数，选择其中一位是2，其余三位可以是0~9这10个数字的任意组合，
    //所以公式是：首位 * 除首位剩下的位数 * 10的。。。次方
    $numOtherDigits = $first * (strlen($n)-1) * powerBase10(strlen($n)-2);

    $numRecursive = NumberOf1Between1AndN_Solution(substr($n, 1)); //之前我们都是从首位开始分析的，之后就开始迭代求解，以第二位为首位进行分析

    return $numFirstDigit + $numOtherDigits + $numRecursive;
}
function powerBase10($number) {
    return pow(10, $number);
}

$n = 21235;
echo NumberOf1Between1AndN_Solution($n);