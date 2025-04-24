<?php
//header("Location: http://localhost:63342/www/202503php/php/front.html");
//exit;
require_once "print.php";
//    printRWithBr($_GET);
//处理GET请求
if($_GET){
    if(isset($_GET['query']));
    {
        $search = $_GET['query'];
        $safeSearch = htmlspecialchars($search ?? '', ENT_QUOTES, 'utf-8');
        echo "你通关get方法搜索了{$safeSearch}";
    }
}

$page = $_GET['page'] ?? 1;
$safePage = htmlspecialchars($page, ENT_QUOTES, 'utf-8');
echo "当前页码：{$safePage}";

//处理POST
//数据在请求体中发送，不在 URL 中显示。
if(($_SERVER['REQUEST_METHOD'] === 'POST')) {
    echo "处理POST请求";
    if(isset($_POST['name']) && isset($_POST['email'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $safeName = htmlspecialchars($name, ENT_QUOTES, 'utf-8');
        $safeEmail = htmlspecialchars($email, ENT_QUOTES, 'utf-8');
        echo "登录用户名：{$safeName}<br>邮箱：{$safeEmail}";


    }
}
//session_start();
//printRWithBr($_SESSION);
// 检查表单是否通过 POST 提交
if ($_SERVER["REQUEST_METHOD"] == "POST") {

// 检查 'uploadedFile' input 是否存在于 $_FILES 中，并且没有错误
    if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
        // --- 1. 获取文件信息 ---
        $fileTmpPath = $_FILES['uploadedFile']['tmp_name']; // 临时文件路径
        $fileName = $_FILES['uploadedFile']['name'];       // 原始文件名 (不可信)
        $fileSize = $_FILES['uploadedFile']['size'];       // 文件大小 (字节)
        $fileType = $_FILES['uploadedFile']['type'];       // 浏览器报告的 MIME 类型 (不可信)
        $fileNameCmps = explode(".", $fileName);          // 分割文件名获取扩展名
        $fileExtension = strtolower(end($fileNameCmps)); // 获取小写的文件扩展名
        echo "收到的文件信息：<br>";
        echo "临时路径: " . htmlspecialchars($fileTmpPath) . "<br>";
        echo "原始文件名: " . htmlspecialchars($fileName) . "<br>";
        echo "文件大小: " . $fileSize . " bytes<br>";
        echo "浏览器报告类型: " . htmlspecialchars($fileType) . "<br>";
        echo "文件扩展名: " . htmlspecialchars($fileExtension) . "<br>";
    }
    else {
        // 处理上传错误
        $errorMessage = "未知上传错误。";
        if (isset($_FILES['uploadedFile']['error'])) {
            switch ($_FILES['uploadedFile']['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    $errorMessage = "错误：上传的文件超过了 php.ini 中 upload_max_filesize 的限制。";
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $errorMessage = "错误：上传的文件超过了 HTML 表单中 MAX_FILE_SIZE 的限制。";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $errorMessage = "错误：文件只有部分被上传。";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $errorMessage = "错误：没有文件被上传。";
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $errorMessage = "错误：找不到临时文件夹。";
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $errorMessage = "错误：文件写入失败。";
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $errorMessage = "错误：某个 PHP 扩展停止了文件上传。";
                    break;
                default:
                    $errorMessage = "发生未知上传错误，错误代码: " . $_FILES['uploadedFile']['error'];
                    break;
            }
        }
        die($errorMessage);
    }
}