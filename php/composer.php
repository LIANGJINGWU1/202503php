<?php
require __DIR__ . '/vendor/autoload.php';

use Cowsayphp\Cow;


$cow = new Cow();
$output = $cow->say('你好，PHP奶牛登场！');

echo $output;
