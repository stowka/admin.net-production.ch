<?php
	/**
	 * Class language
	 * @author Arnaud Colin
	 * @copyright Net-Production
	 */

	class Language {
		private $id;
		private $label;

		function __construct(){
			$this->id = "";
			$this->label = "";
		}

		public static function initWithId($id) {
			$instance = new self();
			$instance->setId($id);
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare("SELECT * FROM language WHERE id = :id;");
			$stmt->bindParam(":id", $id, PDO::PARAM_STR);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$stmt->closeCursor();
			$instance->setLabel($row['label']);
			return $instance;
		}

		public static function initWithData($id, $label) {
            $instance = new self();
            $instance->setId($id);
			$instance->setLabel($label);
			return $instance;
		}

		public function store() {
			if (!empty($this->label)) {
				$dbh = SPDO::getInstance();
				$stmt = $dbh->prepare("INSERT INTO language 
                                        VALUES (:id, :label);");
                $stmt->bindParam(":id", $this->id, PDO::PARAM_STR);
				$stmt->bindParam(":label", $this->label, PDO::PARAM_STR);
				$stmt->execute();
				$this->id = $dbh->lastInsertId();
				$stmt->closeCursor();
			}
			else
				echo "Error : Incorrect label.";
		}

		public function delete() {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare("DELETE FROM language WHERE id = :id;");
			$stmt->bindParam(":id", $this->id, PDO::PARAM_STR);
			$stmt->execute();
			$stmt->closeCursor();
		}

		public static function getAll() {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare("SELECT id FROM language;");
			$stmt->execute();
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$stmt->closeCursor();
			$languages = array();
			foreach ($rows as $row) {
				$languages[] = Language::initWithId($row['id']);
			}
			return $languages;
		}

		public static function deleteAll() {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare("DELETE FROM language;");
			$stmt->execute();
			$stmt->closeCursor();
		}

		/**
		 * Getters
		 */

		public function getId() {
			return $this->id;
		}

		public function getLabel() {
			return $this->label;
		}

		/**
		 * Setters
		 */

		public function setId($id) {
			$this->id = $id;
		}

		public function setLabel($label) {
			$this->label = $label;
		}
	}
