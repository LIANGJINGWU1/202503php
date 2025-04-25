<?php
//<!--//-->
//<!--//$cookie = 'theme';-->
//<!--//$cookie_value = 'dark';-->
//<!--//$expiry_time = time() + (86400 * 30);-->
//<!--//-->
//<!--//setcookie($cookie, $cookie_value, $expiry_time, "/", "", true, true);-->
//<!--//-->
//<!--//setcookie($cookie, $cookie_value, [-->
//<!--//    'expires' => $expiry_time,-->
//<!--//    'path' => '/',-->
//<!--//    'domain' => '', // 默认当前域名-->
//<!--//    'secure' => true,-->
//<!--//    'httponly' => true,-->
//<!--//    'samesite' => 'Lax' // Lax 或 Strict 通常比 None 更安全-->
//<!--//]);-->
//<!--//-->
//<!--<!DOCTYPE html>-->
//<!--<html>-->
//<!--<head><title>Cookie Test</title></head>-->
//<!--<body>-->
//<!--<p>已设置 cookie，请按 F12 检查浏览器的 Cookie。</p>-->
//<!--</body>-->
//<!--</html>-->
//<!---->
//<!--if (isset($_COOKIE['theme'])) {-->
//<!--// 获取 Cookie 值 (注意安全输出)-->
//<!--user_theme=htmlspecialchars(_COOKIE['theme']);-->
//<!--echo "检测到用户偏好主题: " . $user_theme;-->
$url ="https://baidu.com";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_USERAGENT, 'My PHPCurlClient/1.0');

curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);

curl_setopt($ch, CURLOPT_TIMEOUT, 30);

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
echo "正在请求: {$url} ...<br>";
$response = curl_exec($ch);
if ($response === false) {
// curl_exec() 失败，获取错误信息
    $error_no = curl_errno($ch);
    $error_msg = curl_error($ch);
    echo "<b class='text-red-600'>cURL Error ({$error_no}): {$error_msg}</b><br>";
} else {
// 请求成功
    echo "请求成功！<br>";}






