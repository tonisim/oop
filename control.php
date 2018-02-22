<?php
/**
 * Created by PhpStorm.
 * User: Tõnis
 * Date: 31.01.2018
 * Time: 9:36
 */
$control = $http->get('control'); // saame teada, et millise nimega kontrollerit on vaja
//koostame vastava faili nime, kus hakkab asuma kontrolleri sisu
$file = CONTROL_DIR.$control.'.php';
if (file_exists($file) and is_file($file) and is_readable($file)){
    require_once $file;
} else {
    $file = CONTROL_DIR.DEFAULT_CONTROL.'.php';
    require_once $file;
}
