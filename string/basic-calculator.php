<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function calculate($s) {

        //去掉字符串中多余的空格
        $s = str_replace(' ', '', $s);
        //将字符串中的括号都消除,例1+(5-2) => 1+3
        while (($firstRightBracket = strpos($s, ')')) !== false) {
            //第一个右括号
            $i = $firstRightBracket;
            while ($s[$i] != '(') {
                $i--;
            }
            //找到一个最后一个左括号
            $lastLeftBracket = $i;

            //计算括号内的内容
            $sub = $this->calculateSimpleString(substr($s, $lastLeftBracket + 1, $firstRightBracket - $lastLeftBracket - 1));
            //如果括号内的计算结果小于0
            if ($sub < 0) {
                //如果左括号前一个字符是`-`,则负负得正,改为`+`号
                if ($s[$lastLeftBracket - 1] == '-') {
                    $s = substr($s, 0, $lastLeftBracket - 1) . '+' . abs($sub) . substr($s, $firstRightBracket + 1);
                } elseif ($s[$lastLeftBracket - 1] == '+') {
                    //如果左括号前一个字符是`+`,则去掉前一个`+`后直接拼接, str + (5-6) => str - 1
                    $s = substr($s, 0, $lastLeftBracket - 1) . $sub . substr($s, $firstRightBracket + 1);
                } else {
                    //如果左括号前一个是左括号,且如果是字符串的第一个字符,则忽略,直接将括号内的结果拼接,再加上右括号后面的内容
                    //如果左括号前一个是左括号,且如果不是字符串的第一个字符,则拼接: str. ( . sub . str
                    $s = substr($s, 0,
                            $lastLeftBracket - 1 < 0 ? 0 : $lastLeftBracket - 1)
                        . $sub . substr($s, $firstRightBracket + 1);
                }
            } else {
                //如果括号内的计算结果大于0,直接按照规则进行拼接
                $s = substr($s, 0, $lastLeftBracket) . $sub . substr($s, $firstRightBracket + 1);
            }
        }


        return $this->calculateSimpleString($s);
    }

    public function calculateSimpleString($s) {
        $len = strlen($s);
        $res = 0;
        for ($i = 0; $i < $len; $i++) {
            //当前字符
            $cur = $s[$i];
            //如果是数字,则一直捕捉数字,完整取出整数
            if (is_numeric($cur)) {
                //第一个数字的下标
                $j = $i;
                //最后一个数字的下标
                while (is_numeric($s[$i])) {
                    $i++;
                }
                //求和
                $res = $res + intval(substr($s, $j, $i - $j));
                //i回到最后一个数字的位置,因为for循环里面还会i++,不归位的话,会导致跳过下一个字符
                $i--;
                continue;
            }

            //如果是`+`或者是`-`,也完整取出整数(1+5-3) => 6-3; 6-3 => 3
            if (($cur == '+') || ($cur == '-')) {
                //j表示第一个数字的下标,因为当前是`-`,下一个必定是数字
                $j = ++$i;
                while (is_numeric($s[$i])) {
                    $i++;
                }
                //如果当前是`+`,则相加;负责相减
                $res = $cur == '+' ? $res + intval(substr($s, $j, $i - $j)) : $res - intval(substr($s, $j, $i - $j));
                //i需要回到最后一个数字的下标,否则会跳过下一个字符
                $i--;
            }
        }

        return $res;
    }
}

echo (new Solution())->calculate("2147483647");