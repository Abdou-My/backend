<?php 
 class DB {
    static public function connect(){
        $db = new PDO("mysql:host=localhost;dbname=alyfdb;charset=utf8","root","");
        $db->exec("set names utf8");
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        return $db;
    }
    public static function sendJSON($info){
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json");
        echo json_encode($info);
    }
    
}
?>