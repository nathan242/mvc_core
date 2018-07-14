<?php
    class hello_controller extends BaseController {
        public function def() {
            $this->get();
        }

        public function get() {
            echo 'Hello world from a controller.';
        }
    }
?>
