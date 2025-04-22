<?php
require_once 'print.php';
//is_numeric()
//判断是否是数字、或这数字字符串，返回1或空气(0)
printRWithBr(is_numeric('123'));
printRWithBr(is_numeric('abc123'));
printRWithBr(is_numeric('abc'));
printRWithBr(is_numeric(123));
printRWithBr(gettype(123));//获取类型
printRWithBr(gettype(1.23));

$data = 100;
$type = gettype($data);
switch ($type) {
    case 'string':
        echo 'string';
        break;
    case 'integer':
        echo 'integer';
        break;
    case 'double':
        echo 'double';
        break;
    case 'boolean':
        echo 'boolean';
        break;
    case 'array':
        echo 'array';
        break;
    default:
        echo '啥也不是';
}
echo "<br>";

//各种转化，第二个参数为类型 integer,string
$value = 100.1;
varDumpWithBr($value);
settype($value, 'string');
printRWithBr(gettype($value));
varDumpWithBr($value);
settype($value, 'integer');
varDumpWithBr($value);
//强制转换 intval  float
varDumpWithBr((string)($value));
varDumpWithBr($value);
$class = [
    'class1' => ['student1', 'student2'],
    'class2' => ['student3', 'student4'],
];
unset($class['class1']);
varDumpWithBr($class);

//round($p,int)保留小数的位数
echoWithBr(round(3.1415,2));
echoWithBr(round(3.1415,3));
//mt_rand(m,p)m-p生成一个随机数
echoWithBr(mt_rand(1,5));
$password = random_int(10000,999999).bin2hex(random_bytes(8));
printRWithBr($password);

echoWithBr(time());
echoWithBr(microtime(true));
echoWithBr("开始时间（秒）".($_SERVER['REQUEST_TIME'] ?? 'N/A'));
echoWithBr("开始时间（微秒）".($_SERVER['REQUEST_TIME_FLOAT'] ?? 'N/A'));
echoWithBr(date('Y-m-d', strtotime('-1 year')));
//返回1为闰年,0为平年
echoWithBr(date("L", strtotime(date('Y-m-d', strtotime('-1 year')))));