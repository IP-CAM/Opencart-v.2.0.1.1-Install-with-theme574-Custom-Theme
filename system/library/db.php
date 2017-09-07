<?php
class DB {
	private $db;

	public function __construct($driver, $hostname, $username, $password, $database) {
		$class = 'DB\\' . $driver;

		if (class_exists($class)) {
			$this->db = new $class($hostname, $username, $password, $database);
		} else {
			exit('Error: Could not load database driver ' . $driver . '!');
		}
	}
	
	public function checkTable($table, $column) {
					//check if column exists.  If not, then make it exist.
					$sql = "DESC " . DB_PREFIX . "{$table} {$column}";
					$query = $this->query($sql);
					if (!$query->num_rows) {
						$sql = "ALTER TABLE " . DB_PREFIX . "{$table} ADD {$column} VARCHAR(255) NOT NULL DEFAULT ''";
						$this->query($sql);
					}
				}

	public function query($sql) {
		return $this->db->query($sql);
	}

	public function escape($value) {
		return $this->db->escape($value);
	}

	public function countAffected() {
		return $this->db->countAffected();
	}

	public function getLastId() {
		return $this->db->getLastId();
	}
}
