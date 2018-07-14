<?php
    abstract class DBTableModel implements Model {
        protected $db;
        protected $table;
        protected $sql = '';

        public function __construct($params) {
            $this->db = $params['db'];
            $this->table = $this->get_table();
        }

        abstract public function get_table();

        public function query($query) {
            return $this->db->query($query);
        }

        public function select($fields = array()) {
            if (count($fields) == 0) {
                $this->sql = 'SELECT * FROM `'.$this->table.'`';
            } else {
                $this->sql = 'SELECT `'.implode('`,`', $fields).'` FROM `'.$this->table.'`';
            }
            return $this;
        }

        public function where($conditions = array()) {
            $this->sql .= ' WHERE';
            $and = false;
            foreach ($conditions as $c) {
                $this->sql .= ' ';
                if ($and === true) { $this->sql .= 'AND '; }
                $this->sql .= $c;
                $and = true;
            }
            return $this;
        }

        public function execute() {
            $this->db->query($this->sql);
            $this->sql = '';
            return $this->db->result;
        }
    }
?>
