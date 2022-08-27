<?php

require __DIR__ . '/Linkedlist.php';

class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head) {
        $dummyNode = new ListNode();
        $dummyNode->next = $head;

        $pre = $dummyNode;
        $cur = $dummyNode->next;

        while ($cur->next != null) {
            $next = $cur->next;
            $cur->next = $next->next;
            $next->next = $pre->next;
            $pre->next = $next;
        }
        return $pre->next;
    }
}

$head = new ListNode(1);
$head->next = new ListNode(2);
$head->next->next = new ListNode(3);
//$head->next->next->next = new ListNode(4);

var_dump((new Solution())->reverseList($head));