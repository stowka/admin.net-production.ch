<?php
	/**
	 * Class team
	 * @author Arnaud Colin
	 * @copyright Net-Production
	 */

	class Team {
		private $id;
		private $name;
		private $biography;
		private $position;
		private $language;

		function __construct(){
			$this->id = 0;
			$this->name = "";
			$this->biography = "";
			$this->position = "";
			$this->language = "";
		}

		public static function initWithId($id) {
			$instance = new self();
			$instance->setId($id);
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare("SELECT * FROM team WHERE id = :id;");
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$stmt->closeCursor();
			$instance->setName($row['name']);
			$instance->setBiography($row['biography']);
			$instance->setPosition($row['position']);
			$instance->setLanguage(Language::initWithId($row['language']));
			return $instance;
		}

		public static function initWithData($name, $biography, $language) {
			$instance = new self();
			$instance->setName($name);
			$instance->setBiography($biography);
			$instance->setPosition($position);
			$instance->setLanguage($language);
			return $instance;
		}

		public function store() {
			if (!empty($this->name) && !empty($this->biography) 
				&& !empty($this->language) && !empty($this->position)) {
				$dbh = SPDO::getInstance();
				$stmt = $dbh->prepare("INSERT INTO team(name, biography, position, language)
					VALUES (:name, :biography, :position, :language);");
				$stmt->bindParam(":name", $this->name, PDO::PARAM_STR);
				$stmt->bindParam(":biography", $this->biography, PDO::PARAM_STR);
				$stmt->bindParam(":position", $this->position, PDO::PARAM_STR);
				$stmt->bindParam(":language", $this->language, PDO::PARAM_STR);
				$stmt->execute();
				$this->id = $dbh->lastInsertId();
				$stmt->closeCursor();
			}
			else
				echo "Error : Incorrect name, biography, position or language.";
		}

		public function delete() {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare("DELETE FROM team WHERE id = :id;");
			$stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
			$stmt->execute();
			$stmt->closeCursor();
		}

		public static function getAll($lang = "en_UK") {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare("SELECT id FROM team WHERE language = :lang;");
			$stmt->bindParam(":lang", $lang, PDO::PARAM_STR);
			$stmt->execute();
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$stmt->closeCursor();
			$teams = array();
			foreach ($rows as $row)
				$teams[] = Team::initWithId($row['id']);
			return $teams;
		}

		public static function deleteAll() {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare("DELETE FROM team;");
			$stmt->execute();
			$stmt->closeCursor();
		}

		/**
		 * Getters
		 */

		function getId() {
			return $this->id;
		}

		function getName() {
			return $this->name;
		}

		function getBiography() {
			return $this->biography;
		}

		function getPosition() {
			return $this->position;
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

		function setName($name) {
			$this->name = $name;
		}

		function setBiography($biography) {
			$this->biography = $biography;
		}

		function setPosition($position) {
			$this->position = $position;
		}

		function setLanguage($language) {
			$this->language = $language;
		}
	}