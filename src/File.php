<?php

namespace App;

class File
{
    private $path;

    private $translate;

    private $lang = null;

    public function __construct($path, array $translate, string $lang = null)
    {
        $this->path = $path;
        $this->translate = $translate;
        $this->lang = $lang;
    }

    public function write($message)
    {
        $stringMessage = $this->stringify($message);

        $file = fopen($this->path, "w");
        fwrite($file, $stringMessage);
        fclose($file);

        return $stringMessage;
    }

    private function stringify(array $messages)
    {
        if($this->lang == null)
        {
            $transArray = $this->translate["en"];
        } else {
            $transArray = $this->translate[$this->lang];
        }

        $result = "'" . $transArray["utils"]["month_name"] . "', '" .
                  $transArray["utils"]["first_pay"] . "', '" .
                  $transArray["utils"]["second_pay"] . "', '" .
                  $transArray["utils"]["salary"] . "' \n";

        foreach($messages as $index => $message)
        {
            $result .= "'" . $transArray["months"][$message["month"]] . "', " .
                       $message["first_pay"] . ", " .
                       $message["second_pay"] . ", " .
                       $message["salary_day"] . "\n";
        }

        return $result;
    }
}
