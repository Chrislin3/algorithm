<?php
header("content-type:text/html;charset=utf-8");
/*
 *生成窗口的最大值数组 P19
 * 注意SplDoublyLinkedList的使用！！！
 * top指的是生成链表的尾部！！！
 * bottom指的是生成链表的头部！！！
 */

function getMaxwindow($arr,$w){
    if(count($arr)<$w){
        return 0;
    }
    $qMax = new SplDoublyLinkedList();
    $res = array();
    $index = 0;
    for($i=0;$i<count($arr);$i++){
        while (! $qMax->isEmpty() && $arr[$i] >= $arr[$qMax->top()]){  //遍历到数组i位置时，从队尾开始依次进行比较，若比队列元素大，就让队列元素从队尾弹出
            $qMax->pop();
        }
        $qMax->push($i);   //否则就将这个比较大的元素的下标加进队尾
        //处理队头元素过期,就将对头弹出

        if($qMax->bottom() == $i-$w){   //这里注意一下

            $qMax->shift();   //移除队列头部元素
        }

        //处理返回的数组,当数组遍历到和串口一般大小就开始记录，之后就一直记录
        if($i>= $w-1){
            $res[$index++] = $arr[$qMax->bottom()] ;
        }

    }

    return $res;

}

$arr = array(4,3,5,4,3,3,6,7);
$window = 3;
$res = getMaxwindow($arr,$window);
print_r($res);
echo "</br>";
//结果：Array ( [0] => 5 [1] => 5 [2] => 5 [3] => 4 [4] => 6 [5] => 7 )
$a = new SplDoublyLinkedList();
$a->push(1);
$a->push(2);
$a->push(3);
$a->push(4);
print_r($a);
//结果：SplDoublyLinkedList Object ( [flags:SplDoublyLinkedList:private] => 0 [dllist:SplDoublyLinkedList:private] => Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 ) )
echo $a->top();
//结果：4
echo $a->bottom();
//结果： 1

