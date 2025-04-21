<?php
//7.2 添加与移除数组
//array_push
//将一个或多个元素压入数组的末尾。
//会修改原始数组 $array。
//返回数组新的元素个数。

$stack = ['a','b'];
$count = array_push($stack, 'c','d');
print_r($stack);
echo "<br>";
print_r($count);
echo "<br>";

//添加单个元素

$stack[] = 'd';
print_r($stack);
echo "<br>";

//array_pop
//弹出并返回数组的最后一个元素。
//会修改原始数组。如果数组为空或不是数组，返回 null。

$last = array_pop($stack);
print_r($last);
echo "<br>";
print_r($stack);
echo "<br>";

//array_unshift
//在数组的开头插入一个或多个元素。
//会修改原始数组。原有的数字键名会被重新索引（从 0 开始），但字符串键名不变。
//返回数组新的元素个数。

$c = array_unshift($stack, 'c','d','d');
print_r($stack);
echo "<br>";
print_r($c);
echo "<br>";

//array_shift
//移除并返回数组的第一个元素。
//会修改原始数组。数字键名会被重新索引，字符串键名不变。
//如果数组为空或不是数组，返回 null。

$c = array_shift($stack);
print_r($c);
echo "<br>";
print_r($stack);
echo "<br>";
//unset
//可以用来删除数组中的某个元素。unset 不会重新索引数组的数字键。
unset($stack[2]);
print_r($stack);
echo "<br>";
//array_values()恢复索引
$c = array_values($stack);
print_r($c);
echo "<br>";

$userInfo = array();
$userInfo = array(1,2,3);
$userInfo = array(
    'username' => 'ljw',
    'age' => '20'
);
var_dump($userInfo);
echo "<br>";
$varEmpty = [];
var_dump($varEmpty);
echo "<br>";

$fruit = ['green','beach'];
echo count($fruit);
echo "<br>";

//count()计算数组的数量;

$mext = [1,2,[3,4],5];
echo count($mext);
echo "<br>";
echo count($mext,COUNT_RECURSIVE);//计算内部的数据
echo "<br>";

$arr = [];
$str = "666";
var_dump(is_array($str));
echo "<br>";
var_dump(is_array($arr));
echo "<br>";

$orders = [
    [
        'id' => 1,
        'amount' => 300,
        'product_name' => 'iphone',
        'status' => 1
    ],
    [
    'id' => 1,
    'amount' => 300,
    'product_name' => 'samsung',
    'status' => 2
],
    ''
];
echo json_encode($orders);
echo "<br>";
foreach ($orders as &$order) {
//    if (is_array($order)) {
//        foreach ($order as $key => &$value) {
//            if ($key === 'status' && $value === 1){
//                $value = "已发货";
//            }
//        }
//    }

    if(is_array($order) && array_key_exists('status', $order)) {
        if($order['status'] === 1) { $order['status'] = '已支付'; }
        if($order['status'] === 2 ){ $order['status'] = '未支付'; }
    }
}

echo json_encode($orders);
echo "<br>";

$stack = ['a','b'];

//排队逻辑

$buy = [];
$user1 = 'npc1';
$user2 = 'npc2';
$user3 = 'npc3';
array_unshift($buy, $user1);
array_unshift($buy, $user2);
array_unshift($buy, $user3);
var_dump($buy);
echo "<br>";

//生成购买订单

$userOrder1 = array_pop($buy);//弹出返回最后一个数据
echo $userOrder1;
echo "<br>";
$userOrder2 = array_pop($buy);
echo $userOrder2;
echo "<br>";
var_dump($buy);
echo "<br>";

//访问元素与内部指针
//array_key_exists  检查指定的键是否存在于数组中

var_dump(array_key_exists('username',$userInfo));
echo "<br>";
$user = [
    'name' => 'Bob',
    'age' => 25,
    'city' => 'London',
    'status' => 'active'
];
//array_keys(array $array,
// mixed $search_value = null,----如果提供了 $search_value，则只返回值为该值的键名。
// bool $strict = false  ---$strict (可选): 如果为 true，则在搜索值时使用 === 进行比较
//)  返回数组中所有的键名，组成一个新的索引数组。
$keys = array_keys($user);
var_dump($keys);
echo "<br>";
$key = array_keys($user,25);
var_dump($key);
echo "<br>";

//in_array 搜索数组

$os = ['mac' , 'windows' , 'linux' , 0];
var_dump(in_array('linux' , $os));
echo "<br>";
var_dump(in_array('0' , $os)); //松散比较 0 == ‘0’，true
echo "<br>";
var_dump(in_array('0' , $os , true));
echo "<br>";

$role = [
    1 => ['create' , 'update' , 'delete'],
    2 => ['read' , 'update' , 'delete' , 'scan'],
];
$user = [1,2];
$userRole = 1;
var_dump(in_array($userRole, $user));
echo "<br>";

//array_search  检查值 $needle 是否存在于数组 $haystack 中。

$key = array_search('windows' , $os);
var_dump($key);
echo "<br>";

//array_merge  合并一个或多个数组。返回一个新的数组，不修改原数组
//字符串键名： 如果后面的数组有与前面数组相同的字符串键名，后面数组的值会覆盖前面数组的值。
//数字键名： 后面的数组中的数字键名会被重新索引，并追加到结果数组的末尾，
//不会覆盖前面数组中相同数字键名的值。
$arr1 = ['color' => 'red', 2 => 'a', 3 => 'b'];
$arr2 = ['color' => 'green', 'shape' => 'circle', 3 => 'c', 4 => 'd'];
$merged = array_merge($arr1, $arr2);

print_r($merged);
echo "<br>";

//array_replace(用后面数组 ($replacements)
// 中的值替换第一个数组 ($array) 中相同键的值。返回一个新的数组
print_r(array_replace($arr1, $arr2));
echo "<br>";
//array_slice(array $array, int $offset,
// ?int $length = null, bool $preserve_keys = false): array

//从数组 $array 中提取一部分（一个“切片”）。返回一个新的数组，不修改原数组。
//$offset: 起始偏移量。负数表示从末尾倒数。
//$length (可选): 要提取的元素个数。负数表示提取到距离末尾 abs($length) 个元素之前。省略则提取到末尾。
//$preserve_keys (可选): 默认为 false，返回的数组会使用从 0 开始的连续数字索引。如果设为 true，则保留原数组的键名（无论是数字还是字符串）。

$input = ['a','b','c','d'];
$slice = array_slice($input, 2);
print_r($slice);
echo "<br>";
$slice = array_slice($input, 2,1);
print_r($slice);
echo "<br>";
$slice = array_slice($input, 1,-1);
print_r($slice);
echo "<br>";
$slice = array_slice($input, -2,1);
print_r($slice);
echo "<br>";
$slice = array_slice($input, 1,null,true);
print_r($slice);
echo "<br>";

echoHr();
//array_splice
//移除一部分，修改原数组，返回被删除元素的数组

$remove = array_splice($input,2,1);
printRWithBr($remove);
printRWithBr($input);

$input = ['a','b','c','d' , 'e'];
$remove = array_splice($input,2,2 ,['333' , '444']);
printRWithBr($input);

$upper = array_map('strtoupper', $input);
printRWithBr($upper);

$num1 = [1, 2, 3];
$num2 = [10, 20, 30];
$num = array_map(fn($a , $b) => $a * $b, $num1,$num2);
printRWithBr($num);

$users = [
    ['id' => 1, 'username' => '张三', 'is_admin' => 1, 'register_from' => 1],
    ['id' => 1, 'username' => '张三', 'is_admin' => 0, 'register_from' => 2]
];
$usersData = array_map(function ($user) {
    $user['is_admin'] = $user['is_admin'] ? '管理员' : '用户';
    if ($user['register_from'] === 1) $user['register_from'] = 'Google';
    if ($user['register_from'] === 2) $user['register_from'] = 'Apple';
    return $user;
}, $users);
echoWithBr(json_encode($usersData));

function varDumpWithBr($data): void
{
    var_dump($data);
    echo "<br>";
}

function echoWithBr($data): void
{
    echo $data;
    echo "<br>";
}

function printRWithBr($data): void
{
    print_r($data);
    echo "<br>";
}

function echoHr(): void
{
    echo "<hr>";
}







