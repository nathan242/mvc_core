<?php
    spl_autoload_register(function ($class) {
        include CLASSES_DIR.'/class.'.$class.'.php';
    });
?>
