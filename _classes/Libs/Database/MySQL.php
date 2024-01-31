<?php

namespace Libs\Database;
use PDO;
use PDOException;

class MySQL{

    private $db=null;
    private $dbname;
    private $dbhost;
    private $dbuser;
    private $dbpass;

    
    public function __construct(
        $dbname="project",
        $dbhost="localhost",
        $dbpass="",
        $dbuser="root"
    ){
        $this->dbname=$dbname;
        $this->dbhost=$dbhost;
        $this->dbuser=$dbuser;
        $this->dbpass=$dbpass;
    }

    public function connect(){
        try{
            $this->db=new PDO(
                "mysql:dbhost=$this->dbhost;dbname=$this->dbname",
                $this->dbuser,
                $this->dbpass,
                [
                    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,
                    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                ]
            );
            return $this->db;
        }catch(PDOExpection $e){
            echo $e->getMessage();
            exit();
        }
    }
}