<?php
    class model_test extends BaseController {
        public function def() {

        }

        public function get() {
            global $db;
            $model = Core::Model('mvc_test', array('db'=>&$db));

            $data = $model->select(['id', 'name'])->where(['age > 10'])->execute();

            Core::View('test_view', $data);
        }
    }
?>
