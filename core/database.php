<?php

use Nette\Database\Explorer;
use Nette\Database\Structure;
use Nette\Database\Connection;
use Nette\Caching\Storages\FileStorage;
use Nette\Database\Conventions\DiscoveredConventions;

class DB{

    private $storage;
    private $structure;
    private $conventions;

    function __construct(){
        $this->storage = new FileStorage(getcwd().'/cache/db');
        $this->structure = new Structure($this->conn(), $this->storage);
        $this->conventions = new DiscoveredConventions($this->structure);
    }

    function conn(){
        $engine = config('db_engine');

        switch ($engine):
            
            case 'mysql':
                $hostname = config('db_host');
                $username = config('db_user');
                $password = config('db_pass');
                $database = config('db_name');

                $connector = "mysql:host=$hostname;dbname=$database";
            
                return new Connection(
                    $connector, $username, $password
                ); break;

        endswitch;
    }

    function explore(){
        // error_reporting(E_ALL & ~E_WARNING);
        return new Explorer($this->conn(), $this->structure, $this->conventions, $this->storage);
    }


}