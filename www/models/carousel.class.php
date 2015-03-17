<?php
	/**
	 * @author Arnaud Colin
	 * @copyright Net-Production
	 */

	class Carousel {
			private $id;
			private $image;
			private $text;
			private $language;

		function __construct() {
			$this->id = 0;
			$this->image = "";
			$this->text = "";
			$this->language = "";
		}

		public static function initWithId($id) {
				$instance = new self();
				$instance->setId($id);
				$dbh = SPDO::getInstance();
				$stmt = $dbh->prepare("SELECT * FROM carousel WHERE id == :id;");
				$stmt->bindParam(":id", $id, PDO::PARAM_INT);
				$stmt->execute();
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				$stmt->closeCursor();
				$instance->setImage($row['image']);
				$instance->setText($row['text']);
				$instance->setLanguage(Language::initWithId($row['language']));
				return $instance;
		}	

		public static function initWithData($image, $text, $language) {
				$instance = new self();
				$instance->setImage($image);
				$instance->setText($text);
				$instance->setLanguage($language);
				return $instance;
		}

		public function store() {
			if (!empty($this->image) && !empty($this->text) && !empty($this->language)) {
				$dbh = SPDO::getInstance();
				$stmt = $dbh->prepare("INSERT INTO carousel(image, text, language)
					VALUES (:image, :text, :language);");
				$stmt->bindParam(":image", $this->image, PDO::PARAM_STR);
				$stmt->bindParam(":text", $this->text, PDO::PARAM_STR);
				$stmt->bindParam(":language", $this->language, PDO::PARAM_STR);
				$stmt->execute();
				$this->id = $dbh->lastInsertId();
				$stmt->closeCursor();
			}
			else
				echo "Error : Incorrect image, text or language.";
		}

		public function delete() {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare("DELETE FROM carousel WHERE id = :id;");
			$stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
			$stmt->execute();
			$stmt->closeCursor();
		}

		public static function getAll() {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare("SELECT id FROM carousel;");
			$stmt->execute();
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$stmt->closeCursor();
			$carousels = array();
			foreach ($rows as $row)
				$carousels[] = Carousel::initWithId($row['id']);
			return $carousels;
		}

		public static function deleteAll() {
			$dbh = SPDO::getInstance();
			$stmt = $dbh->prepare("DELETE FROM carousel;");
			$stmt->execute();
			$stmt->closeCursor();
		}


		/**
		 * Getters
		 */

		function getId() {
			return $this->id;
		}

		function getImage() {
			return $this->image;
		}

		function getText() {
			return $this->text;
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

		function setImage($image) {
			$this->image = $image;
		}

		function setText($text) {
			$this->text = $text;
		}

		function setLanguage($language) {
			$this->language = $language;
		}
	}
?>