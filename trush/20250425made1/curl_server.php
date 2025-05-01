<?php

// curl_server.php
header('Content-Type: application/json');

// 获取 POST 数据
$name = $_POST['name'] ?? '游客';
$age = $_POST['age'] ?? '未知';

// 模拟响应数据
$response = [
    'status' => 'success',
    'message' => "你好，{$name}！你今年 {$age} 岁。",
    'time' => date('Y-m-d H:i:s')
];

// 返回 JSON 给客户端
echo json_encode($response);