<?php
require_once "print.php";
$html = "<b>bold text</b> and <i>italic text</i>";
//贪婪
preg_match('/<b>(.*)<\/b>/', $html, $matches_greedy);
varDumpWithBr($matches_greedy);
//懒惰，只匹配0/1个字符，输出为array（）
preg_match('/<b>(.?)<\/b>/', $html, $matches_greedy);
printRWithBr($matches_greedy);
//验证是否是邮箱地址
$pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
$test = "123_test@my-domain.co.jp";
preg_match($pattern, $test, $matches);
var_dump($matches);
//提取文本的所有url
//$text = "访问我们的网站 https://www.example.com 或查看 ftp://files.example.org/data.zip";
////---\b用于确保匹配的是整个单词，而不是单词的一部分。匹配https|ftps一次或多次
////$pattern = '/\b(https?|ftps?)://[-A-Z0-9+&@#/%?=~|!:,.;]*[-A-Z0-9+&@#/%=~|]/i'; // i 不区分大小写
//$pattern = '#\b(https?|ftps?)://[-A-Z0-9+&@#/%?=~|!:,.;]*[-A-Z0-9+&@#/%=~|]#i';
//$match_count = preg_match_all($pattern, $text, $matches, PREG_SET_ORDER);
//if($match_count > 0){
//    echo "找到了{$match_count}个url";
//}
$text = "访问我们的网站 https://www.example.com 或查看 ftp://files.example.org/data.zip";

$pattern = '^\b(https?|ftps?)://[-A-Z0-9+&@#/%?=~|!:,.;]*[-A-Z0-9+&@#/%=~|]^i';
$match_count = preg_match_all($pattern, $text, $matches, PREG_SET_ORDER);

if ($match_count > 0) {
    echo "找到了 {$match_count} 个 URL：<br>";
    echo "<ul>";
    foreach ($matches as $match) {
        $url = htmlspecialchars($match[0]);
        $protocol = htmlspecialchars($match[1]);
        echo "<li>协议: {$protocol},网址： {$url}</li>";

    }
    echo "</ul>";
} else {
    echo "没有找到 URL";
}
//隐藏手机号中间4位
$phone = "13644441234";
$pattern = '/(\d{3})\d{4}(\d{4})/'; // 捕获前三位和后四位
$replace = "$1****$2";
$masked_phone = preg_replace($pattern, $replace, $phone);
echo "原始电话：{$phone}<br>";
echo "修改后{$masked_phone}<br>";

$markdown = "这是一个链接 [PHP官网](https://www.php.net) 和另一个 [搜索](https://www.google.com/search?q=URL)。";

// 模式：匹配 文字
// [(.?)] : 捕获链接文字 (非贪婪)
// (     : 匹配左括号
// (.?)  : 捕获 https://www.google.com/search?q=URL (非贪婪)
// )     : 匹配右括号
$pattern = '/\[(.*?)]\((.*?)\)/';
// 定义回调函数
$callback = function($matches) {
    // $matches[0] 是整个匹配 "文字"
    // $matches[1] 是第一个捕获组 (文字)
    // $matches[2] 是第二个捕获组 (https://www.google.com/search?q=URL)
    $text = htmlspecialchars($matches[1], ENT_QUOTES, 'UTF-8'); // 对文字进行 HTML 转义
    $url = htmlspecialchars($matches[2], ENT_QUOTES, 'UTF-8');  // 对 https://www.google.com/search?q=URL 也进行转义 (防止属性注入)

    // 返回 HTML 链接标签
    return '<a href="' . $url . '" target="_blank">' . $text . '</a>';
};

// 执行替换
$html = preg_replace_callback($pattern, $callback, $markdown);

echo "Markdown: " . htmlspecialchars($markdown) . "\n<br>";
echo "HTML: " . htmlspecialchars($html) . "\n<br>"; // 查看源码
echo "渲染效果: " . $html . "\n"; // 在浏览器查看效果




