<?php 
    /** 
     * Class project
     * @author Fran&ccedil;ois-Xavier B&eacute;ligat
     * @copyright Net-Production
     */

    class Vocabulary {
        private $id;
        private $keyword;
        private $value;
        private $language;

        public function __construct() {
            $this->id = 0;
            $this->keyword = "";
            $this->value = "";
            $this->language = "";
        }

        public static function initWithId($id) {
            $instance = new self();
            $instance->setId($id);
            $dbh = SPDO::getInstance();
            $stmt = $dbh->prepare("SELECT * FROM vocabulary WHERE id = :id;");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            $instance->setKeyword($row['keyword']);
            $instance->setValue($row['value']);
            $instance->setLanguage($row['language']);
            return $instance;
        }

        public static function initWithData($keyword, $value, $language) {
            $instance = new self();
            $instance->setKeyword($keyword);
            $instance->setValue($value);
            $instance->setLanguage($language);
            return $instance;
        }

        public function store() {
            if (!empty($this->keyword) && !empty($this->value) &&
                !empty($this->language)) {
                
                $dbh = SPDO::getInstance();
                $stmt = $dbh->prepare("INSERT INTO vocabulary(keyword, value,
                    language) VALUES(:keyword, :value, :language);");
                $stmt->bindParam(":keyword", $this->keyword, PDO::PARAM_STR);
                $stmt->bindParam(":value", $this->value, PDO::PARAM_STR);
                $stmt->bindParam(":language", $this->language, PDO::PARAM_STR);
                $stmt->execute();
                $this->id = $dbh->lastInsertId();
                $stmt->closeCursor();
            } else
                echo "Error : check fields keyword or value  or language.";
        }

        public function delete() {
            $dbh = SPDO::getInstance();
            $stmt = $dbh->prepare("DELETE FROM vocabulary WHERE id = :id;");
            $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
            $stmt->execute();
            $stmt->closeCursor();
        }

        public static function getAll() {
            $dbh = SPDO::getInstance();
            $stmt = $dbh->prepare("SELECT id FROM vocabulary;");
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            $vocabularies = Array();
            foreach ($rows as $row)
                $vocabularies[] = Vocabulary::initWithId($row['id']);
            return $vocabularies;
        }

        public static function deleteAll() {
            $dbh = SPDO::getInstance();
            $stmt = $dbh->prepare("DELETE FROM vocabulary;");
            $stmt->execute();
            $stmt->closeCursor();
        }


        /*
         * Getters
         */

        public function getId() {
            return $this->id;
        }

        public function getKeyword() {
            return $this->keyword;
        }

        public function getValue() {
            return $this->value;
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
        
        public function setKeyword($keyword) {
            $this->keyword = $keyword;
        }

        public function setValue($value) {
            $this->value = $value;
        }

        public function setLanguage($language) {
            $this->language = $language;
        }

    }
