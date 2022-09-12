<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $len = count($nums);
        $flip = [];
        //用flip数组保存当前值的坐标 value=>i,
        //当遍历到i坐标时,如果flip里面能找到target-i坐标对应的值,则说明已经遍历的元素里面存在有value(j)+value(i)=target
        for ($i = 0; $i < $len; $i++) {
            if (isset($flip[$target - $nums[$i]])) {
                return [$flip[$target - $nums[$i]], $i];
            }
            $flip[$nums[$i]] = $i;
        }
        return [];
    }
}

$arr = [2, 7, 11, 15];
$target = 9;
print_r((new Solution())->twoSum($arr, $target));