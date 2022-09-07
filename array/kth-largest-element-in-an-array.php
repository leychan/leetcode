<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function findKthLargest($nums, $k) {
        //整个元素个数
        $len = count($nums);
        //这个是最终在整个nums数组中的位置
        $p = $len - $k;
        //遍历的左边起始位置
        $left = 0;
        //遍历的右边结束位置
        $right = $len - 1;
        //找到随机元素的位置
        $index = $this->findIndex($nums, $left, $right);
        //如果随机元素位置就是要找的位置,则直接返回,否则循环找
        while ($p != $index) {
            //如果要找的大于随机的那个
            if ($p > $index) {
                //这时候要把计算的左边起点更新,否则会造成大量重复计算
                $left = $index + 1;
            } else {
                //这时候要把计算的右边起点更新,否则会造成大量重复计算
                $right = $index - 1;
            }
            $index = $this->findIndex($nums, $left, $right);
        }
        return $nums[$p];
    }

    public function findIndex(&$nums, $left, $right) {
        //参照位置,随机,增强性能,避免是已经排好序的
        $flag = mt_rand($left, $right);
        //参照位置对应的元素
        $flagVal = $nums[$flag];

        list($nums[$flag], $nums[$right]) = [$nums[$right], $nums[$flag]];

        $j = $left;
        for ($i = $left; $i < $right; $i++) {
            //如果当前元素小于标志元素,则
            if ($nums[$i] < $flagVal) {
                list($nums[$j], $nums[$i]) = [$nums[$i], $nums[$j]];
                $j++;
            }
        }
        list($nums[$j], $nums[$right]) = [$nums[$right], $nums[$j]];
        return $j;
    }
}

$arr = [1];
echo (new Solution())->findKthLargest($arr, 1);