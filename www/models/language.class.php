<?php
	/**
	 * Class language
	 * @author Arnaud Colin
	 * @copyright Net-Production
	 */

	class Language {
		private $id;
		private $label;

		$dbh = SPDO::getInstance();

		function __construct(){
			$this->id = "";
			$this->label = "";
		}

		public static function initWithId($id) {
			$instance = new self();
			$instance->setId($id);
			$stmt = $dbh->prepare("SELECT * FROM language WHERE id = :id;");
			$stmt->bindParam(":id", $id, PDO::PARAM_STR);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$stmt->closeCursor();
			$instance->setLabel($row['label']);
			return $instance;
		}

		public static function initWithData($label) {
			$instance = new self();
			$this->setLabel($label);
			return $instance;
		}

		public function store() {
			if (!empty($this->label)) {
				$stmt = $dbh->prepare("INSERT INTO language 
										VALUES (null, :label);");
				$stmt->bindParam(":label", $this->label, PDO::PARAM_STR);
				$stmt->execute();
				$this->id = $dbh->lastInsertId();
				$stmt->closeCursor();
			}
			else
				echo "Error : Incorrect label.";
		}

		public function delete() {
			$stmt = $dbh->prepare("DELETE FROM language WHERE id = :id;");
			$stmt->bindParam(":id", $this->id, PDO::PARAM_STR);
			$stmt->execute();
			$stmt->closeCursor();
		}

		public static function getAll() {
			$stmt = $dbh->prepare("SELECT id FROM language;");
			$stmt->execute();
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$stmt->closeCursor();
			$languages = array();
			foreach ($rows as $row) {
				$languages[] = initWithId($row);
			}
			return $languages;
		}

		public static function deleteAll() {
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

		public setId($id) {
			$this->id = $id;
		}

		public setLabel($label) {
			$this->label = $label;
		}
	}