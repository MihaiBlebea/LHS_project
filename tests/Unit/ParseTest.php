<?php

namespace Test\Unit;

use PHPUnit\Framework\TestCase as TestCase;
use App\Parse;

class ParseTest extends TestCase
{
    protected $parse;

    public function setUp()
    {
        $year = "2017";
        $this->parse = new Parse($year);
    }

    public function testPropertiesAreSet()
    {
        $this->assertEquals($this->parse->getYear(), "2017");
        $this->assertTrue(gettype($this->parse->getDays()) == "array", "Days variables is an array of data");
    }

    public function testLastDayOfMonth()
    {
        $method = new \ReflectionMethod('App\Parse', 'lastDayOfMonth');
        $method->setAccessible(true);

        //Case 1
        $case_one = $method->invokeArgs(new Parse(2017), array(1));
        $this->assertEquals($case_one, 31);

        //Case 2
        $case_two = $method->invokeArgs(new Parse(2015), array(2));
        $this->assertEquals($case_two, 28);

        //Case3
        $case_three = $method->invokeArgs(new Parse(1988), array(5));
        $this->assertEquals($case_three, 31);
    }

    public function testComposeMonthYear()
    {
        $method = new \ReflectionMethod('App\Parse', 'composeMonthYear');
        $method->setAccessible(true);

        //Case 1
        $case_one = $method->invokeArgs(new Parse(2017), array(01, 2017));
        $this->assertEquals($case_one, "2017-01");

        //Case 2
        $case_two = $method->invokeArgs(new Parse(1855), array(07, 1855));
        $this->assertEquals($case_two, "1855-07");

        //Case3
        $case_three = $method->invokeArgs(new Parse(1989), array(11, 1989));
        $this->assertEquals($case_three, "1989-11");
    }

    public function testComposeDay()
    {
        $method = new \ReflectionMethod('App\Parse', 'composeDay');
        $method->setAccessible(true);

        //Case 1
        $case_one = $method->invokeArgs(new Parse(2017), array(1));
        $this->assertEquals($case_one, "01");

        //Case 2
        $case_two = $method->invokeArgs(new Parse(2017), array(22));
        $this->assertEquals($case_two, "22");
    }

    public function testGetDayOfWeek()
    {
        $method = new \ReflectionMethod('App\Parse', 'getDayOfWeek');
        $method->setAccessible(true);

        //Case 1
        $case_one = $method->invokeArgs(new Parse(2017), array(1988, 07, 11));
        $this->assertEquals($case_one, 1);

        //Case 2
        $case_two = $method->invokeArgs(new Parse(2017), array(1998, 11, 25));
        $this->assertEquals($case_two, 3);
    }

    public function testCalculateLastFriday()
    {
        $method = new \ReflectionMethod('App\Parse', 'calculateLastFriday');
        $method->setAccessible(true);

        //Case 1
        $case_one = $method->invokeArgs(new Parse(2015), array(2015, 07, 11));
        $this->assertEquals($case_one, 10);

        //Case 2
        $case_two = $method->invokeArgs(new Parse(2012), array(2012, 11, 25));
        $this->assertEquals($case_two, 23);
    }

    public function testCalculateNextMonday()
    {
        $method = new \ReflectionMethod('App\Parse', 'calculateNextMonday');
        $method->setAccessible(true);

        //Case 1
        $case_one = $method->invokeArgs(new Parse(2017), array(2017, 11, 4));
        $this->assertEquals($case_one, 6);

        //Case 2
        $case_two = $method->invokeArgs(new Parse(2017), array(2017, 9, 2));
        $this->assertEquals($case_two, 4);
    }
}
