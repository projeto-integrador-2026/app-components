<?php

spl_autoload_register(function($class){

    $prefix = 'app\\';

   // Verifica se a classe usa o namespace base
    if (strncmp($prefix, $class, strlen($prefix)) !== 0) {
        return;
    }

    // Remove prefixo do namespace
    $relativeClass = substr($class, strlen($prefix));

    // Converte \ para /
    $file = __DIR__ . '/../' . str_replace('\\', '/', $relativeClass) . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
});
