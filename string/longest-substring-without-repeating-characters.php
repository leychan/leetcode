<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        if (strlen($s) <= 1) {
            return strlen($s);
        }
        //右指针
        $right = 0;
        //最小长度,用来记录唯一串的最大长度
        $max = 1;
        //临时的唯一串
        $route = '';
        //如果右指针指的元素存在且不存在临时唯一串里面
        while (isset($s[$right])) {
            $pos = strpos($route, $s[$right]);
            //如果唯一串里面已经存在这个元素,则把唯一串中的这个元素及这个元素之前的都剔除,然后把当前字符放进唯一串
            if ($pos !== false) {
                $route = substr($route, $pos + 1);
            }
            //当前字符放进字符串尾部
            $route .= $s[$right];
            //计算当前串的长度
            $max = max($max, strlen($route));
            //指针右移
            $right++;
        }
        return $max;
    }
}

echo (new Solution())->lengthOfLongestSubstring('aaw');