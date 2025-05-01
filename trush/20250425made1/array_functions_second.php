<?php
require_once 'print.php';
//array_filter(array, ?callback, mode)
//ARRAY_FILTER_USE_KEY: 回调函数只接收元素的键 $key。
//ARRAY_FILTER_USE_BOTH: 回调函数接收键和值 ($value, $key)。

$number = [1, 2, 3, 4, 5, 6, 7, 8, 9];
$even = array_filter($number,fn($n) => $n % 3 == 1);
printRWithBr($even);

$mixed = [0, '', false, [], 1, true, '666'];
$even = array_filter($mixed);
printRWithBr($even);
//(true 被转为 1 输出)
$assoc = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5, 'f' => 6];
$even = array_filter($assoc,fn($n) => $n !== 'a', ARRAY_FILTER_USE_KEY);
printRWithBr($even);

//array_reduce()计算数组元素的和
//$carry 是初始值,$item是当前元素的值
$sum = array_reduce($number, fn($carrym, $item) => $carrym * $item, -1);
printRWithBr($sum);
$sum = array_reduce($number, fn($carrym, $item) => $carrym . $item, -1);
printRWithBr($sum);
//array_walk 对数组 $array 中的每个成员应用回调函数 $callback。
//回调函数通常接收两个参数：$value（元素值）和 $key（元素键）。
//打印数组
array_walk($assoc, function($value, $key){
    echo $key . ' => ' . $value;
});
echo "<br>";
//修改数组
array_walk($assoc, function(&$value, $key){
    $value = $key .= $value;
});
printRWithBr($assoc);

//sort 升序 重置数字键名 修改原数组
//rsort 降序
$number = [22,44,11,63,33];
sort($number);
printRWithBr($number);
rsort($number);
printRWithBr($number);

$number = [22,44,11,63,33];
asort($number);//保留键名 升序
printRWithBr($number);
arsort($number);//保留，降序
printRWithBr($number);

$files = ['img12.png', 'img10.png', 'img2.png', 'img1.png'];
natsort($files);//自然排序
printRWithBr($files);
//array_unique  移除数组中重复的  返回一个新数组 第一个遇到的值对应的键会被保留
$input = ['a', 'a', 'b'];
printRWithBr(array_unique($input));

//array_diff 第一个有的，第二个数组没有的，返回，只比较值，保留键名
//array_intersect  第一个有的，在第二个数组也有的，返回，同上
$array1 = ['a', 'a', 'b', 'e'];
$array2 = ['a', 'c', 'b'];
printRWithBr(array_diff($array1, $array2));
printRWithBr(array_intersect($array1, $array2));

printRWithBr(array_sum($number));//求和
$input = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5, 'f' => 6];
printRWithBr(array_flip($input));//交换键和值的位置
printRWithBr(array_reverse($input,1));//颠倒顺序，从后往前,1-保留原始键名
printRWithBr(array_product($input));//所有数字的乘积








