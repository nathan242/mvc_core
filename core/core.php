<?php
    // Set constants
    define('ROOT_DIR', dirname(dirname(__FILE__)));
    define('CORE_DIR', ROOT_DIR.'/core');
    define('INTERFACE_DIR', CORE_DIR.'/interfaces');
    define('ABSTRACT_DIR', CORE_DIR.'/abstract');
    define('VIEWCON_DIR', CORE_DIR.'/viewcontrollers');
    define('CONFIG_DIR', ROOT_DIR.'/config');
    define('MODULES_DIR', ROOT_DIR.'/modules');
    define('CLASSES_DIR', ROOT_DIR.'/classes');
    define('MODELS_DIR', ROOT_DIR.'/models');
    define('VIEWS_DIR', ROOT_DIR.'/views');
    define('CONTROLLERS_DIR', ROOT_DIR.'/controllers');
    define('WWW_DIR', ROOT_DIR.'/www');

    define('URL_PATH', $_SERVER['REQUEST_URI']);
    define('URL_METHOD', $_SERVER['REQUEST_METHOD']);

    // Load config
    $config = array();
    foreach (scandir(CONFIG_DIR) as $module) {
        if ($module != '.' && $module != '..') {
            include_once CONFIG_DIR.'/'.$module;
        }
    }
    unset($module);

    // Load modules
    foreach (scandir(MODULES_DIR) as $module) {
        if ($module != '.' && $module != '..' && preg_match('/^[0-9]/', $module)) {
            include_once MODULES_DIR.'/'.$module;
        }
    }
    unset($module);

    // Core interfaces
    foreach (scandir(INTERFACE_DIR) as $module) {
        if ($module != '.' && $module != '..') {
            include_once INTERFACE_DIR.'/'.$module;
        }
    }
    unset($module);

    // Core classes
    foreach (scandir(ABSTRACT_DIR) as $module) {
        if ($module != '.' && $module != '..') {
            include_once ABSTRACT_DIR.'/'.$module;
        }
    }
    unset($module);

    // View classes
    foreach (scandir(VIEWCON_DIR) as $module) {
        if ($module != '.' && $module != '..') {
            include_once VIEWCON_DIR.'/'.$module;
        }
    }
    unset($module);

    // MVC class
    require_once CORE_DIR.'/class.Core.php';

    $mvc_core = new Core();
?>
