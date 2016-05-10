<?php
/**
 * 公共函数文件
 */
function p($arr, $exit = true)
{
    if(is_array($arr)){
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    } elseif(is_string($arr)){
        var_dump($arr);
    }
    $exit && exit;
}