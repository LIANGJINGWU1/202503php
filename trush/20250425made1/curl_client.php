<?php

$url = "http://localhost/202503php/php/curl_server.php"; // 你的服务器路径

// 要发送的数据
$postData = [
    'name' => '小明',
    'age' => 22
];

// 初始化 cURL
$ch = curl_init($url);

// 配置 POST 请求
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => http_build_query($postData), // 编码数据
    CURLOPT_CONNECTTIMEOUT =>5,
    CURLOPT_TIMEOUT =>5,
]);

// 执行请求
$response = curl_exec($ch);

// 检查错误
if (curl_errno($ch)) {
    echo "cURL 错误：" . curl_error($ch);
} else {
    // 解析 JSON 响应
    $data = json_decode($response, true);
    echo "响应内容：<br>";
    echo "<pre>" . print_r($data, true) . "</pre>";
}

// 关闭连接
curl_close($ch);