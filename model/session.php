<?php
/**
 * Created by PhpStorm.
 * User: Tõnis
 * Date: 14.02.2018
 * Time: 14:53
 */

class session
{
    var $sid = false; //sessioni id
    var $vars = array(); //sessiooni ajal tekkinud andmed
    var $http = false;  // $http objekti jaoks
    var $db = false; // db objekti jaoks
    var $timeout = 1800; // 30 minutit sessioni pikkus
    var $anonymous = true;// anonyymne sessioon

    /**
     * session constructor.
     * @param bool $http
     * @param bool $db
     */
    public function __construct(&$http, &$db)
    {
        $this->http = $http;
        $this->db = $db;
        $this->sid = $http->get('sid');
        $this->checkSession();

    }

    //loome sessiooni
    function sessionCreate($user = false){
        //kui kasutaja on anonyymne
        if ($user == false){
            //tekitame kasutaja andmed andmebaasi jaoks
            $user = array(
                'user_id' => 0,
                'role_id' => 0,
                'username' => 'Anonüümne'
            );
            $sid = md5(uniqid(time().mt_rand(1,1000), true));
            //salvestame andmebd sessioni tabelisse
            $sql = 'INSERT INTO session SET '.
                'sid='.fixDB($sid).', '.
                'user_id='.fixDB($user['user_id']).', '.
                'user_data='.fixDB(serialize($user)).', '.
                'login_ip='.fixDB(REMOTE_ADDR).', '.
                'created=NOW()';

            //saadame p2ringu andmebaasi
            $this->db->query($sql);
            //m22rame sessioni id
            $this->sid = $sid;
            //lisame andmed $http objekti sisse, et nad oleks veebi k2tte saadavad
            $this->http->set('sid', $sid);
        }
    }
    //funktsioon, mis hakkab kustutama andmbebaasist sessioneid
    function clearSessions()    {
        $sql = 'DELETE FROM session WHERE '.
        time().' - UNIX_TIMESTAMP(changed) > '.
        $this->timeout;
        $this->db->query($sql);
     }
     //sessioni andmete kontroll
    function checkSession(){
        $this->clearSessions();
        //kui sid pole ja on lubatud anonyymne kasutaja
        if ($this->sid === false and $this->anonymous){
            $this->sessionCreate();
        }
        if ($this->sid  !== false){
            $sql = 'SELECT * FROM session WHERE '.
                'sid='.fixDB($this->sid);
            $result = $this->db->getData($sql);

            if ($result == false){
                //siis vaatame, kui anonyymne kasutaja on lubatud
                if ($this->anonymous){
                    $this->sessionCreate();
                    define('USER_ID', 0);
                    define('ROLE_ID', 0);
                } else{
                    //kui anonyymne ei ole lubatud
                    $this->sid = false;
                    // nyyd tuleb kustutada session id  ka $http objektist
                    //veel ei ole lahendatud

                }
            }else{
                //saime andmebd andmebaasist
                $vars = unserialize($result[0]['svars']);
                //kui anmded ei ole massivi kujul siis teisendab need massiviks
                if (!is_array($vars)){
                    $vars = array();
                }
                $this->vars = $vars;
                $user_data = unserialize($result[0]['user_data']);
                define('USER_ID', $user_data['user_id']);
                define('ROLE_ID', $user_data['role_id']);
                $this->user_data = $user_data;
            }
        }else{
            define('USER_ID', 0);
            define('ROLE_ID', 0);
        }
    }
}
