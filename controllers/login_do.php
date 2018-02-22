<?php
/**
 * Created by PhpStorm.
 * User: Tõnis
 * Date: 12.02.2018
 * Time: 9:50
 */
//vormi poolt tulnud andmed
$username = $http->get('username');
$password = $http->get('password');

$sql = 'SELECT * FROM user '.
    'WHERE username='.fixDB($username).
    ' AND password='.fixDB(md5($password));
$result = $db->getData($sql);

//Kysime kasutaja andmed
if ($result != false) {
    $sess->sessionCreate($result[0]);
    echo 'Oled sisselogitud<br/>';
} else {
    //tuleb kasutaja suunata tagasi sisselogimis vormile
    $link = $http->getLink(array('control' => 'login'));
    $http->redirect($link);
}
