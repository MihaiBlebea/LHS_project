<?php

namespace Test\Unit;

use PHPUnit\Framework\TestCase as TestCase;
use App\Validate;

class ValidateTest extends TestCase
{
    protected $validate;

    public function setUp()
    {
        $argv = [
            0 => "payment",
            1 => "2017",
            2 => "en"
        ];
        $argc = 3;

        $this->validate = new Validate($argv, $argc);
    }

    public function testValidateIsObject()
    {
        $this->assertTrue(gettype($this->validate) == 'object', true);
    }

    public function testReturnsTrue()
    {
        $this->assertTrue($this->validate == true, true);
    }

    public function testArgumentsCount()
    {
        $argv = [
            0 => "payment",
        ];
        $argc = 1;

        $validate = new Validate($argv, $argc);

        $this->assertFalse($validate->getValid(), "Console should receive more then 2 arguments");
        $this->assertEquals($validate->getError()[0], "Too few arguments inserted");
    }

    public function testArgumentPayment()
    {
        $argv = [
            0 => "salary",
            1 => "2017",
            2 => "en"
        ];
        $argc = 3;

        $validate = new Validate($argv, $argc);

        $this->assertFalse($validate->getValid(), "First argument should be 'payment'");
        $this->assertEquals($validate->getError()[0], "First argument must be the file name: payment");
    }

    public function testArgumentYearLenght()
    {
        $argv = [
            0 => "payment",
            1 => "201",
            2 => "en"
        ];
        $argc = 3;

        $validate = new Validate($argv, $argc);

        $this->assertFalse($validate->getValid(), "Year should be 4 chars long'");
        $this->assertEquals($validate->getError()[0], "Year must be composed of 4 characters");
    }

    public function testArgumentYearIsNumber()
    {
        $argv = [
            0 => "payment",
            1 => "some",
            2 => "en"
        ];
        $argc = 3;

        $validate = new Validate($argv, $argc);

        $this->assertFalse($validate->getValid(), "Year should be number'");
        $this->assertEquals($validate->getError()[0], "The year must be a number");
    }

    public function testArgumentLangIsOptional()
    {
        $argv = [
            0 => "payment",
            1 => "1997"
        ];
        $argc = 2;

        $validate = new Validate($argv, $argc);

        $this->assertTrue($validate->getValid(), "Language is optional'");
    }

    public function testArgumentLangTwoCharacters()
    {
        $argv = [
            0 => "payment",
            1 => "1997",
            2 => "english"
        ];
        $argc = 2;

        $validate = new Validate($argv, $argc);

        $this->assertFalse($validate->getValid(), "Language should be no more then 2 letters long'");
        $this->assertEquals($validate->getError()[0], "The language param should be just 2 characters long");
    }

    public function testArgumentLangIsInArray()
    {
        $argv = [
            0 => "payment",
            1 => "2017",
            2 => "fr"
        ];
        $argc = 2;

        $validate = new Validate($argv, $argc);

        $this->assertFalse($validate->getValid(), "Language should be en, ro, es'");
        $this->assertEquals($validate->getError()[0], "The language selected is not supported by this application");
    }
}
