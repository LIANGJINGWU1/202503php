<?php
function  getFloderDepth($path , $level = 0){
    $maxDepth = $level;
    echo "当前层级为".$level.'--最大层级：'.$maxDepth."当前目录".$path."<br>";
    if(is_dir($path)){//is_dir()判断是否是文件夹
        $items = scandir($path);//scandir()获取当前目录内容
//        print_r($items);
//        echo "<br>";
        foreach($items as $item){
            if($item === '.' || $item === '..') continue;
            //DIRECTORY_SEPARATOR 是为了在 Windows（\）和 Linux（/）中都兼容。
            //跳过当前目录 . 和父目录 ..，这两个是每个文件夹里都自动存在的系统项，不能递归进去。
            //拼接成子项的完整路径
            //比如当前 $path 是 /var/www，$item 是 html，那么 $newPath 就变成了/var/www/html
            $newPath = $path . DIRECTORY_SEPARATOR . $item;
            if(is_dir($newPath)){//判断新的路径是否是文件夹
                $depth = getFloderDepth($newPath, $level+1);//递归层级加1
                echo "已经从".($level+1)."层级退出，当前目录".$newPath."<br>";
                if($depth > $maxDepth){
                    echo "之前最大层级为".$maxDepth;
                    $maxDepth = $depth;
                    echo "---更新后当前最大深度为".$maxDepth."<br>";
                }else
                    echo "当前层级为".$depth."最大层级为".$maxDepth."此时目录".$newPath."<br>";
            }
        }
        echo "foreach完".$path."<br>";
    }
    echo  "即将从".$level."层级退出，当前目录".$path."<br>";
    return $maxDepth;

}
$rootPath = 'D:\Program Files\Tencent';
echo "最大文件夹层级是".getFloderDepth($rootPath)."<br>";

//斐波那契数列
function  fnn($n)
{
    if($n === 0) return 0;
    if($n === 1) return 1;
   return fnn($n - 1) + fnn($n - 2);
}
print_r(fnn(10));
