<?php

class Connection extends KISS_Model {
    public $rs = array(
        'id' => '',
        'host' => '',
        'port' => '',
        'user' => '',
        'password' => ''
    );
    function __construct($pkname='id',$tablename='connections',$dbhfnname='getdbh',$quote_style='MYSQL',$compress_array=true) {
        $this->pkname=$pkname; //Name of auto-incremented Primary Key
        $this->tablename=$tablename; //Corresponding table in database
        $this->dbhfnname=$dbhfnname; //dbh function name
        $this->QUOTE_STYLE=$quote_style;
        $this->COMPRESS_ARRAY=$compress_array;
    }
    function test() {
        $result = array('success' => false);
        $pdo = false;
        try {
            $pdo = new PDO('mysql:host='. $this->rs['host'] .';port=' . $this->rs['port'], $this->rs['user'], $this->rs['password']);
        } catch (PDOException $e) {
            $result['description'] = "Ошибка: " . $e->getMessage() . "";
        }
        if ($pdo) {
            $result['success'] = true;
        } else {

        }
        return $result;
    }
}