<?php
/**
 * Created by PhpStorm.
 * User: Tõnis
 * Date: 19.01.2018
 * Time: 10:22
 */

class template
{
    //klassi muutujad
    var $file =  ''; // HTML malli faili nimi
    var $content = false; // HTML malli sisu, mis alguses  puudub, HTML failist loetud sisu
    var $vars = array();

    /**
     * template constructor.
     * @param string $file
     */
    public function __construct($file)
    {
        $this->file = $file;
        $this->loadfile();
    }
    // HTML malli elementide nimetuste ja reaalväärtuste paarid


    //HTML malli faili nime ja õiguste kontroll
    //HTML sisu lugemine, kus vajalikud tingimused on täidetud
    function loadfile(){
        if (!is_dir(VIEW_DIR)){
            echo 'Ei ole leitud'.VIEW_DIR. 'nimega kataloogi<br/>';
            exit;
        }
        // Kui faili nimi on määratud kujul /views/failinimi.html
        $file = $this->file; //abiasendus
        if(file_exists($file) and is_file($file) and is_readable($file)) {
            $this->readfile($file);
        }
        $file = VIEW_DIR.$this->file.'.html'; //abiasendus
        if(file_exists($file) and is_file($file) and is_readable($file)) {
            $this->readfile($file);
        }
        $file = VIEW_DIR.str_replace('.', '/', $this->file)->file.'.html'; //abiasendus
        if(file_exists($file) and is_file($file) and is_readable($file)) {
            $this->readfile($file);
        }
        if ($this->content === false){
            echo 'Ei suutnud lugeda' .$this->file.'sisu<br/>';
            exit;
        }
    }



    //HTML malli failist sisu lugemine
    function readfile($file){
            /*$fp =  fopen($file, 'r');
            $this->content = fread($fp, filesize($file));
            fclose($fp);*/
            $this->content = file_get_contents($file);
    }

}
