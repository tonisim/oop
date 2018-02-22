<?php
/**
 * Created by PhpStorm.
 * User: Tõnis
 * Date: 31.01.2018
 * Time: 9:46
 */
$page_id = (int)$http->get('page_id'); // lehe id
// lehe id järgi küsime sisu andmebaasist
$sql = 'SELECT * FROM content '.
    'WHERE content_id='.fixDb($page_id);
// küsime vajalikud andmed andmebaasist
$result = $db->getData($sql);
// kui vastavale page_id-le ei leidu andmebaasis vastust
if($result === false){
    // siis pöördume avalehele - is_first_page="1"
    $sql = 'SELECT * FROM content WHERE '.
        'is_first_page='.fixDb(1);
    $result = $db->getData($sql);
}
if($result != false){
    // siis tulemus koosneb ainult 1-st reast -
    // see ongi vastava lehe sisu
    $page = $result[0];
    $http->set('page_id', $page['content_id']);
    $mainTmpl->set('content', $page['content']);
}
