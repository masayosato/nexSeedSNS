<?php
class DBConn{
    private  $DB_HOST = "localhost";
    private $DB_USER = "user01";
    private $DB_PASS = "user01";
    private $DB_NAME = "nexSeedDB";
    private $DB_PORT = "3306";
    protected  $db;

    //DB接続
    function __construct(){
        try{
            $dsn = 'mysql:dbname='.$this->DB_NAME.';'.'host='.$this->DB_HOST.';'.'port='.$this->DB_PORT;
            $this->db = new PDO($dsn, $this->DB_USER, $this->DB_PASS);
        }catch (PDOException $e){
            $this->dbErr();
        }
    }

    //DB切断
    function __destruct(){
        if(isset($this->db)){
            $this->db=null;
        }else{
            $this->dbErr();
        }
    }

    //DBエラー処理
    function dbErr(){
        $_SESSION["errMessage"]="DB処理時にエラーが発生しました。";
        header('Location: err.php');
    }
}
?>
