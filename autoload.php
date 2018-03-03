<?php
spl_autoload_register(function ($class) {
    if (file_exists(__DIR__ . '/includes/' . $class . '.php')) {
        require_once __DIR__ . '/includes/' . $class . '.php';
    }
    elseif (file_exists(__DIR__ . '/public/' . $class . '.php')) {
        require_once __DIR__ . '/public/' . $class . '.php';
    }
});
if (file_exists(__DIR__ . '/includes/function.php')) {
    require_once __DIR__ . '/includes/function.php';
}
