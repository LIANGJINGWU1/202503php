<?php

session_start();

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirm = $_POST['confirm'] ?? '';

// 保存旧数据，防止用户重新输入
$_SESSION['old'] = [
    'name' => $name,
    'email' => $email
];

// 简单验证
if ($password !== $confirm) {
    $_SESSION['error'] = '两次密码不一致！';
    header("Location: form.php");
    exit;
}

// 假装注册成功
unset($_SESSION['old'], $_SESSION['error']);
echo "注册成功，欢迎你，{$name}！";
