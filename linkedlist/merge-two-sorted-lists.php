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
     * @param ListNode $list1
     * @param ListNode $list2
     * @return ListNode
     */
    function mergeTwoLists($list1, $list2) {
        //虚拟节点,用作返回虚拟节点的next节点,即返回结果
        $res = new ListNode();
        //用作拼接链表的节点
        $cur = null;

        while ($list1 != null || $list2 != null) {
            //如果node1是null,则node2肯定不是null,并且可以直接拼接list2后面的内容
            if ($list1 == null) {
                //cur为null的时候,说明此时还未拼接任何节点,需要对cur做初始赋值,
                //然后将虚拟节点res->next指针指向cur,此后由cur拼接的节点都会更新到res->next指向的链表
                if ($cur == null) {
                    $cur = $list2;
                    $res->next = $cur;
                } else {
                    //如果此时cur已经被赋值了,此时只需要改变cur->next即可拼接节点到res->next指向的链表
                    $cur->next = $list2;
                }
                break;
            }
            //如果node2是null,则node1肯定不是null,并且可以直接拼接list1后面的内容
            if ($list2 == null) {
                if ($cur == null) {
                    $cur = $list1;
                    $res->next = $cur;
                } else {
                    $cur->next = $list1;
                }
                break;
            }

            //如果list1当前的节点值小于list2当前的节点值
            if ($list1->val < $list2->val) {
                //更新cur节点
                if ($cur == null) {
                    $cur = $list1;
                    $res->next = $cur;
                } else {
                    $cur->next = $list1;
                    $cur = $cur->next;
                }
                //list1的指针后移一位,也就是更新为自己的next指向的节点
                $list1 = $list1->next;
            } else {
                if ($cur == null) {
                    $cur = $list2;
                    $res->next = $cur;
                } else {
                    $cur->next = $list2;
                    $cur = $cur->next;
                }
                //list2的指针后移一位,也就是更新为自己的next指向的节点
                $list2 = $list2->next;
            }
        }
        return $res->next;
    }
}

$arr1 = [1, 2, 4];
$arr2 = [1, 3, 4];
//$arr1 = [1];
//$arr2 = [];

$list1 = ListNode::generate($arr1);
$list2 = ListNode::generate($arr2);

$res = (new Solution())->mergeTwoLists($list1, $list2);
ListNode::print($res);