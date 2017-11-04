<?php

namespace App;

class Validate
{
    public $valid = true;

    private $message = [];

    public function __construct(array $argv, $argc)
    {
        if($argc < 2)
        {
            $this->valid = false;
            array_push($this->message, "Too few arguments inserted");
        }

        if($argv[0] !== 'payment')
        {
            $this->valid = false;
            array_push($this->message, "First argument must be the file name: payment");
        }

        if(strlen($argv[1]) !== 4)
        {
            $this->valid = false;
            array_push($this->message, "Year must be composed of 4 characters");
        }

        if(ctype_digit($argv[1]) == false)
        {
            $this->valid = false;
            array_push($this->message, "The year must be a number");
        }

        return $this->valid;
    }

    public function getValid()
    {
        return $this->valid;
    }

    public function getError()
    {
        return $this->message;
    }
}
