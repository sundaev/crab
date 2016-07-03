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

/**
 * 递归创建目录
 */
function rmkDir($dir)
{

    if(is_dir($dir) || is_dir(dirname($dir) && @mkDir($dir))){
        return true;
    }
    if(!rmkDir(dirname($dir))){
        return false;
    }
    if(is_dir(dirname($dir) && @mkDir($dir))){
        return true;
    }
    return false;
}