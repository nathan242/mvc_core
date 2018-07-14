<?php
    require_once dirname(dirname(__FILE__)).'/core/core.php';

    $mvc_core->route('/hello', 'GET', function () { echo "Hello World!"; });
    $mvc_core->route('/view', 'GET', array('Core::View', 'hello_view'));
    $mvc_core->route('/controller', '*', array('Core::Controller', 'hello_controller'));
    $mvc_core->route('/model', 'GET', array('Core::Controller', 'model_test'));

    $mvc_core->error(404, function () { echo "<p>404</p><p><pre>METHOD: ".URL_METHOD."\nPATH: ".URL_PATH."\n</pre></p>"; });

    $mvc_core->process();
?>
