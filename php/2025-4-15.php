<?php
//数据运算符
//数组合并，保留左边，添加左边没有的
$arr1 = ['a' => 1, 'b' => 2, 'c' => 3];
$arr2 = ['d' => 1, 'b' => 4, 'c' => 5];
$sum = $arr1 + $arr2;
print_r($sum);
echo "<br>";
//== 如果两个数组拥有相同的键值对（顺序无关），则为 true。会进行类型转换比较值。
//全等于 (Identical) - 如果两个数组拥有相同的键值对，并且顺序和类型都相同，则为 true。
$arr3 = ['a' => 1, 'b' => '2'];
$arr4 = ['b' => 2, 'a' => 1];
var_dump($arr3==$arr4);
var_dump($arr3===$arr4);
//三元运算符
$a = 20;
$b=30;
$c = ($a > $b)? '大于':"小于";
echo $c;
//null合并运算符
$name = $_GET["name"] ?? '默认用户';
echo $name."<br>";
$name = $user1 ?? $user2?? '匿名用户';
echo $name;echo "<br>";
//运算符优先级
$result = 2+3*4;
$result2 = (2+3)*4;
echo $result2."<br>";
echo $result."<br>";
$a=$b=$c=10;//右结合
echo $a.$b.$c."<br>";
$color = ["red","green","blue"];
foreach ($color as $c) {
    echo $c."<br>";
}
foreach ($color as $c=>$colors) {
    echo "索引：".$c."颜色:".$colors."</br>";
}
$a=3;
if($a>4)
{
    echo"???<br>";
}
elseif ($a=3)
{
    echo $a."<br>";
}
//for($i=1;$i<=1000000000;$i++){
//    if($i==1000000000){
//        echo "<br>".$i;
//        break;
//    }
//}
//swich语句
$user="root";
switch ($user){
    case "root":
        echo "root";
        break;
    case "admin":
        echo "admin";
        break;
    case "user":
        echo "user";
        break;
}
//定义函数
function fuck($a,$b){
    echo  $a."  fuck".$b."</br>";
}
$a="张三";
$b="李四";
fuck($a,$b);
//参数传递
function incre($num)
{
    $num++;
    echo "内部值为".$num."<br>";
}
$num=10;
incre($num);
echo "外部值为".$num."<br>";
function incre2(&$num)
{
    $num +=3;
    echo "引用后内部值为".$num."<br>";
}
incre2($num);
echo "引用后外部值为".$num."<br>";
//默认参数值,默认值参数不能在必需参数之前
function showMessage($message,$name="小魏鸭脖"){
    echo "说".$message."的人是".$name."</br>";
}
showMessage($a="wawaaw");
//可变参数列表
function sumNub(...$num){
    $total = "";
    foreach ($num as $n){
        $total .= $n;
    }
    echo $total."<br>";
}
sumNub("3333","23123","娃娃","5","6");
function getWeather(string $city,string $date = '2025-04-15'):?array
{
   $weather = [
       '中东'=>['2025-04-15' => '晴','2025-04-16'=>'雷','2025-04-17'=>'雨'],
       '内蒙'=>['2025-04-15' => '晴','2025-04-16'=>'雷','2025-04-17'=>'雨'],
       '北美'=>['2025-04-15' => '晴','2025-04-16'=>'雷','2025-04-17'=>'雨']

   ];
   $result = [];
   if(isset($weather[$city][$date])){
       $result['city']=$city;
       $result['date']=$date;
       $result['weather']=$weather[$city][$date];
    return $result;
   }
   return null;

}
$weather1 = getWeather('上海','2025-04-15');
$weather2 = getWeather('内蒙','2025-04-16');
echo $weather1."<br>";
echo $weather2."<br>";
foreach ($weather1 as $k){
    echo $k."<br>";
}
foreach ($weather2 as $k){
    echo $k."<br>";
}








