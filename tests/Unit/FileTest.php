<?php

namespace Test\Unit;

use PHPUnit\Framework\TestCase as TestCase;
use App\File;
use App\Parse;

class FileTest extends TestCase
{
    protected $file;

    public function setUp()
    {
        $path = "log/doc.txt";
        $translate = require(dirname(__FILE__) . "/../../config/translate.php");
        $lang = "es";
        $this->file = new File($path, $translate, $lang);
    }

    public function testLanguage()
    {
        $parse = new Parse(2017);
        $result = $this->file->write($parse->getDays());

        // Case 1
        $this->assertEquals(substr($result, 0, 16), "'Nombre del mes'");

        // Case 2
        $path = "log/doc.txt";
        $translate = require(dirname(__FILE__) . "/../../config/translate.php");
        $lang = "en";
        $this->file = new File($path, $translate, $lang);

        $result = $this->file->write($parse->getDays());
        $this->assertEquals(substr($result, 0, 12), "'Month Name'");

        // Case 3
        $lang = "ro";
        $this->file = new File($path, $translate, $lang);

        $result = $this->file->write($parse->getDays());
        $this->assertEquals(substr($result, 0, 14), "'Numele lunii'");
    }

    public function testWithoutLanguageSpecified()
    {
        $path = "log/doc.txt";
        $translate = require(dirname(__FILE__) . "/../../config/translate.php");
        $this->file = new File($path, $translate);

        $parse = new Parse(2017);

        $result = $this->file->write($parse->getDays());
        $this->assertEquals(substr($result, 0, 12), "'Month Name'");
    }

}
