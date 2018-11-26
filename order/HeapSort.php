<?php
header("content-type:text/html;charset=utf-8");
/* 堆排
 * 时间复杂度：O(N * logN);额外空间复杂度O（1）
 * */
function heapSort(&$arr){
    if($arr==null || count($arr)<2){
        return true;
    }

    for($i = 0;$i<count($arr);$i++){
        heapInsert($arr,$i);           //变成大根堆
    }
    //大根堆排序，基本思想是，将最后结点的值与大根堆的头进行交换，相当于找到了此时的最大值将其移出堆，之后头部下沉形成新的大根堆，重复操作
    $size = count($arr);
    swap($arr, 0, --$size);            //最后一个位置上的数与0位置上的数交换，交换之后，堆的大小减1
    while ($size > 0) {          //直到整个堆的大小被减成0，所有数组都有序了
        heapify($arr, 0, $size); //当前形成的堆，从0开始，继续调出一个大根堆
        swap($arr, 0, --$size);  //再跟0位置上的数交换
    }

}

function heapInsert(&$arr,$index){   //新加入的值，向上调整，放在大根堆的哪个位置，这是针对数组初始形成大根堆
    while ($arr[$index] > $arr[($index-1)/2]){   //新加入的值与它的父结点比较，若比父结点大，则进入循环
        swap($arr,$index,($index-1)/2); //新加入的值与父结点进行交换
        $index = ($index-1)/2;   //当前结点索引变成其父结点索引
    }
}

function heapify(&$arr,$index,$size){
    $left = $index * 2 + 1;            //找到其左边的子结点
    while ($left < $size){            //理论上的叶子结点在数组范围内，说明该叶节点是存在的
        $right = $left + 1;
        $larger = $right < $size && $arr[$right] > $arr[$left] ? $right : $left; //判断左子结点和右子结点哪一个大赋值给larger
        $larger = $arr[$larger] > $arr[$index] ? $larger : $index;  //判断子结点和父结点哪一个大赋值给larger
        if ($larger == $index) { //如果父结点和子结点相等，证明大根堆形成！直接退出循环
            break;
        }
        swap($arr, $larger, $index);//如果父结点和子结点不相等，那就进行交换，使较大的值称为父结点
        $index = $larger;
        $left = $index * 2 + 1;
    }
}

function swap(&$arr,$i,$j){  //注意这里引用变量的使用

    $tem = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $tem;
}

$arr = [2,33,45,22,64,6,2,1,0,2];
heapSort($arr);
print_r($arr);