<?php

require_once "print.php";
$path1 = "/var/www/202503/php/file_function.php";
$path2 = "E://www//202503//php//file_function.php";
$path3 = "myfile.text";
$path4 = "/etc/php/";
printRWithBr(basename($path1));
printRWithBr(basename($path2));
printRWithBr(basename($path3));
printRWithBr(basename($path4));
//返回路径 $path 中的目录部分。
printRWithBr((dirname($path1)));
printRWithBr((dirname($path2, 2)));
printRWithBr((dirname($path3)));
printRWithBr((dirname($path4)));
//pathinfo
$path = "D:\007\config";
echoHr();
printRWithBr(pathinfo($path2,PATHINFO_DIRNAME));//只返回目录名
printRWithBr(pathinfo($path2,PATHINFO_BASENAME));//只返回完整文件名
printRWithBr(pathinfo($path2, PATHINFO_EXTENSION));//只返回文件拓展名
printRWithBr(pathinfo($path2, PATHINFO_FILENAME));//只返回不含拓展的文件名
printRWithBr(pathinfo($path2));
echoHr();
//realpath 获取一个明确、真实的绝对路径，有助于避免目录遍历等问题，或在包含文件时确保路径正确。
$path = "E:\Program Files\JetBrains\PhpStorm 2024.3.5\bin";
$realpath = realpath($path);
if($realpath){
    printRWithBr($realpath);
}else printRWithBr("no");
//相对路径
$path = "./a.php";
$realpath = realpath($path);
if($realpath){
    printRWithBr($realpath);
}else printRWithBr("no");
touch('temp.txt');
unlink('temp.txt');
// 构建跨平台的路径
//__FILE__：返回文件的完整路径（含文件名）
//__DIR__：返回文件的目录路径（不含文件名）
$configDir = __DIR__ . DIRECTORY_SEPARATOR . 'config';
$configFile = $configDir . DIRECTORY_SEPARATOR . 'database.php';

echo "配置文件路径: " . $configFile;
echo "<br>";

//file_exists(string $filename): bool: 检查文件或目录是否存在。
//is_file(string $filename): bool: 检查路径是否存在且为一个常规文件。
//is_dir(string $filename): bool: 检查路径是否存在且为一个目录。
//is_link(string $filename): bool: 检查路径是否存在且为一个符号链接。
//is_readable(string $filename): bool: 检查路径是否存在且当前 PHP 进程**可以读取**。
//is_writable(string $filename): bool (别名 is_writeable): 检查路径是否存在且当前 PHP 进程**可以写入**。这对于检查日志目录、上传目录、缓存目录的权限非常重要！
//is_executable(string $filename): bool: 检查路径是否存在且可以执行（通常用于检查脚本或程序文件）。
$path = "E:\Program Files\JetBrains\PhpStorm 2024.3.5\bin\brokenPlugins.db";
$pathrole = "E:\Program Files\JetBrains\PhpStorm 2024.3.5\bin";
printRWithBr(file_exists($path));//检查文件或目录是否存在。
printRWithBr(is_file($path));//检查路径是否存在且为一个常规文件。
printRWithBr(is_dir($pathrole));//检查路径是否存在且为一个目录。
$file = __DIR__.'my_document.txt';
$dir = __DIR__.'my_directory';
$link = __DIR__.'my_link.txt';
file_put_contents($file, "content");
mkdir($dir);

symlink($file, $link);
if(is_readable($pathrole)){
    echo "可以读取<br>";
}
if(is_writable($path)){
    echo "可以写入.<br>";
}
//$file = __DIR__ . "/example.txt";
//file_put_contents($file, "Hello, World!");
//$dir = __DIR__ . "/my_folder";
//mkdir($dir); // 默认为 0777 权限
//$link = __DIR__ . "/shortcut.txt";
//symlink($file, $link);
if(file_exists($link)){
    echo "link存在";
    if(is_link($link)){
        echo "是link";
    }
}else{
    echo "link不存在";
}
unlink($link);
unlink($file);
rmdir($dir);
$path = "D:/BaiduNetdiskDownload/034.mp4";
if(file_exists($path)){
    printRWithBr("文件大小为： ".filesize($path)."字节");
    printRWithBr("文件最后修改时间： ".date('Y-m-d H:i:s',filemtime($path)) );
    printRWithBr("文件inode修改时间： ".date('Y-m-d H:i:s',filectime($path)));
    printRWithBr("文件最后访问时间： ".date('Y-m-d H:i:s',fileatime($path)));
    printRWithBr("文件类型字符串： ".filetype($path));
    //printRWithBr("详细信息".stat($path));
    printRWithBr("当前磁盘剩余空间为：".round((disk_free_space("D:/BaiduNetdiskDownload")) / (1024 * 1024 * 1024),2)."GB");
    $stats = stat($path);
    if($stats){
        echo "权限".decoct($stats['mode'] & 0777) ."\n";//& 0777 只取权限位
        echo "所有者 UID: " . $stats['uid'] . "\n";
    }
}
//目录操作
//mkdir
$baseDir = 'text_dir';
$subDir = $baseDir . DIRECTORY_SEPARATOR  .'subdir';

if(!is_dir($subDir)){
    if(mkdir($subDir, 0755, true)){
        echo "目录{$subDir}创建成功。\n";
    }else "傻逼";
}

file_put_contents($baseDir . DIRECTORY_SEPARATOR . 'file1.txt', "content1");
file_put_contents($subDir . DIRECTORY_SEPARATOR . 'file2.666', "content1");
file_put_contents($subDir . DIRECTORY_SEPARATOR . 'img3.txt', "content1");

//扫描目录
$entries = scandir($baseDir);
if($entries !== false){
    foreach($entries as $entry){
        //排除当前目录和上级目录
        if($entry != "." && $entry != ".."){
            $entryPath = $baseDir . DIRECTORY_SEPARATOR . $entry;
            $type = is_dir($entryPath) ? "目录" : "文件";
            echo "--{$entry}({$type})\n";
        }
    }
}
//glob查文件
$logFiles = glob($baseDir .DIRECTORY_SEPARATOR . '/*.log');
if($logFiles !== false && count($logFiles) > 0){//没找到会返回空数组
    printRWithBr($logFiles);
}else
    printRWithBr("傻逼");
unlink($subDir . DIRECTORY_SEPARATOR . 'file2.666');
unlink($subDir . DIRECTORY_SEPARATOR . 'img3.txt');
rmdir($subDir);
unlink($baseDir . DIRECTORY_SEPARATOR . 'file1.txt');
rmdir($baseDir);
printRWithBr("清光光");

$source = 'original.txt';
$copyDest = 'copy_of_original.txt';
$renameDest = 'renamed_original.txt';
//创建
file_put_contents($source, 'Original content.');
//赋值
if (copy($source, $copyDest)) {
    echo "'{$source}' 复制到 '{$copyDest}' 成功。\n";
} else {
    echo "复制失败！\n";
};
//移动重命名
if(rename($copyDest, $renameDest)){
    echo "'{$copyDest}' 重命名为 '{$renameDest}' 成功。\n";
} else
    echo "重命名失败！\n";

if (file_exists($renameDest)) {
    unlink($renameDest);
    echo "'{$renameDest}' 已删除。\n";
}
if (file_exists($source)) {
    unlink($source);
    echo "'{$source}' 已删除。\n";
}


echoHr();



$userInfo = [
    'name' => 'Elon Musk',
    'nickname' => '马书记',
    'age' => 30,
    'avatar' => 'https://example.com/avatar.jpg',
    'email' => 'test@example.com',
    'phone' => '1234567890',
    'address' => '123 Main St, City, Country',
    'bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
    'website' => 'https://example.com',
    'social' => [
        'facebook' => 'https://facebook.com/elonmusk',
        'twitter' => 'https://twitter.com/elonmusk',
        'linkedin' => 'https://linkedin.com/in/elonmusk',
    ],
    'skills' => [
        'PHP',
        'JavaScript',
        'HTML',
        'CSS',
        'MySQL',
    ],
    'projects' => [
        [
            'title' => 'Project 1',
            'description' => 'Description of project 1.',
            'url' => 'https://example.com/project1',
        ],
        [
            'title' => 'Project 2',
            'description' => 'Description of project 2.',
            'url' => 'https://example.com/project2',
        ],
    ],
    'education' => [
        [
            'degree' => 'Bachelor of Science in Computer Science',
            'institution' => 'University of Example',
            'year' => 2015,
        ],
        [
            'degree' => 'Master of Science in Software Engineering',
            'institution' => 'Example University',
            'year' => 2017,
        ],
    ],
];
// 使用 json_encode() 将数组转换为 JSON 字符串
echoWithBr(json_encode($userInfo));
$jsonString = json_encode($userInfo, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
echoWithBr("<pre>{$jsonString}</pre>");

$userInfoJson = '{"name":"Elon Musk","nickname":"\u9a6c\u4e66\u8bb0","age":30,"avatar":"https:\/\/example.com\/avatar.jpg","email":"test@example.com","phone":"1234567890","address":"123 Main St, City, Country","bio":"Lorem ipsum dolor sit amet, consectetur adipiscing elit.","website":"https:\/\/example.com","social":{"facebook":"https:\/\/facebook.com\/elonmusk","twitter":"https:\/\/twitter.com\/elonmusk","linkedin":"https:\/\/linkedin.com\/in\/elonmusk"},"skills":["PHP","JavaScript","HTML","CSS","MySQL"],"projects":[{"title":"Project 1","description":"Description of project 1.","url":"https:\/\/example.com\/project1"},{"title":"Project 2","description":"Description of project 2.","url":"https:\/\/example.com\/project2"}],"education":[{"degree":"Bachelor of Science in Computer Science","institution":"University of Example","year":2015},{"degree":"Master of Science in Software Engineering","institution":"Example University","year":2017}]}';
// json_decode() 将JSON字符串转为php数组
$userArray = json_decode($userInfoJson, true);
echo "<pre>";
printRWithBr($userArray);
echo "</pre>";
echoWithBr($userArray['nickname']);


