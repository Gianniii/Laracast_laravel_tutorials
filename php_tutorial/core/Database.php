<?php 

namespace core;
use PDO;

class Database {
    public $conn;

    protected $statement;
   
    public function __construct($config, $username='root', $password='') {
      

        $dsn = 'mysql:'.http_build_query($config, '', ';'); //example.com?host=localhost&port=3360, but change & to ;
        $this->conn = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    public function query($query, $params=[]){
      

        $this->statement = $this->conn->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    //making my own, before query returned a PDO_statement which has fetch
    //but now i want to create a fetchOrFail, so to do that
    //i can return "this" and the fetch will be my own functions instead.
    //we are basically wrapping the PDO 
    public function fetch(){
        return $this->statement->fetch();
    }

    public function fetchAll(){
        return $this->statement->fetchAll();
    }

    public function fetchOrAbort(){
        $note = $this->fetch();
        if(!$note){
            abort();
        }
        return $note;
    }
 
}