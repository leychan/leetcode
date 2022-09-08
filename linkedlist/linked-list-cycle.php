<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

require __DIR__ . '/Linkedlist.php';

class Solution {
    /**
     * @param ListNode $head
     * @return Boolean
     */
    function hasCycle($head) {
        if ($head == null) {
            return false;
        }
        $fast = $head->next;
        $slow = $head;

        while ($fast !== $slow) {
            if ($fast == null || $fast->next == null) {
                return false;
            }
            $fast = $fast->next->next;
            $slow = $slow->next;
        }
        return true;
    }
}


$head = new ListNode(3);
$head->next = new ListNode(2);
$head->next->next = new ListNode(1);
$head->next->next->next = $head->next;

var_dump((new Solution())->hasCycle($head));