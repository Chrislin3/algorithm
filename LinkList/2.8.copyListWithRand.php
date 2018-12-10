<?php
header("content-type:text/html;charset=utf-8");
/*
 *复制含有随机指针结点的链表 P57
 */

class Node{
    public $value;
    public $next;
    public $rand;
    public function __construct($value)
    {
        $this->value = $value;
    }
}

//function copyListWithRand($head){
//    $hash_array = array();
//    $cur = $head;
//    while($cur != null){                 //在链表中遍历出的每一个结点，都拷贝出它的新结点，放到关联数组中去
//
//        $hash_array += array($cur->value => new Node($cur->value));
//        $cur = $cur->next;
//
//    }
//    $cur = $head;
//    while($cur != null){
//        $hash_array["$cur->value"]->next = $hash_array[$cur->next];
//        $hash_array["$cur->value"]->rand = $hash_array[$cur->rand];
//        $cur = $cur->next;
//    }
//    return $hash_array[$head->value];
//
//
//}


function copyListWithRand($head){

    //将该结点复制值挂在这个结点上
    $cur = $head;
    while($cur != null){
        $next = $cur->next;
        $cur->next = new Node($cur->value);
        $cur->next->next = $next;
        $cur = $next;
    }
    //找到复制结点的rand结点
    $cur = $head;
    while ($cur != null){
        $next = $cur->next->next;
        $curCopy = $cur->next;
        $curCopy->rand = $cur->rand != null ? $cur->rand->next :  null;
        $cur = $next;
    }

    //将结点与其复制结点分离
    $res = $head->next;
    $cur = $head;
    while ($cur != null){
        $next = $cur->next->next;
        $curCopy = $cur->next;
        $cur->next = $next;
        $curCopy->next = $next != null ? $next->next : null;
        $cur = $next;
    }
    return $res;
}


$head = new Node(1);
$head->next = new Node(2);
$head->next->next = new Node(3);


$head->rand = $head->next->next; // 1 -> 3
$head->next->rand = $head; // 2 -> 1
$head->next->next->rand = null; // 3 -> null


print_r($head);
echo "</br>";
$res1 = copyListWithRand($head);
print_r($res1);