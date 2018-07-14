<?php
    class ViewController implements View {
        public static function show($view, $data = array()) {
            require VIEWS_DIR.'/'.$view;
        }
    }
?>
