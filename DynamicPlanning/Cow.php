<?php
header("content-type:text/html;charset=utf-8");
/*母牛每年生一只母牛，新出生的母牛3年后也能生一只母牛，假设母牛不会死，求N年后母牛的数目
 * （递归）
 * F(n) = F(n-1) + F(n-3)   F(n)是现在牛的数目，F(n-1)是去年的牛的个数在今年全部留下来了，F(n-3)是三年前的牛的个数，现在它们都能生小牛了，也即新加入到牛的个数
 */

function cow($year){

    if($year <= 3){
        $num =  $year;
        return  $num;
    }
    else{

        $num = cow($year - 1) + cow($year - 3);

    }
    return $num;

}

$num = cow(20);
echo $num;

