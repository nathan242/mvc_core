<?php
    interface Model {
        public function upgrade();
        public function downgrade();
    }
?>
