<?php 
    /** 
     * Class project
     * @author Arnaud Colin, Fran&ccedil;ois-Xavier B&eacute;ligat
     * @copyright Net-Production
     */

    class Project implements JsonSerializable {
        private $id;
        private $title;
        private $description;
        private $public;
        private $picture;
        private $url;
        private $type;
        private $language;

        public function __construct() {
            $this->id = 0;
            $this->title = "";
            $this->description = "";
            $this->public = False;
            $this->picture = "";
            $this->url = "";
            $this->type = 0;
            $this->language = "";
        }

        public static function initWithId($id) {
            $instance = new self();
            $instance->setId($id);
            $dbh = SPDO::getInstance();
            $stmt = $dbh->prepare("SELECT * FROM project WHERE id = :id;");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            $instance->setTitle($row['title']);
            $instance->setDescription($row['description']);
            $instance->setPublic($row['public']);
            $instance->setPicture($row['picture']);
            $instance->setUrl($row['url']);
            $instance->setType($row['type']);
            $instance->setLanguage($row['language']);
            return $instance;
        }

        public static function initWithData($title, $description, $public,
            $url, $type, $language) {

            $instance = new self();
            $instance->setTitle($title);
            $instance->setDescription($description);
            $public = $public === "true" ? 1 : 0;
            $instance->setPublic($public);
            $instance->setUrl($url);
            $instance->setType($type);
            $instance->setLanguage($language);
            return $instance;
        }

        public function store() {
            if (!empty($this->title) &&  !empty($this->description) &&
                !empty($this->language)) {
                $dbh = SPDO::getInstance();
                $stmt = $dbh->prepare("INSERT INTO project(title, description,
                    public, url, type, language) VALUES(:title, :description,
                    :public, :url, :type, :language);");
                $stmt->bindParam(":title", $this->title, PDO::PARAM_STR);
                $stmt->bindParam(":description", $this->description, PDO::PARAM_STR);
                $stmt->bindParam(":public", $this->public, PDO::PARAM_INT);
                $stmt->bindParam(":url", $this->url, PDO::PARAM_INT);
                $stmt->bindParam(":type", $this->type, PDO::PARAM_INT);
                $stmt->bindParam(":language", $this->language, PDO::PARAM_STR);
                $stmt->execute();
                $this->id = $dbh->lastInsertId();
                $stmt->closeCursor();
                return ($this->id > 0) ? true : false;
            } else
                return false;
        }

        public static function switch_public_private($id, $bool) {
            $dbh = SPDO::getInstance();
            $bool === "true" ? 
                $stmt = $dbh->prepare("UPDATE project SET public = 1 WHERE id =
                :id;") :
                $stmt = $dbh->prepare("UPDATE project SET public = 0 WHERE id =
                :id;");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $stmt->closeCursor();
        }

        public function update_picture($picture) {
            $dbh = SPDO::getInstance();
            $stmt = $dbh->prepare("UPDATE project SET picture = :picture WHERE id = :id;");
            $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
            $stmt->bindParam(":picture", $picture, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->closeCursor();
            $this->picture = $picture;
        }   

        public function delete() {
            $dbh = SPDO::getInstance();
            $stmt = $dbh->prepare("DELETE FROM project WHERE id = :id;");
            $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
            $stmt->execute();
            $stmt->closeCursor();
        }

        public static function getAllByTypeAndLanguage($typeId, $language) {
            $dbh = SPDO::getInstance();
            $stmt = $dbh->prepare("SELECT id FROM project WHERE type = :type and language = :language;");
            $stmt->bindParam(":type", $typeId , PDO::PARAM_INT);
            $stmt->bindParam(":language", $language, PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            $projects = Array();
            foreach ($rows as $row)
                $projects[] = Project::initWithId($row['id']);
            return $projects;
        }

        public static function getAll() {
            $dbh = SPDO::getInstance();
            $stmt = $dbh->prepare("SELECT id FROM project;");
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            $projects = Array();
            foreach ($rows as $row)
                $projects[] = Project::initWithId($row['id']);
            return $projects;
        }

        public static function deleteAll() {
            $dbh = SPDO::getInstance();
            $stmt = $dbh->prepare("DELETE FROM project;");
            $stmt->execute();
            $stmt->closeCursor();
        }

        public function jsonSerialize() {
            return array(
                "id" => $this->id,
                "title" => $this->title,
                "description" => $this->description,
                "public" => $this->public,
                "picture" => $this->picture,
                "url" => $this->url,
                "type" => $this->type,
                "language" => $this->language);
        }


        /*
         * Getters
         */

        public function getId() {
            return $this->id;
        }

        public function getTitle() {
            return $this->title;
        }

        public function getDescription() {
            return $this->description;
        }

        public function getType() {
            return $this->type;
        }

        public function isPublic() {
            return $this->public;
        }

        public function getPicture() {
            return $this->picture;
        }

        public function getLanguage() {
            return $this->language;
        }

        public function getUrl() {
            return $this->url;
        }

        /*
         * Setters
         */

        public function setId($id) {
            $this->id = $id;
        }
        
        public function setTitle($title) {
            $this->title = $title;
        }

        public function setDescription($description) {
            $this->description = $description;
        }

        public function setType($type) {
            $this->type = $type;
        }

        public function setPublic($public) {
            $this->public = $public;
        }

        public function setPicture($picture) {
            $this->picture = $picture;
        }

        public function setLanguage($language) {
            $this->language = $language;
        }

        public function setUrl($url) {
            $this->url = $url;
        }

    }
