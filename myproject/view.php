<?php
require_once 'includes/header.php';
require_once 'includes/config.php';
require_once 'includes/PostManager.php';
$postManager = new PostManager($pdo);
$post = $postManager->getAllPost();
foreach ($post as $key => $value) {
    echo htmlspecialchars($value['code']);
}
require_once 'includes/footer.php';
?>

