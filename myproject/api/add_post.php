<?php
require_once '../includes/config.php';
require_once '../includes/PostManager.php';
//设置返回格式为json
header('Content-Type: application/json');

$postManager = new PostManager($pdo);
//关联数组整体传递
$data = $_POST;


//检查有没有上传，并且检查文件上传过程中的错误代码。UPLOAD_ERR_OK	常量值是 0，表示上传成功，没有错误
if(isset($_FILES['cover_img']) && $_FILES['cover_img']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = '../uploads/';
    //如果目录不存在，就新建一个
    if(!file_exists($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    //tmp_name 是临时文件路径,当用户上传一个文件时，PHP会把文件先保存到服务器的临时目录,如果不把它移动走，它很快就被系统自动删除
    $fileTmpPath = $_FILES['cover_img']['tmp_name'];
    $originalFileName = $_FILES['cover_img']['name'];//name是上传时的文件名
    //pathinfo() 是一个提取路径信息的函数,PATHINFO_EXTENSION 直接拿到文件扩展名（比如 jpg、png、pdf）,返回拓展名
    $fileExt = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));//强制转小写

    $allowedExt = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    if(!in_array($fileExt, $allowedExt)) {
//        die('只允许上传图片格式（jpg, jpeg, png, gif, webp）');
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'error',
            'message' => '只允许上传图片格式（jpg, jpeg, png, gif, webp）'
        ]);
        exit();
    }
    $check = getimagesize($fileTmpPath);
    if($check === false) {
        echo json_encode([
            'success' => false,
            'message' => '上传的不是有效图片文件！'
        ]);
        exit;
    }
    //防止文件名冲突，起随机名字
    $newFileName = time() . '_' . mt_rand(1000, 9999) . '.' . $fileExt;
    $destPath = $uploadDir . $newFileName;
//    $destPath = 'uploads/' . $newFileName;

    //把上传到服务器临时目录的文件，移动到你指定的地方。
    if(move_uploaded_file($fileTmpPath, $destPath)) {
        //上传成功，把路径保存在表单数据里
        $data['cover_img'] = $destPath;
    }else $data['cover_img'] = '';//上传失败，默认或者空图片
} else {
    $data['cover_img'] = '';
}
// 插入数据库，并返回标准响应
if ($postManager->addPost($data)) {
    echo json_encode([
        'success' => true,
        'message' => '新增成功！'
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => '新增失败！'
    ]);
}
exit;