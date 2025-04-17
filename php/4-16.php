<?php
//严格类型模式
declare(strict_types = 1);

//命名参数
function createUser(string $name, string $email, bool $isActive = true, $isAdmin = true): void
{
    echo "创建用户L<br>";
    echo "用户名：".$name."<br>";
    echo "邮箱:".$email."<br>";
    echo "激活状态:".($isActive? '是' : '否')."<br>";
    echo "管理员:".($isAdmin ? '是' : "否")."<br>";
}
createUser($username = "ljw",$email = 'ljw.com',isAdmin: 1);

//全局变量
//PHP 将所有全局变量存储在一个特殊的关联数组 $GLOBALS 中，
//数组的键是全局变量的名称。可以通过这个数组在任何地方（包括函数内部）访问全局变量。
$userAge = 25;
function getUserAge()
{
    global $userAge;//声明为全局变量
    $username = 'ljw';
    echo $userAge."<br>";
    echo $GLOBALS['userAge']."<br>";//从全局变量数组访问
}
getUserAge();

//静态变量
function callTracker ()
{
    static $call = 0;
    $call++;
    echo '被调用了'.$call."次<br>";
}
callTracker();
callTracker();

//可变函数
//PHP中，字符串变量 + 括号 () = 尝试调用该字符串命名的函数

function hello(){
    echo "hellow<br>";
}
$functionhellow = "hello";
$functionhellow();

//匿名函数,使用 use 捕获外部变量
//匿名函数默认无法访问其定义时所在的父作用域（例如定义它的函数或全局作用域）中的变量。
//需要使用 use 关键字，将被引用的外部变量列表放在圆括号内，才能在匿名函数内部访问它们。
//默认情况下，use 是按值捕获变量，如果要按引用捕获，在变量名前加 &。
$message = "重要信息";
$sendmessage = function($text) use(&$message){
    echo $message.$text."<br>";
    $message = "????";
};
$sendmessage("65666");
echo $message."<br>";

//回调函数传递给arry_map
//array_map() 会把你提供的回调函数，应用到数组中的每一个元素上，返回一个新的数组。
//array_map(callback $callback, array $array1, array ...$arrays): array
//callback：你要执行的函数（可以是匿名函数、箭头函数、已有函数名）
//array1：要处理的数组
//可选的多个数组：可用于多数组并行处理
$num = [1 , 2 , 3 , 4];
$total = array_map(function($n){
    return $n * $n;
},$num);
print_r($total);
$fench = 5;
$total2 = array_map(fn($n) => $n * $fench,$num);
print_r($total2);

//箭头函数
//fn(参数列表) => 表达式;
//自动按值捕获父作用域的变量，无需 use 关键字。
//函数体只能包含一个表达式，该表达式的值会被自动返回（不需要 return 关键字）。
$num = [1, 2, 3, 4];
$factor = 3;
$multiply = array_map(fn($item) => $item * $factor,$num);
print_r($multiply);

//字符串长度
$a= "鸡你太美";
echo strlen($a)."<br>";
echo mb_strlen($a,'utf-8')."<br>";//字符个数

//查找与搜索字符串
$string = "111222333444";
$pos1 = strpos($string, '222');
if($pos1 !== false){
    echo "在".$pos1."处找到<br>";
}
$pos2 = strrpos($string, '222',4);
if($pos2 !== false){
    echo "在".$pos2."处找到<br>";
}else
    echo "no";
$string2 = "AAABbbCccC";
//strrpos区分大小写
$pos3 = strrpos($string2, 'c');
if($pos3 !== false){
    echo "最后一次出现的位置".$pos3."<br>";
}
//strripos不区分大小写
$pos3 = strripos($string2, 'C');
if($pos3 !== false){
    echo "最后一次出现的位置".$pos3."<br>";
}
//strstr(string $haystack, string $needle, bool $before_needle = false): string|false (别名 strchr)
//查找 $needle 在 $haystack 中首次出现的位置，并返回从该位置开始到 $haystack 末尾的子字符串。 true截取前面，false截取后面
$pos3 = strstr($string2, 'C',true);
if($pos3 !== false){
    echo $pos3."<br>";
}
$pos3 = strstr($string2, 'C',false);
if($pos3 !== false){
    echo $pos3."<br>";
}
//
echo str_contains($string2, 'Ccc');//判断是否存在
echo str_starts_with($string2, 'AAA');//判断是否已xxx为开头
echo str_ends_with($string2, 'CccC');

//yield,包含 yield 关键字的函数会自动成为一个生成器函数,边生成变输出
//没有yield则是全部生成，再全部输出
function inser($a)
{
    for($i = 0; $i < $a; $i++){
        yield $i;//暂停返回i
    }
}
foreach (inser(5) as $key){
    echo $key."<br>";
}