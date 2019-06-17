<?php
/**
 * Zingfront智线笔试题2018版C新
 */

//第一题
function getPublicWord($s, $t){
    $cut_s = explode(" ", $s);
    $cut_t = explode(" ", $t);
    $public_word = "";
    foreach($cut_s as $s_word){
        $break_flag = false;
        foreach($cut_t as $t_word){
            if($s_word == $t_word){
                $public_word = $s_word;
                $break_flag = true;
                break;
            }
        }
        if($break_flag){
            break;
        }
    }
    return $public_word;
}


//第二题 解题公式 n = (min + max) * (max -min + 1)/2
function getIntegerOrder($num){
    $echo_flag = false;
    for($i = 1; $i < $num; $i++){
        for($j = $i + 1; $j < $num; $j++){
            $sum = ($i + $j) * ($j - $i + 1) / 2;
            if($sum == $num){
                $echo_flag = true;
                for($t = $i; $t <= $j; $t++){
                    echo $t." ";
                }
                echo "\n";
            }
        }
    }
    if(!$echo_flag){
        echo "NONE\n";
    }
}
