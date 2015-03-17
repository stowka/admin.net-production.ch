<?php

	/**
	 * @author Arnaud Colin
	 * @copyright Net-Production
	 */

	class Reason {
		private $id;
		private $label;
		private $language;

		function __construct(){
			$this->id = 0;
			$this->label = "";
			$this->language = "";
		}

		public static function initWithId($id) {
			$instance = new self();
			$instance->setId($id);
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare("SELECT * FROM reason WHERE id == :id;");
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$stmt->closeCursor();
			$instance->setLabel($row['label']);
			$instance->setLanguage(Language::initWithId($row['language']));
			return $instance;
		}

		public static function initWithData($label, $language) {
			$instance = new self();
			$instance->setLabel($label);
			$instance->setLanguage($language);
			return $instance;
		}

		public function store() {
			if (!empty($this->label) && !empty($this->language)) {
				$dbh = SPDO::getInstance();
				$stmt = $dbh->prepare("INSERT INTO reason(label, language)
					VALUES (:label, :language);");
				$stmt->bindParam(":label", $this->label, PDO::PARAM_STR);
				$stmt->bindParam(":language", $this->language, PDO::PARAM_STR);
				$stmt->execute();
				$this->id = $dbh->lastInsertId();
				$stmt->closeCursor();
			}
			else
				echo "Error : Incorrect label or language.";
		}

		public function delete() {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare("DELETE FROM reason WHERE id = :id;");
			$stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
			$stmt->execute();
			$stmt->closeCursor();
		}

		public static function getAll() {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare("SELECT id FROM reason;");
			$stmt->execute();
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$stmt->closeCursor();
			$reasons = array();
			foreach ($rows as $row)
				$reasons[] = Reason::initWithId($row['id']);
			return $reasons;
		}

		public static function deleteAll() {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare("DELETE FROM reason;");
			$stmt->execute();
			$stmt->closeCursor();
		}

		/**
		 * Getters
		 */

		function getId() {
			return $this->id;
		}

		function getLabel() {
			return $this->label;
		}

		function getLanguage() {
			return $this->language;
		}

		/**
		 * Setters
		 */

		function setId($id) {
			$this->id = $id;
		}

		function setLabel($label) {
			$this->label = $label;
		}

		function setLanguage($language) {
			$this->language = $language;
		}
	}
?>