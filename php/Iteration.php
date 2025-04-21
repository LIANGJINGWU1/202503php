<?php
function city_date($c)
{
    $city = '';
    $date = '';

    foreach ($c as $key => $value) {
        if($key === 'city')
            $city = $value;
        if($key === 'date')
            $date = $value;

    }
    echo 'The next F1 race will be in '.$city.'on '.$date.'<br>';
}
$c = ['city' => 'Melbourne', 'date' => '2022-04-08'];
city_date($c);

function city_date_w($c)
{
    $city = '';
    $date = '';
    $weather = '';
    foreach ($c as $key => $value) {
        if($key === 'city')
            $city = $value;
        if($key === 'date')
            $date = $value;
        if($key === 'weather')
            $weather = $value;
    }
    echo 'The next F1 race will be in '.$city.'on '.$date.'ssas '.$weather.'<br>';
}
$c = ['city' => 'Melbourne', 'date' => '2022-04-08', 'weather' => '晴天'];
city_date_w($c);