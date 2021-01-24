<?php


if(isset($_GET['addproduct'])){



}



//ord_sess_id session id van ons


//storageInterface.php

//items in een storage houden of verwijderen
/*
inferface StorageInterface {
    public function get($index); //neem een item uit de storage
    public function set($index, $value);
    public function all(); //alle items uit de storage krijgen
    public function exists($index); //controleren of een item in de storage zit of niet
    public function unset($index); //het verwijderen van een item
}

//sessionStorage.php

class SessionStorage implements StorageInterface, Countable {
    protected $bucket;

    public function __construct($bucket = 'default') {
        if (!isset($_SESSION[$bucket])) {
            $_SESSION[$bucket] = [];
        }
        $this->bucket = $bucket;
    }
}

