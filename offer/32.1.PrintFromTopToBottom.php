<?php
header("content-type:text/html;charset=utf-8");
/*
 * 从上往下打印出二叉树的每个节点，同层节点从左至右打印。 P171
 *
 */
class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}
function PrintFromTopToBottom($root)
{
    $queue = new SplQueue();
    $resultArray = [];
    if($root == null){
        return $resultArray;
    }

    $queue->enqueue($root);
    while (!$queue->isEmpty()){
        $num = $queue->count();
        print_r($queue);
        echo "</br>";
        while ($num ){
            $num --;
            echo $num;
            echo "</br>";
            $t = $queue->dequeue();
            print_r($t);
            echo "</br>";
            if ($t == null)          //即使子结点是null也会被放进队列，此时要判断如果队列中的值时null，就要退出循环
                break;
            $resultArray[] = $t->val;//将该层结点拿出来，然后将它的左右结点放进队列
            $queue->enqueue($t->left);
            $queue->enqueue($t->right);
        }
    }
    return $resultArray;


}

$root = new TreeNode(1);
$root->left = new TreeNode(2);
$root->right = new TreeNode(3);
$root->left->left = new TreeNode(4);
$root->left->right = new TreeNode(5);
$root->right->left = new TreeNode(6);
$root->right->right = new TreeNode(7);

print_r(PrintFromTopToBottom($root));