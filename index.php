<?php

// request the autoload from vendor folder
require_once(dirname(__FILE__) . '/vendor/autoload.php');
require_once(dirname(__FILE__) . '/helpers.php');
$translate = require_once(dirname(__FILE__) . '/config/translate.php');

use App\Parse;
use App\Validate;
use App\File;

$validate = new Validate($argv, $argc);

if($validate->getValid() == true)
{
    $parse = new Parse($argv[1]);

    $printTo = "log/doc.txt";
    $file = new File($printTo, $translate, $argv[2]);
    $file->write($parse->get());

    consoleLog("Content printed to file succesfully! File name is ". $printTo, null);
} else {
    $errors = $validate->getError();
    consoleLog("You have errors!", $errors);
}
