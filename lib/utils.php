<?php
/**
 * Created by PhpStorm.
 * User: Tõnis
 * Date: 31.01.2018
 * Time: 8:58
 */

function fixUrl($str){
    return urlencode($str);
}

function fixDB($value){
    return '"'.addslashes($value).'"';
}