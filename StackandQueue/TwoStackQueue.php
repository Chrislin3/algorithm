<?php
header("content-type:text/html;charset=utf-8");
/*
 * 由两个栈组成的队列 P5
 *  编写一个类，用两个栈实现队列，支持队列的基本操作
 */

class TwoStackQueue{
    private $stackPush;
    private $stackPop;

    public function __construct()
    {
        $this->stackPush = new SplStack();
        $this->stackPop = new SplStack();
    }

    public function enqueue($pushNum){
        $this->stackPush->push($pushNum);
    }

    public function dequeue(){
        if($this->stackPush->isEmpty() && $this->stackPop->isEmpty()){
            echo "队列已空";
            return false;
        }
        elseif ($this->stackPop->isEmpty()){
            while (! $this->stackPush->isEmpty()){
                $this->stackPop->push($this->stackPush->pop());
            }
        }
        return $this->stackPop->pop();
    }

    public function current(){
        if($this->stackPush->isEmpty() && $this->stackPop->isEmpty()){
            echo "队列已空";
            return false;
        }
        elseif ($this->stackPop->isEmpty()){
            while (! $this->stackPush->isEmpty()){
                $this->stackPop->push($this->stackPush->pop());
            }
        }
        return $this->stackPop->top();
    }

}

echo "向队列依次加入7,3,1,4,0：";
echo "</br>";
$queue = new TwoStackQueue();
$queue->enqueue(7);
$queue->enqueue(3);
$queue->enqueue(1);
$queue->enqueue(4);
$queue->enqueue(0);
print_r($queue);
echo "</br>";
echo "</br>";

echo "元素出队列，即7出队列：";
echo "</br>";
echo "出队列的元素是：".$queue->dequeue();
echo "</br>";
echo "此时的队列情况是：";
echo "</br>";
print_r($queue);
echo "</br>";
echo "</br>";

echo "此时的队头元素是：".$queue->current();



