<?php

class Solution {

    static $dp = [];

    /**
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n) {
        self::$dp[1] = 1;
        self::$dp[2] = 2;
        if (isset(self::$dp[$n])) {
            return self::$dp[$n];
        }
        self::$dp[$n] = $this->climbStairs($n - 1) + $this->climbStairs($n - 2);
        return self::$dp[$n];
    }

    function climbStairs2($n) {
        if ($n <= 2) {
            return $n;
        }

        // 当前下标往前两位,如果当前坐标为3,则pre_2指向1
        $pre_2 = 1;
        // 当前下标往前两位,如果当前坐标为3,则pre_1指向2
        $pre_1 = 2;
        //3的是结果是3
        $result = $pre_2 + $pre_1;
        //从4开始进入循环
        for ($i = 3; $i < $n; $i++) {
            $lastResult = $result;
            $result += $pre_1;
            $pre_1 = $lastResult;
        }
        return $result;
    }
}

echo (new Solution())->climbStairs2(5);