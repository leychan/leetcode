<?php

require __DIR__ . '/ArrayHelper.php';

class Solution {

    /**
     * @param String[][] $grid
     * @return Integer
     */
    function numIslands($grid) {
        $result = 0;

        //数组的高度
        $height = count($grid);
        //数组的长度
        $length = count($grid[0]);
        for ($i = 0; $i < $height; $i++) {
            for ($j = 0; $j < $length; $j++) {
                //如果当前元素等于1,则将其本身与其周边的其他值为1的元素都置为-1
                if ($grid[$i][$j] == 1) {
                    $grid[$i][$j] = -1;
                    //发现一片岛屿
                    $result++;
                    //感染当前1的下一个元素1
                    $this->infect($grid, $i + 1, $j);
                    //感染当前1的上一个元素1
                    $this->infect($grid, $i - 1, $j);
                    //感染当前1的右边一个的元素1
                    $this->infect($grid, $i, $j + 1);
                    //感染当前1的左边一个的元素1
                    $this->infect($grid, $i, $j - 1);
                }
            }
        }

        //ArrayHelper::echo($grid);
        return $result;
    }

    public function infect(&$grid, $startH, $startL) {
        //如果当前坐标的元素不存在,或者元素不等于1,直接退出感染
        if (!isset($grid[$startH][$startL]) || $grid[$startH][$startL] != 1) {
            return;
        }

        //当前坐标的1感染为-1
        $grid[$startH][$startL] = -1;

        //如果当前坐标的右边的元素是1,则继续感染
        if (isset($grid[$startH][$startL + 1]) && ($grid[$startH][$startL + 1] == 1)) {
            $this->infect($grid, $startH, $startL + 1);
        }

        //如果当前坐标的左边的元素是1,则继续感染
        if (isset($grid[$startH][$startL - 1]) && ($grid[$startH][$startL - 1] == 1)) {
            $this->infect($grid, $startH, $startL - 1);
        }

        //如果当前坐标的上边的元素是1,则继续感染
        if (isset($grid[$startH - 1][$startL]) && ($grid[$startH - 1][$startL] == 1)) {
            $this->infect($grid, $startH - 1, $startL);
        }

        //如果当前坐标的下边的元素是1,则继续感染
        if (isset($grid[$startH + 1][$startL]) && ($grid[$startH + 1][$startL] == 1)) {
            $this->infect($grid, $startH + 1, $startL);
        }

//        for ($i = $startH; $i < $height; $i++) {
//            for ($j = $startL; $j < $length; $j++) {
//                $grid[$i][$j] = -1;
//
//
//            }
//        }
    }
}

$arr = [
    ["1", "1", "1", "1", "0"],
    ["1", "1", "0", "1", "0"],
    ["1", "1", "0", "0", "0"],
    ["0", "0", "0", "0", "0"]
];

$arr = [
    ["1", "1", "1"],
    ["0", "1", "0"],
    ["1", "1", "1"]
];

$arr = [
    ["1", "1", "1", "1", "1", "1", "1"],
    ["0", "0", "0", "0", "0", "0", "1"],
    ["1", "1", "1", "1", "1", "0", "1"],
    ["1", "0", "0", "0", "1", "0", "1"],
    ["1", "0", "1", "0", "1", "0", "1"],
    ["1", "0", "1", "1", "1", "0", "1"],
    ["1", "1", "1", "1", "1", "1", "1"]
];

echo (new Solution())->numIslands($arr);