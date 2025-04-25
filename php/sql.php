<?php
$dsn = 'mysql:host=localhost;dbname=mymovie;charset=utf8mb4';
$user = 'root';
$password = '';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,//设置错误处理模式为抛出异常
    //设置默认的获取方式为关联数组
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    //禁用模拟预处理语句
    PDO::ATTR_EMULATE_PREPARES => false
];
try{
    $pdo = new PDO($dsn, $user, $password, $options);
    echo "Connected successfully";
}catch (PDOException $e){
    echo $e->getMessage();
}
try {
    $sql = 'SELECT * FROM movie';
    $stmt = $pdo->query($sql);
    echo "<ul>";
    foreach ($stmt as $row) {
        echo "<li>" . $row['code'] . "</li>";
    }
    echo "</ul>";
}catch (PDOException $e){
    echo $e->getMessage();
}
try {
    $sql = "UPDATE movie SET title = '666' where id = 1";
    $affectedRows = $pdo->exec($sql);
    echo "Updated: " . $affectedRows . "<br>";
}catch (PDOException $e){
    echo $e->getMessage();
}
