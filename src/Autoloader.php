<?php

// autoload from config
spl_autoload_register(static function ($class) {
    $config = include APPLICATION_PATH . '/config/autoloader.php';
    if (array_key_exists($class, $config) && file_exists($config[$class])) {
        require $config[$class];
        return true;
    }

    return false;
});

// autoload from directory
$path      = APPLICATION_PATH . '/src/Controller/';
$dir       = dir($path);
$blacklist = ['.', '..'];
$files     = [];

while (false !== ($entry = $dir->read())) {
    if (!in_array($entry, $blacklist, true)) {
        $files[] = $path . $entry;
    }
}

sort($files, SORT_STRING);
foreach ($files as $file) {
    require $file;
}