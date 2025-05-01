<?php
$city = '东京';
$year = 2025;
echo "我在\$city生活了{$city}年";
//php数据类型
$username="xiaoming";
$age = 18;
$height = 20;
$ture=true;
$no = null;
var_dump($username);
echo "<br>";
var_dump($age);
echo "<br>";
var_dump($height);
echo "<br>";
var_dump($ture);
echo "<br>";
var_dump($no);
//unset($age);
$age=1;
var_dump($age);
const a = "6666";
var_dump(a);
unset($a);
$a='aa';
$aa='ffffff';
echo $$a;
$var1=11;
$var2=12;
$var3 = &$var1;
++$var3;
echo $var1;
//关联数组
$user = [    'user1'=>'active','user2'=>'active','user3'=>'active'];
foreach($user as &$status){
    if($status==='active'){
        $status='inactive';
    }
}
unset($status);
print_r($user);
//魔术常量
echo __FILE__; //当前文件的完整路径
echo __LINE__;//当前行号
echo __DIR__;//当前目录
class MyClass{
    public function myMethod(){
        echo __CLASS__;//当前类名
        echo __METHOD__;//当前方法名
        echo __FUNCTION__;//当前函数名
    }
}
$myClass = new MyClass();
$myClass->myMethod();
//php预定常量
echo PHP_VERSION;
echo PHP_OS;
echo PHP_INT_MAX;
echo PHP_INT_SIZE;
echo PHP_FLOAT_MAX;
echo PHP_FLOAT_MIN;
echo PHP_EOL;
echo TRUE;
//值	原因说明
//false	字面上的 false
//null	空值
//0	数字零
//'0'	字符串形式的零
//''	空字符串
//[]	空数组
//0.0	浮点数形式的零
$a=[];
if($a){
    echo 'a is ture';
}else {
    echo 'a is not ture';
}
echo  "<br>";
//数组
//索引数组
$fruit = ['a','b','c','d','e','f'];
$fruit[0] = 'pear';
echo $fruit[0];echo  "<br>";
//关联数组
$person=[
    'name'=>'小萌',
    'age'=>20
];
echo $person['name'];
//强制类型转换
$price="100";
var_dump((int)$price);echo  "<br>";
var_dump(is_int($price)); echo  "<br>";
var_dump(is_bool($ture)); echo  "<br>";
var_dump(is_numeric($price)); echo  "<br>";
//赋值运算符
$str = "hel;l";
$str .="6666";
echo $str;echo  "<br>";
$a=10;
$b=20;
var_dump($a<=>$b);//三元运算符, 如果 $a < $b 返回 -1, 如果 $a > $b 返回 1, 如果 $a == $b 返回 0


//echo "<div style='text-align: center; background-color: #f0f0f0; padding: 20px;'>";
//echo "当前文件路径是: " . __DIR__ . "<br>";
//echo "当前文件是: " . __FILE__ . "<br>";
//echo "This is Docker PHP info page";
//echo "<br>";
//echo "Current time: " . date('Y-m-d H:i:s');
//echo "</div>";
//
//phpinfo();