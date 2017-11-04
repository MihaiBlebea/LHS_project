<?php

namespace App;

class Validate
{
    public $valid = true;

    private $message = [];

    public function __construct(array $argv, $argc)
    {
        // Check if at least 2 arguments are supplied
        if($argc < 2)
        {
            $this->valid = false;
            array_push($this->message, "Too few arguments inserted");
        } else {
            // Check if the first argument is payment
            if($argv[0] !== 'payment')
            {
                $this->valid = false;
                array_push($this->message, "First argument must be the file name: payment");
            }

            // Check if the second argument has at least 4 characters (year)
            if(strlen($argv[1]) !== 4)
            {
                $this->valid = false;
                array_push($this->message, "Year must be composed of 4 characters");
            }

            // Check if the second argument is a number (year)
            if(ctype_digit($argv[1]) == false)
            {
                $this->valid = false;
                array_push($this->message, "The year must be a number");
            }

            // Check if the third argument is set or not (lang)
            if(isset($argv[2]))
            {
                if(strlen($argv[2]) !== 2)
                {
                    $this->valid = false;
                    array_push($this->message, "The language param should be just 2 characters long");
                }

                if(in_array($argv[2], ["en", "es", "ro"]) == false)
                {
                    $this->valid = false;
                    array_push($this->message, "The language selected is not supported by this application");
                }
            }
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
