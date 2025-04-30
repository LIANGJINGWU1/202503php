<?php
require_once "../trush/20250425made/print.php";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try{
    //创建pdo实例
    $pdo = new PDO('mysql:host=localhost;dbname=test', 'root', $options);;

}catch (PDOException $e){
    echo $e->getMessage();//错误信息
}finally{
    //总会执行的语句
    echoWithBr("结束");
}