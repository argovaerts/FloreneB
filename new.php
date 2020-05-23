<?php

require 'vendor/autoload.php';
use Symfony\Component\Yaml\Yaml;

$filename = date('Y_m_d_H_i_s');

$array = [
    'name'  => '',
    'date'  => date('c'),
    'lang'  => 'en'
];

$yaml = Yaml::dump($array);

$c = '---' . PHP_EOL . $yaml . '---' . PHP_EOL . PHP_EOL;

if($argc > 1 && $argv[1] === '-o') {
    file_put_contents("Source/Posts/$filename.md", $c);
}
else {
    echo $c;
}