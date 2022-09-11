<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums) {

        $len = count($nums);

        $max = $nums[0];

        $lastMax = $nums[0];

        for ($i = 1; $i < $len; $i++) {
            $cur = $lastMax > 0 ? $lastMax + $nums[$i] : $nums[$i];
            $max = max($max, $cur);
            $lastMax = $cur;
        }
        return $max;
    }
}

$arr = [1, -1];
$arr = [5, 4, -1, 7, 8];
echo (new Solution())->maxSubArray($arr);