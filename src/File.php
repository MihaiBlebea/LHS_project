<?php

namespace App;

class File
{
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function write($message)
    {
        $stringMessage = $this->stringify($message);

        $file = fopen($this->path, "w");
        fwrite($file, $stringMessage);
        fclose($file);
    }

    private function stringify(array $messages)
    {
        $result = "'Month Name','1st expenses day', '2nd expenses day', 'Salary day' /n";
        foreach($messages as $index => $message)
        {
            $result .= $message[]
        }
    }
}
