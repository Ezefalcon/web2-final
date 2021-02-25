<?php

abstract class DbConnect {
    protected $db;

    function __construct() {
        $this->db = $this->connect();
    }

    function connect(){
        return new PDO('mysql:host=localhost;'
            .'dbname=vaijes;charset=utf8'
            , 'root', '');
    }
}