<?php

// Die and dump function
function dd($args)
{
    echo '<pre>'; echo json_encode($args, JSON_PRETTY_PRINT); echo '</pre>';
    die();
}

function consoleLog($message = null, $args = null)
{
    echo ($message == null) ? "" : $message . "\n";
    echo ($args == null) ? "" : json_encode($args, JSON_PRETTY_PRINT);
    die();
}

function tt()
{
    echo "This is just a test";
    die();
}

// Get the real path function, $path is the string to add to the app_path in config
function real_path($path = null)
{

}
