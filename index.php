<?php

// request the autoload from vendor folder
require_once(dirname(__FILE__) . '/vendor/autoload.php');
require_once('helpers.php');

use App\Parse;
use App\Validate;
use App\File;

$validate = new Validate($argv, $argc);

if($validate->getValid() == true)
{
    $parse = new Parse($argv[1]);

    $file = new File("log/doc.txt");
    $file->write($parse->get());

    dd($parse->get());
} else {
    $errors = $validate->getError();
    dd($errors);
}
