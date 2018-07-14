<?php
    class Core {
        public $routes = array();
        public $errors = array();

        public function route($path, $method, $action) {
            if (!isset($this->routes[$method])) { $this->routes[$method] = array(); }
            $this->routes[$method][$path] = $action;
        }

        public function error($code, $action) {
            $this->errors[$code] = $action;
        }

        public function run_action($action) {
            $func = '';
            $params = array();
            if (is_array($action)) {
                $func = $action[0];
                unset($action[0]);
                $params = $action;
            } else {
                $func = $action;
            }
            return call_user_func_array($func, $params);
        }

        public function process() {
            if (isset($this->routes[URL_METHOD][URL_PATH])) {
                echo $this->run_action($this->routes[URL_METHOD][URL_PATH]);
            } elseif (isset($this->routes['*'][URL_PATH])) {
                echo $this->run_action($this->routes['*'][URL_PATH]);
            } else {
                // No route
                $this->http_error(404);
            }
        }

        public function http_error($code) {
            $msg = array(
                404 => 'Page not found.'
            );

            header("HTTP/1.1 ".(string)$code);
            if (isset($this->errors[$code])) {
                echo $this->run_action($this->errors[$code]);
            } else {
                if (isset($msg[$code])) {
                    echo $msg[$code];
                }
            }
        }

        public static function model($model, $params = array()) {
            require_once MODELS_DIR.'/'.$model.'.php';
            return new $model($params);
        }

        public static function view($view, $data = false, $class = false, $inst = false) {
            if (!$class) { $class = 'ViewController'; }
            if ($inst) {
                return new $class($view, $data);
            } else {
                return $class::show($view, $data);
            }
        }

        public static function controller($controller) {
            require_once CONTROLLERS_DIR.'/'.$controller.'.php';
            $c = new $controller();
            if (method_exists($c, URL_METHOD)) {
                return $c->{URL_METHOD}();
            } else {
                return $c->def();
            }
        }
    }
?>
