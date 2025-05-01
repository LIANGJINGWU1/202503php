<?php


$testData = [
    [
        'string' => 'Hello, my name is Lu and I live in Chengdu.',
        'values' => ['name' => 'Zhang'],
        'message' => '1、字符串中没有标签需要替换，直接输出结果。 ✅'
    ],
    [
        'string' => 'Say hello to {{ name }}. He is {{ age }}.',
        'values' => ['name' => 'Lu', 'age' => 19],
        'message' => '2、字符串中有标签需要替换，返回替换之后的字符串。 ✅'
    ],
    [
        'string' => 'Say hello to {{ name }}. He is {{ age }}.',
        'values' => ['name' => 'Lu', 'age' => 18, 'male' => true],
        'message' => '3、字符串中有标签需要替换，values 中多余给出来的值不做任何处理。 ✅'
    ],
    [
        'string' => 'The next F1 race will be in {{ city }} on {{ date }}.',
        'values' => ['city' => 'Melbourne', 'date' => '2022-08-25'],
        'message' => '4、给定不一样的变量名也同样兼容。 ✅'
    ],
    [
        'string' => 'The opening five weekends of the season have been challenging for Hamilton after his switch to {{ toTeam }} from {{ fromTeam }} in the off-season, which has so far yielded a best Grand Prix result of {{ bestResult }} in {{ city }}.',
        'values' => ['toTeam' => 'Ferrari', 'fromTeam' => 'Mercedes', 'bestResult' => 'fifth', 'city' => 'Bahrain', 'date' => '2022-08-25'],
        'message' => '4、给定不一样的变量名也同样兼容。 ✅'
    ],
//    [
//        'string' => 'The next F1 race will be in {{ city }} on {{ date }}.',
//        'values' => ['city' => 'Spa'],
//        'message' => '5、字符串中有标签需要替换，但是给定的 values 值中缺少对应的参数，会抛出异常。 ❌'
//    ]
];
function exchange($c)
{
    foreach($c as $cc){//第一轮遍历第一层[]
        if($cc){
            $str = "";
            $val = [];
            foreach ($cc as $key => $value){//遍历每层的键名，’string，values等

                if($key === 'string'){//如果键名==‘string'
                    $str = $value;
                }
                if($key === 'values'){
                    $val = $value;//这是一个键名数组
                    foreach($val as $valval => $valvalval){//遍历values内部的键名
                        if(str_contains($str, $valval)){
                            //echo str_replace("{{ $valval }}", $valvalval, $str);
                            $str = str_replace("{{ $valval }}", $valvalval, $str);
                            echo $str."<br>";
                        }
                    }
                }

//                echo  $value."<br>";
            }
        }

    }
}
function exchange2($c)
{
    foreach($c as $cc){
        if ($cc) {
            // ✅ 这两个变量在整个 $cc 中有效
            $str = "";
            $val = [];

            foreach ($cc as $key => $value) {
                if ($key === 'string') {
                    $str = $value;
                }

                if ($key === 'values') {
                    $val = $value;

                    foreach ($val as $valval => $valvalval) {
                        if (str_contains($str, $valval)) {
                            $str = str_replace("{{ $valval }}", $valvalval, $str);
                        }
                    }

                    echo $str . "<br>"; // 输出最终替换结果
                }
            }
        }
    }
}
exchange2($testData);