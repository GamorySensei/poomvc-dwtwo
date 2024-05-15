<?php
spl_autoload_register(function ($class_name) {
    $class_name = str_replace([
        'App\\',
        '\\',
    ], [
        '',
        '/'
    ], $class_name);
    require BASE_URL . $class_name . '.php';
});
