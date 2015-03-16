<?php
	/**
	 * Class SPDO (Singleton PDO)
	 *
	 * @author Antoine De Gieter
	 * @description
	 *		Singleton pattern implemented into PDO
	 *
	 */

	class SPDO {
		private $_PDOInstance = null;
		const DEFAULT_SQL_HOST = ''; # TO BE SET
		const DEFAULT_SQL_USER = ''; # TO BE SET
		const DEFAULT_SQL_PASSWORD = ''; # TO BE SET
		const DEFAULT_SQL_DATABASE = ''; # TO BE SET

		private static $_instance = null;

		private function __construct() {
			$this->_PDOInstance = new PDO(
				'mysql:dbname='.self::DEFAULT_SQL_DATABASE.
				';host='.self::DEFAULT_SQL_HOST,
				self::DEFAULT_SQL_USER,
				self::DEFAULT_SQL_PASSWORD);
		}

		public static function getInstance() {
			if (is_null(self::$_instance))
				self::$_instance = new SPDO();
			return self::$_instance;
		}

		public function query($query) {
			return $this->_PDOInstance->query($query);
		}

		public function exec($query) {
			return $this->_PDOInstance->exec($query);
		}

		public function prepare($query) {
			return $this->_PDOInstance->prepare($query);
		}

		public function lastInsertId() {
			return $this->_PDOInstance->lastInsertId();
		}
	}
