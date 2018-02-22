<?php
/**
 * Created by PhpStorm.
 * User: Tõnis
 * Date: 12.02.2018
 * Time: 8:55
 */


//loome sisselogimise vormi objekti
$loginForm = new template('login');
// paneme paika vajalikud v22rtused malli sisutamiseks
$loginForm->set('kasutaja', 'Kasutajanimi');
$loginForm->set('parool', 'Kasutaja parool');
$loginForm->set('nupp', 'Logi sisse');
//loome lingi vormi t88tluseks
$link = $http->getLink(array('control'=>'login_do'));
$loginForm->set('link', $link);
// paneme v22rtused malli
//selleks oleks vaja trukkida v2lja sisse logimis vorm
$mainTmpl->set('content',$loginForm->parse());