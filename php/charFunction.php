<?php
$str1 = "apple";
$str2 = "Aanana";
$str3 = "aanana";
var_dump(strcmp($str1,$str1));
var_dump(strcmp($str3,$str2));
$result = strcmp("aanana", "Aanana");
var_dump((int)$result);
var_dump(strcmp($str1,$str3));

var_dump(strncmp($str2,$str3,3));
$img1 = "img12.png";
$img2 = "img16.png";

var_dump(strcmp($img1,$img2));
var_dump(strnatcmp($img2,$img1));
//替换字符串

$text = "AAABBBCCCDDD";
$newtext = str_replace("A","a",$text);
echo $newtext;
echo "<br>";

$text = "the quick brown fox jumps over the lazy dog";
$newtext = str_replace("quick","b",$text);
echo $newtext."<br>";
$serch = ["fox","dog"];
$replace = ["cat","bear"];
$newtext2 = str_replace($serch,$replace,$text,$count);
echo $newtext2."<br>";
echo "替换次数：".$count."<br>";

//substr_replace offset参数为负，从倒数开始
$string = "abcedDd";
echo substr_replace($string,"XYZ",3,2);
echo "<br>";
$url = "http://www.baidu.com";
echo  substr_replace($url,'https:///',strpos($url,'https://'),strlen('https://'));
echo "<br>";
$email = "ljw@gmail.com";

echo substr_replace($string,"XTZ",3,0);//0为插入
echo "<br>";
echo substr_replace($string,"XTZ",-3,-1);//负数：替换到倒数第几位之前，不包括那个位置。
echo "<br>";
echo substr_replace($string,"XTZ",-3,1);
echo "<br>";
//substr
echo substr($email,strpos($email,'@')+1);
echo "<br>";

$url = 'https://www.mhlw.go.jp/search.html?q=123&cx=005876357619168369638%3Aydrbkuj3fss&cof=FORID%3A9&ie=UTF-8&sa=';
$awsUrl = 'https://aws.amazon.com/cn/s3/?nc2=h_ql_prod_fs_s3';
echo substr($url,strpos($url,'?')+1);
echo "<br>";
echo substr($url,0,-(strlen($url) - strrpos($url,'?')));//截取？后的字符
echo "<br>";
echo substr($awsUrl,0,-(strlen($awsUrl) - strrpos($awsUrl,'?')));
echo "<br>";

$code = 'aAa BbC cDd';
echo strtolower($code);//将大写变成小写
echo "<br>";
echo strtoupper($code);//边大写
echo "<br>";
echo ucfirst($code);//字符串首位边大写
echo "<br>";
echo ucwords($code);// 换行符，空格等分割的单词首字母大写
echo "<br>";


$flieName = 'learn_php_666.php';
$flieName = substr($flieName,0,-(strlen($flieName) - strpos($flieName,'.')));
echo $flieName;
echo "<br>";
$flieName = str_replace('_', "",$flieName);
echo $flieName;
echo "<br>";

//trim
//移除字符串两端的空白字符（默认）或 $characters 参数中指定的字符。
$string = " php ";
echo strlen($string);
echo "<br>";
$trimString = trim($string);
echo strlen($trimString);
echo "<br>";
//ltrim 移除字符串最左边的字符串
$str = "a/b/c";
echo ltrim($str,"a");
echo "<br>";
// rtrim 移除右边
echo rtrim($str,"b/c");
echo "<br>";

//格式化输出
//%s: 字符串
//%d: 整数 (十进制)
//%f: 浮点数 (小数表示)
//%x: 整数 (十六进制小写)
//%X: 整数 (十六进制大写)
//%o: 整数 (八进制)
//%%: 输出一个百分号 %
$name = "alice";
$age = 20;
$score = 10;

$out = sprintf("姓名：  %s,年龄: %d,分数:%.1f%%",$name,$age,$score);
echo $out;
echo "<br>";

printf("ID= %05d",123);
echo "<br>";
//explode分割
$productType = "1,3,5";
$proarry = explode(",",$productType);
$proarry2 = explode(",",$productType,2);
print_r($proarry);
echo "<br>";
print_r($proarry2);
echo "<br>";

//implode合并

$fruit = ["banana","apple","peach"];
echo implode("666",$fruit);
echo "<br>";

//str_split
//将字符串 $string 分割成一个数组。
//如果 $length 省略或为 1，则每个元素是原字符串的一个字符。
//如果指定了 $length，则将字符串分割成长度为 $length 的块（最后一块可能较短）。
$productSearchKeywordsArr = ['黑色', '足训鞋', '真皮', '亚瑟士',  '足球鞋'];
$searchCondition = "黑色足球鞋男款";
$searchConditionArr1 = mb_str_split($searchCondition, 2);
$searchConditionArr2 = mb_str_split('足球鞋男款', 3);
var_dump($searchConditionArr1);
echo "<br>";
print_r($searchConditionArr2);
echo "<br>";
$intersection1 = array_intersect($productSearchKeywordsArr, $searchConditionArr1);
$intersection2 = array_intersect($productSearchKeywordsArr, $searchConditionArr2);
echo "<br>";
$matchCount = count($intersection1) + count($intersection2);
var_dump($matchCount);
echo "<br>";
echo '&nbsp;你好 ';
echo "<br>";
echo "<h1>这是一个 h1 标签</h1>";
echo "&lt;h1&gt;这是一个 h1 标签&lt;/h1&gt;";
echo "<br>";

//清除标签
echo htmlspecialchars("<script>alert('666')</script>");
echo "<br>";
//尝试从字符串中去除 HTML 和 PHP 标记。
echo strip_tags("<h1>66666</h1>");
echo "<br>";
$str = strip_tags("<?php echo 123; ?>ss");
echo $str;
echo "<br>";
$html = "<p><i>这是</i>一段<b>加粗</b>的<script>alert('oops');</script>文本。</p>";
echo strip_tags($html, '<p><script>');//允许表达的标签

//urlencode
//对字符串进行 URL 编码（空格编码为 +，其他非字母数字字符编码为 %HH）或解码。
//主要用于构建 URL 的查询字符串部分 (?key=value&...)。

$query = "搜索 词";
$url = "https://example.com/search?q=" . urlencode($query);
echo $url;
echo "<br>";

//rawurlencode  同上

$path = "文件 名.txt";
$urlPath = "https://example.com/files/" . rawurlencode($path);
echo $urlPath;
echo "<br>";

//parse_str
//将一个类似 URL 查询字符串 (key1=value1&key2=value2)
//的字符串解析到变量中（如果只传一个参数，会直接注册变量，不推荐）
//或解析到指定的 $result 数组中。

$result=[];
parse_str('key1=value1&key2=value2', $result);
var_dump($result);

//http_build_query
//根据数组或对象生成一个 URL 编码后的查询字符串。与 parse_str 相反。

$params = [
    'search' => 'PHP 教程',
    'page' => 1,
    'filters' => ['free', 'beginner'] // 数组会被处理
];
$queryString = http_build_query($params);
echo $queryString;






