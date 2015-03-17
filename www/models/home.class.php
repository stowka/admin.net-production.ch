<?php 
    /** 
     * Class project
     * @author Fran&ccedil;ois-Xavier B&eacute;ligat
     * @copyright Net-Production
     */

    class Home {
        private $id;
        private $text;
        private $language;

        public function __construct() {
            $this->id = 0;
            $this->text = "";
            $this->language = "";
        }

        public static function initWithId($id) {
            $instance = new self();
            $instance->setId($id);
            $dbh = SPDO::getInstance();
            $stmt = $dbh->prepare("SELECT * FROM home WHERE id = :id;");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            $instance->setText($row['text']);
            $instance->setLanguage($row['language']);
            return $instance;
        }

        public static function initWithData($text, $language) {
            $instance = new self();
            $instance->setText($text);
            $instance->setLanguage($language);
            return $instance;
        }

        public function store() {
            if (!empty($this->text) && !empty($this->language)) {
                $dbh = SPDO::getInstance();
                $stmt = $dbh->prepare("INSERT INTO home(text, language)
                    VALUES(:text, :language);");
                $stmt->bindParam(":text", $this->text, PDO::PARAM_STR);
                $stmt->bindParam(":language", $this->language, PDO::PARAM_STR);
                $stmt->execute();
                $this->id = $dbh->lastInsertId();
                $stmt->closeCursor();
            } else
                echo "Error : check fields text or language.";
        }

        public function delete() {
            $dbh = SPDO::getInstance();
            $stmt = $dbh->prepare("DELETE FROM home WHERE id = :id;");
            $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
            $stmt->execute();
            $stmt->closeCursor();
        }

        public static function getAll() {
            $dbh = SPDO::getInstance();
            $stmt = $dbh->prepare("SELECT id FROM home;");
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            $homes = Array();
            foreach ($rows as $row)
                $homes[] = Project::initWithId($row['id']);
            return $homes;
        }

        public static function deleteAll() {
            $dbh = SPDO::getInstance();
            $stmt = $dbh->prepare("DELETE FROM home;");
            $stmt->execute();
            $stmt->closeCursor();
        }


        /*
         * Getters
         */

        public function getId() {
            return $this->id;
        }

        public function getText() {
            return $this->text;
        }

        public function getLanguage() {
            return $this->language;
        }

        /*
         * Setters
         */

        public function setId($id) {
            $this->id = $id;
        }
        
        public function setText($text) {
            $this->text = $text;
        }

        public function setLanguage($language) {
            $this->language = $language;
        }

    }
