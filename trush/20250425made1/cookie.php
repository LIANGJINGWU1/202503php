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
//$url ="https://baidu.com";
//$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, $url);
//
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//
//curl_setopt($ch, CURLOPT_USERAGENT, 'My PHPCurlClient/1.0');
//
//curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
//
//curl_setopt($ch, CURLOPT_TIMEOUT, 30);
//
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//echo "正在请求: {$url} ...<br>";
//$response = curl_exec($ch);
//if ($response === false) {
//// curl_exec() 失败，获取错误信息
//    $error_no = curl_errno($ch);
//    $error_msg = curl_error($ch);
//    echo "<b class='text-red-600'>cURL Error ({$error_no}): {$error_msg}</b><br>";
//} else {
//// 请求成功
//    echo "请求成功！<br>";}

// 目标 URL (假设这个 URL 会接收并处理 POST 数据)
$post_url = "http://localhost/202503php/php/cookie.php"; // httpbin.org 是一个用于测试 HTTP 请求的好工具

// 要发送的数据 (模拟表单字段)
$post_data = [
    'username' => 'testuser',
    'password' => 'secret123', // 实际密码不应这样传输
    'action' => 'login'
];

// 1. 初始化
$ch = curl_init();

// 2. 设置选项
curl_setopt($ch, CURLOPT_URL, $post_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// 设置为 POST 请求
curl_setopt($ch, CURLOPT_POST, true);

// 设置 POST 数据
// 方式一：直接传递关联数组，cURL 通常会使用 multipart/form-data
// curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

// 方式二：将数组转换为 URL 编码的字符串 (更像传统表单)
// 并设置 Content-Type 头
$post_fields = http_build_query($post_data);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);

// 其他选项 (超时等)
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);

// 3. 执行
echo "正在向 {$post_url} 发送 POST 请求...<br>";
$response = curl_exec($ch);

// 4. 检查错误
if ($response === false) {
    $error_no = curl_errno($ch);
    $error_msg = curl_error($ch);
    echo "<b class='text-red-600'>cURL Error ({$error_no}): {$error_msg}</b><br>";
} else {
// 5. 获取信息
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    echo "HTTP Status Code: {$http_code}<br>";

// httpbin.org/post 会返回包含请求信息的 JSON
    echo "<h4>响应内容:</h4>";
    echo "<pre>" . htmlspecialchars($response) . "</pre>";

// 你可以尝试 json_decode() 来解析响应
// $decoded_response = json_decode($response, true);
// if ($decoded_response) { print_r($decoded_response['form'] ?? $decoded_response['data']); }
}

// 6. 关闭
curl_close($ch);
echo "cURL handle closed.";







