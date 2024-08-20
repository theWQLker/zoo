<?php
class Animal {
    private $conn;
    private $table_name = "animals";

    public $id;
    public $name;
    public $species;
    public $diet;
    public $lifespan;
    public $description;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Lire tous les animaux
    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Créer un nouvel animal
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET name=:name, species=:species, diet=:diet, lifespan=:lifespan, description=:description";
        $stmt = $this->conn->prepare($query);

        // Sanitize
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->species = htmlspecialchars(strip_tags($this->species));
        $this->diet = htmlspecialchars(strip_tags($this->diet));
        $this->lifespan = htmlspecialchars(strip_tags($this->lifespan));
        $this->description = htmlspecialchars(strip_tags($this->description));

        // Bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":species", $this->species);
        $stmt->bindParam(":diet", $this->diet);
        $stmt->bindParam(":lifespan", $this->lifespan);
        $stmt->bindParam(":description", $this->description);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Mettre à jour un animal
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET name=:name, species=:species, diet=:diet, lifespan=:lifespan, description=:description WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        // Sanitize
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->species = htmlspecialchars(strip_tags($this->species));
        $this->diet = htmlspecialchars(strip_tags($this->diet));
        $this->lifespan = htmlspecialchars(strip_tags($this->lifespan));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":species", $this->species);
        $stmt->bindParam(":diet", $this->diet);
        $stmt->bindParam(":lifespan", $this->lifespan);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Supprimer un animal
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        // Sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind id
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
