<?php
    class mvc_test extends DBTableModel {
        public function get_table() {
            return 'mvc_test';
        }

        public function upgrade() {
            $this->db->query('CREATE TABLE `mvc_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1');
        }

        public function downgrade() {
            $this->db->query('DROP TABLE `mvc_test`');
        }

        

    }
?>
