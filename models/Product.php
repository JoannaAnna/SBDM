<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}

Class Product {

    // Propriété qui contiendra l'instance de la connexion
    private $connection;

    // Fonction d'initialisation de la base de données
    public function __construct() {
        require_once 'config.php';
        // On supprime la connexion précédente
        $this->connection = null;

        // On se connecte à la base
            $this->connection = new PDO(DBCONNECTION, DBUSER, DBPASS);
            echo "On est connectés";

    }

    public function getAll() {
        $query = "SELECT t1.id_article AS code, t1.nom_article, t1.prix_achat, t1.volume, t1.titrage, t2.nom_couleur, t3.nom_type, t3.id_type, t4.nom_marque, t5.nom_pays
        FROM article AS t1 INNER JOIN couleur AS t2 ON t1.id_couleur = t2.id_couleur
        INNER JOIN typebiere AS t3 ON t1.id_type = t3.id_type
        INNER JOIN marque AS t4 ON t1.id_marque = t4.id_marque
        INNER JOIN pays AS t5 ON t4.id_pays = t5.id_pays
        ORDER BY t1.id_article DESC";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRandom() {
        $query = "SELECT t1.id_article AS code, t1.nom_article, t1.prix_achat, t1.volume, t1.titrage, t2.nom_couleur, t3.nom_type, t3.id_type, t4.nom_marque, t5.nom_pays
        FROM article AS t1 INNER JOIN couleur AS t2 ON t1.id_couleur = t2.id_couleur
        INNER JOIN typebiere AS t3 ON t1.id_type = t3.id_type
        INNER JOIN marque AS t4 ON t1.id_marque = t4.id_marque
        INNER JOIN pays AS t5 ON t4.id_pays = t5.id_pays
        ORDER BY rand() LIMIT 5";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBeerByColor($nom_couleur) {
        $query = "SELECT t1.id_article AS code, t1.nom_article, t1.prix_achat, t1.volume, t1.titrage, t2.nom_couleur, t3.nom_type, t3.id_type, t4.nom_marque
        FROM article AS t1 INNER JOIN couleur AS t2 ON t1.id_couleur = t2.id_couleur
        LEFT OUTER JOIN typebiere AS t3 ON t1.id_type = t3.id_type
        INNER JOIN marque AS t4 ON t1.id_marque = t4.id_marque
        WHERE nom_couleur = :nom_couleur";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':nom_couleur', $nom_couleur);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBeerByType($nom_type) {
        $query = "SELECT t1.id_article AS code, t1.nom_article, t1.prix_achat, t1.volume, t1.titrage, t1.id_marque, t2.nom_couleur, t3.nom_type, t3.id_type, t4.nom_marque
        FROM article AS t1 LEFT OUTER JOIN couleur AS t2 ON t1.id_couleur = t2.id_couleur
        INNER JOIN typebiere AS t3 ON t1.id_type = t3.id_type
        INNER JOIN marque AS t4 ON t1.id_marque = t4.id_marque
        WHERE nom_type = :nom_type";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':nom_type', $nom_type);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllBrands() {
        $query = "SELECT id_marque, nom_marque FROM marque";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllColors() {
        $query = "SELECT id_couleur, nom_couleur FROM couleur";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllTypes() {
        $query = "SELECT id_type, nom_type FROM typebiere";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCountries() {
        $query = "SELECT id_pays, nom_pays FROM pays";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLastId() {
        $query = "SELECT MAX(ID_ARTICLE) as lastId FROM article";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $lastId = $result['lastId'];
        $newId = $lastId + 1;
        return $newId;
    }

    public function addProduct($productId, $productName, $productPrice, 
        $productVolume, $productTitrage, $brandId, $colorId, $typeId) {
        $query = "INSERT INTO article (ID_ARTICLE, nom_article, prix_achat, 
            volume, titrage, id_marque, id_couleur, id_type) 
            VALUES (:productId, :productName, :productPrice, :productVolume, 
            :productTitrage, :brandId, :colorId, :typeId)";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':productId', $productId);
        $stmt->bindParam(':productName', $productName);
        $stmt->bindParam(':productPrice', $productPrice);
        $stmt->bindParam(':productVolume', $productVolume);
        $stmt->bindParam(':productTitrage', $productTitrage);
        $stmt->bindParam(':brandId', $brandId);
        $stmt->bindParam(':colorId', $colorId);
        $stmt->bindParam(':typeId', $typeId);
        // return $stmt->execute();

        if($stmt->execute()){
            $_SESSION['status'] = "Une nouvelle bière $productId a été ajoutée à la base de données";
            header('Location: http://localhost/ecf_Joanna/manageProducts');
        }

    }

    public function deleteProduct($productId) {
        $query = "DELETE FROM article WHERE id_article = :productId";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':productId', $productId);
        $result = $stmt->execute();
        // return $result;
        if($stmt->execute()){
            $_SESSION['deletedPr'] = "La bière $productId a été supprimée";
        }
    }

    public function getProduct($idProduct) {
        $query = "SELECT t1.id_article AS code, t1.nom_article, t1.prix_achat, t1.volume, t1.titrage, t2.nom_couleur, t3.nom_type, t3.id_type, t4.nom_marque, t5.nom_pays
        FROM article AS t1 LEFT OUTER JOIN couleur AS t2 ON t1.id_couleur = t2.id_couleur
        LEFT OUTER JOIN typebiere AS t3 ON t1.id_type = t3.id_type
        INNER JOIN marque AS t4 ON t1.id_marque = t4.id_marque
        INNER JOIN pays AS t5 ON t4.id_pays = t5.id_pays
        WHERE t1.id_article = :idProduct";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':idProduct', $idProduct);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateProduct($productId, $productName, $productPrice, 
        $productVolume, $productTitrage, $brandId, $colorId, $typeId) {
        $query = "UPDATE article SET nom_article=:productName, prix_achat=:productPrice, 
                    volume=:productVolume, titrage=:productTitrage, id_marque=:brandId, 
                    id_couleur=:colorId, id_type=:typeId
                    WHERE id_article=:productId";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':productId', $productId);
        $stmt->bindParam(':productName', $productName);
        $stmt->bindParam(':productPrice', $productPrice);
        $stmt->bindParam(':productVolume', $productVolume);
        $stmt->bindParam(':productTitrage', $productTitrage);
        $stmt->bindParam(':brandId', $brandId);
        $stmt->bindParam(':colorId', $colorId);
        $stmt->bindParam(':typeId', $typeId);
        
        // return $stmt->execute();

        if($stmt->execute()){
            $_SESSION['updatedPr'] = "La bière $productId, $productName, $productPrice, 
            $productVolume, $productTitrage, $brandId, $colorId, $typeId a été mise à jour";
            header('Location: http://localhost/ecf_Joanna/manageProducts');
        }

    }
}