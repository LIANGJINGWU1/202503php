<?php

header('Content-Type: application/json');
require_once '../includes/config.php';
require_once '../includes/PostManager.php';

$postManager = new PostManager($pdo);

// 获取前端发来的JSON数据
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['codes']) && is_array($data['codes']) && !empty($data['codes'])) {
    try {
        // 构建动态占位符 (?, ?, ?, ...)
        $placeholders = rtrim(str_repeat('?,', count($data['codes'])), ',');

        $sql = "DELETE FROM movie WHERE code IN ($placeholders)";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute($data['codes'])) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => '数据库执行失败']);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => '请求参数有误']);
}
exit;