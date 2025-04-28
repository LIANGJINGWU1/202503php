<?php
require __DIR__.'/includes/config.php';
require __DIR__.'/includes/header.php';

$stmt = $pdo->query("SELECT code, title, cover_img FROM movie ORDER BY id DESC LIMIT 10");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($posts);
echo '</pre>';
?>

<h1>欢迎来到我的资源网站</h1>
<div class="post-list">
<?php foreach ($posts as $post): ?>
    <div class="post">
        <a href="view.php">
            <img src="<?php echo htmlspecialchars($post['cover_img'] ?? ''); ?>" width="200">
            <h2><?php echo htmlspecialchars($post['title']) ?? ''; ?></h2>
            <p><?php echo htmlspecialchars($post['code'] ?? ''); ?></p>
        </a>
    </div>
<?php endforeach; ?>
</div>

<?php require 'includes/footer.php'; ?>
