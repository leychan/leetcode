<?php

class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $len = count($prices);
        $max = 0;
        //第一个位置对应的最小值是他本身
        $min = $prices[0];
        for ($i = 1; $i < $len; $i++) {
            //如果遇到和前一个元素相同的值,则直接跳过计算
            if ($prices[$i] == $prices[$i - 1]) {
                continue;
            }
            //当前位置减去之前的最小值和max对比,计算当前位置的max最大值
            $max = max($max, $prices[$i] - $min);
            //记录到当前位置最小的值,这个最小值供后续计算最大值使用
            $min = min($min, $prices[$i]);
        }

        return $max;
    }
}

$arr = [7, 1, 5, 3, 6, 4];
//$arr = [7,6,4,3,1];

echo (new Solution())->maxProfit($arr);