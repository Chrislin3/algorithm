<?php
/*
 * 把只包含质因子2、3和5的数称作丑数（Ugly Number）。
 * 例如6、8都是丑数，但14不是，因为它包含质因子7。 习惯上我们把1当做是第一个丑数。
 * 求按从小到大的顺序的第N个丑数。
 * 思路:把前几个丑数列出来，可以找一下规律，第一个数是1，第二个数就是1和2,3,5相乘的最小值，自然是2，此时，第三个数自然是3，
 * 此时，比较的几个数变成2*2,2*3,1*5，较小的是2*2，故第四个数就变成4，
 * 下一次和2相乘的变成了数组的第三个数3了，和3相乘的还是数组第二个数2，和5相乘的依旧是数组的第一个数1，比较得知，1*5最小，故第五个数是5；
 * 接着，和2相乘的是3，和3相乘的是2，和5相乘的变成第二个数2.。。。
 * 看出规律了吗？
 */
function GetUglyNumber_Solution($index)
{
    // write code here
    if($index == 0){
        return 0;
    }
    $result[0] = 1;
    $index2 = 0;
    $index3 = 0;
    $index5 = 0;

    for($i = 1;$i<$index;$i++){
        $next2 = $result[$index2] * 2;
        $next3 = $result[$index3] * 3;
        $next5 = $result[$index5] * 5;

        $result[$i] = min($next2,min($next3,$next5));
        if($result[$i] == $next2){
            $index2 ++;
        }
        if($result[$i] == $next3){
            $index3 ++;
        }
        if($result[$i] == $next5){
            $index5 ++;
        }

    }

    return $result[$i-1];
}

$index = 7;
print_r(GetUglyNumber_Solution($index));

?>