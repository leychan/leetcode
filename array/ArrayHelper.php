<?php

class ArrayHelper {

    public static function echo($arr) {
        $len1 = count($arr);
        for ($i = 0; $i < $len1; $i++) {
            if (is_array($arr[$i])) {
                $len2 = count($arr[$i]);
                for ($j = 0; $j < $len2; $j++) {
                    echo $arr[$i][$j] . ' ';
                }
                echo PHP_EOL;
                continue;
            }

            echo $arr[$i][$j] . ' ';
        }
    }
}