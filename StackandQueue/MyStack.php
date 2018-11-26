<?php
header("content-type:text/html;charset=utf-8");
/*
 *设计一个有getMin功能的栈 P1
 */

class MyStack{
    private $stackData;
    private $stackMin;

    public function __construct()
    {
        $this->stackData = new SplStack();
        $this->stackMin = new SplStack();
    }

    public function push($newData){
        if($this->stackMin->isEmpty()){
            $this->stackMin->push($newData);
        }
        elseif ($newData <= $this->stackMin->top()){
            $this->stackMin->push($newData);
        }
        $this->stackData->push($newData);
    }

    public function pop(){
        if($this->stackData->isEmpty()){
            echo "栈已空";
            return false;
        }
        if($this->stackData->top() == $this->stackMin->top()){
            $this->stackMin->pop();
        }
        return $this->stackData->pop();
    }

    public function getMin(){
        if($this->stackMin->isEmpty()){
            echo "栈已空";
            return false;
        }
        return $this->stackMin->top();
    }
}

echo "向栈中一次压入7,3,1,4,0：";
echo "</br>";
$myStack = new MyStack();
$myStack->push(7);
$myStack->push(3);
$myStack->push(1);
$myStack->push(4);
$myStack->push(0);
print_r($myStack);
echo "</br>";
echo "</br>";

echo "弹出栈顶元素0，此时的最小值栈也应该有变化：";
echo "</br>";
$myStack->pop();
print_r($myStack);
echo "</br>";
echo "</br>";

echo "弹出栈顶元素4，此时的最小值栈也应该无变化：";
echo "</br>";
$myStack->pop();
print_r($myStack);
echo "</br>";
echo "</br>";

echo "获取此时栈中最小值：";
echo "</br>";
$min = $myStack->getMin();
echo $min;