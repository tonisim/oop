<?php
/**
 * Created by PhpStorm.
 * User: Tõnis
 * Date: 19.01.2018
 * Time: 11:09
 */


//Loeme sisse projekti konfiguratsiooni faili
require_once 'conf.php';

//Loome test objekti template klassist

$testtabel = new template('views/test.html');
//Määrame reaalväärtused malli elementidele
$testtabel->set('esimene', '1');
$testtabel->set('teine','2');
//Lisanme objekti testvaade
echo '<pre>';
print_r($testtabel);
echo '</pre>';

echo $testtabel->parse();