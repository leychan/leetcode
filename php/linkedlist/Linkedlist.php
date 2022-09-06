<?php


//Definition for a singly-linked list.
class ListNode {
    public $val = 0;
    public $next = null;

    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }

    public static function generate($arr) {
        if (empty($arr)) {
            return null;
        }
        $head = new self($arr[0]);
        $cur = $head;

        $len = count($arr);
        for ($i = 1; $i < $len; $i++) {
            $cur->next = new self($arr[$i]);
            $cur = $cur->next;
        }
        return $head;
    }

    public static function print(ListNode $head) {
        while ($head != null) {
            echo $head->val, PHP_EOL;
            $head = $head->next;
        }
    }
}

