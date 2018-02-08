<?php
/*
* PDO DATABASE CLASS
* CONNECT TO DATABASE
* CREAT PREPARED STATEMENTS
* BIND VALUES
* RETURN ROWS AND RESULTS
*/

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct() {

        //set dsn
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options= array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        //CREAT PDO INSTANCE
        try {
          $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }


    }

    //prepare statement with query
    public function query($sql) {
        $this->stmt = $this->dbh->prepare($sql);
    }

    //binde value
    public function binde($param, $value, $type = null){
       
        if(is_null($type)){
            switch(true){
                case is_int($value) : $type = PDO::PARM_INT;
                break;
                case is_bool($value) : $type = PDO::PARM_BOOL;
                break;
                case is_null($value) : $type = PDO::PARM_NULL;
                break;
                default : $type = PDO::PARM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    //execute the prepared statement
    public function execute() {
        return $this->stmt->execute();
    }

    //get result set as array of object
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    //get single record as object
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    //get row count
    public function rowCount(){
        return $this->stmt->rowCount();
    }

}
?>