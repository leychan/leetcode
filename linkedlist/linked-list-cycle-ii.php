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
     * @return ListNode
     */
    function detectCycle($head) {
        if ($head == null) {
            return null;
        }

        $slow = $head;
        $fast = $head->next;

        while ($slow != $fast) {
            if ($fast == null || $fast->next == null) {
                return null;
            }
            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        $normal = $head;
        $slow = $slow->next;

        while ($slow != $normal) {
            $slow = $slow->next;
            $normal = $normal->next;
        }
        return $normal;
    }
}

$head = new ListNode(1);
$head->next = new ListNode(2);
$head->next->next = new ListNode(3);
$head->next->next->next = new ListNode(4);
$head->next->next->next->next = $head->next;

var_dump((new Solution())->detectCycle($head));