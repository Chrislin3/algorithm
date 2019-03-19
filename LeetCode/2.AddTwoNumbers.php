<?php



 class ListNode {
     public $val = 0;
     public $next = null;
     function __construct($val) {
         $this->val = $val;
     }
  }


function addTwoNumbers($l1, $l2) {
    $sum = new ListNode(0);
    $cur = $sum;
  //  print_r($cur);
    while ($l1 !=null || $l2 !=null){
        $cur->val = $cur->val + $l1->val + $l2->val;
        if($cur->val >= 10){
            $cur->next = new ListNode(1);
            $cur->val = $cur->val - 10;
        }
        else{
            if($l1->next !=null || $l2->next !=null)
                $cur->next = new ListNode(0);
        }
        $l1 = $l1->next;
        $l2 = $l2->next;
        $cur = $cur->next;
    }
    return $sum;

}
$l1 = new ListNode(2);
$l1->next = new ListNode(4);
$l1->next->next = new ListNode(3);

$l2 = new ListNode(5);
$l2->next = new ListNode(6);
$l2->next->next = new ListNode(4);

print_r(addTwoNumbers($l1, $l2));

?>