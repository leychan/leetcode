<?php

require __DIR__ . '/Linkedlist.php';

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @param Integer $k
     * @return ListNode
     */
    function reverseKGroup($head, $k) {
        $dummyNode = new ListNode();
        $dummyNode->next = $head;

        $cur = $head;
        //链表长度
        $len = 0;

        //计算链表的长度
        while ($cur !== null) {
            $len++;
            $cur = $cur->next;
        }

        $pre = $dummyNode;
        $cur = $pre->next;

        //需要翻转的次数
        $circle = floor($len / $k);

        for ($i = 0; $i < $circle; $i++) {

            //k个一组进行翻转,其实只需要翻转k-1个,因为cur结点是不需要动的,只需要拼接在最后即可
            for ($j = 0; $j < $k - 1; $j++) {
                $next = $cur->next;
                $cur->next = $next->next;
                $next->next = $pre->next;
                $pre->next = $next;
            }
            //k个一组翻转完,需要把pre和cur的位置进行调整,以进行下一次翻转
            $pre = $cur;
            $cur = $pre->next;
        }
        return $dummyNode->next;
    }
}

$node = ListNode::generate([1, 2, 3, 4, 5]);

$newNode = (new Solution())->reverseKGroup($node, 3);

ListNode::print($newNode);