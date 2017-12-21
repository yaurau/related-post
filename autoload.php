<?php
spl_autoload_register(function ($class) {
    if (file_exists(__DIR__ . '/includes/' . $class . '.php')) {
        require_once __DIR__ . '/includes/' . $class . '.php';
    }
    elseif (file_exists(__DIR__ . '/public/' . $class . '.php')) {
        require_once __DIR__ . '/public/' . $class . '.php';
    }
    elseif (file_exists(__DIR__ . '/public/function.php')) {
        require_once __DIR__ . '/public/function.php';
    }
});
   /* elseif (file_exists( __DIR__ .'/models/' . $class . '.php')) {
        require __DIR__ . '/models/' . $class. '.php';
    }
    else {
        $classParts = explode('\\', $class);
        $classParts [0] = __DIR__;
        $path = implode(DIRECTORY_SEPARATOR, $classParts) . '.php';
        if (file_exists($path)) {
            require $path;
        }

    }
});
   require_once plugin_dir_path( __FILE__ ) . 'includes/Yaurau_Random_Quote_Activator.php';
   */