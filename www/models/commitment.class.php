<?php 
	/**
	 * Class commitment
	 * @author Arnaud Colin
	 * @copyright Net-Production
	 */

	class Commitment {
		private $id;
		private $title;
		private $description;
		private $language;

		function __construct(){
			$this->id = 0;
			$this->title = "";
			$this->description = "";
			$this->language = "";
		}

		public static function initWithId($id) {
			$instance = new self();
			$instance->setId($id);
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare("SELECT * FROM commitment WHERE id = :id;");
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$stmt->closeCursor();
			$instance->setTitle($row['title']);
			$instance->setDescription($row['description']);
			$instance->setLanguage(Language::initWithId($row['language']));
			return $instance;
		}

		public static function initWithData($title, $description, $language) {
			$instance = new self();
			$instance->setTitle($title);
			$instance->setDescription($description);
			$instance->setLanguage($language);
			return $instance;
		}

		public function store() {
			if (!empty($this->title) && !empty($this->description) 
				&& !empty($this->language)) {
				$dbh = SPDO::getInstance();
				$stmt = $dbh->prepare("INSERT INTO commitment(title, description, language)
					VALUES (:title, :description, :language);");
				$stmt->bindParam(":title", $this->title, PDO::PARAM_STR);
				$stmt->bindParam(":description", $this->description, PDO::PARAM_STR);
				$stmt->bindParam(":language", $this->language, PDO::PARAM_STR);
				$stmt->execute();
				$this->id = $dbh->lastInsertId();
				$stmt->closeCursor();
			}
			else
				echo "Error : Incorrect title, description or language.";
		}

		public function delete() {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare("DELETE FROM commitment WHERE id = :id;");
			$stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
			$stmt->execute();
			$stmt->closeCursor();
		}

		public static function getAll($lang = "en_UK") {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare("SELECT id FROM commitment WHERE language = :lang;");
			$stmt->bindParam(":lang", $lang, PDO::PARAM_STR);
			$stmt->execute();
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$stmt->closeCursor();
			$commitments = array();
			foreach ($rows as $row)
				$commitments[] = Commitment::initWithId($row['id']);
			return $commitments;
		}

		public static function deleteAll() {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare("DELETE FROM commitment;");
			$stmt->execute();
			$stmt->closeCursor();
		}

		/**
		 * Getters
		 */

		function getId() {
			return $this->id;
		}

		public function getTitle() {
			return $this->title;
		}

		function getDescription() {
			return $this->description;
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

		function setTitle($title) {
			$this->title = $title;
		}

		function setDescription($description) {
			$this->description = $description;
		}

		function setLanguage($language) {
			$this->language = $language;
		}
	}
?>