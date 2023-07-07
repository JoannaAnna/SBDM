<?php

// ouvre une nouvelle session (si elle n'est pas encore ouverte) pour afficher 
// des messages à la fin de l'exécution des requêtes
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

Class Admin {

    // Propriété qui contiendra l'instance de la connexion
    private $connection;

    // Fonction d'initialisation de la base de données
    public function __construct() {
        require_once 'config.php';
        // On supprime la connexion précédente
        $this->connection = null;

        // On se connecte à la base
        $mysqli = $this->connection = new PDO(DBCONNECTION, DBUSER, DBPASS);
            echo "On est connectés";

    }

    // pour récupérer les données des articles, y compris le nom de la couleur, 
    // le nom de la marque et le nom du type ; 
    // utilisé JOIN et LEFT OUTER JOIN (pour les valeurs NULL à inclure)
    public function getAll() {
        // une requête sql
        $query = "SELECT t1.id_article AS code, t1.nom_article, t1.prix_achat, t1.volume, t1.titrage, t2.nom_couleur, t3.nom_type, t3.id_type, t4.nom_marque, t5.nom_pays
        FROM article AS t1 LEFT OUTER JOIN couleur AS t2 ON t1.id_couleur = t2.id_couleur
        LEFT OUTER JOIN typebiere AS t3 ON t1.id_type = t3.id_type
        INNER JOIN marque AS t4 ON t1.id_marque = t4.id_marque
        INNER JOIN pays AS t5 ON t4.id_pays = t5.id_pays
        ORDER BY t1.id_article DESC";
        // connexion à bdd et préparation de la req
        $stmt = $this->connection->prepare($query);
        // exécution de la req
        $stmt->execute();
        // le résultat est une récupération de toutes les données dans un format de tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getColor() {
        $query = "SELECT id_couleur, nom_couleur FROM couleur
        ORDER BY id_couleur DESC";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addColor($newColor) {
        $query = "INSERT INTO couleur (nom_couleur) 
            SELECT :newColor
            WHERE NOT EXISTS 
                (SELECT nom_couleur 
                FROM couleur
                WHERE nom_couleur = :newColor)";
        $stmt = $this->connection->prepare($query);
        // lie deux param: une variable php et un marquer nommé dans sql (:newColor)
        $stmt->bindParam(':newColor', $newColor); 
        
        // si l'exécution retourne vrai (a été exécuté) alors un message sera affiché
        // on a besoin d'utiliser la session pour cela
        if($stmt->execute()){
            $_SESSION['added'] = "Une nouvelle couleur $newColor a été ajoutée à la base de données";
        }
    }

    public function deleteColor($deletedColor) {
        $query = "DELETE FROM couleur WHERE id_couleur = :deletedColor";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':deletedColor', $deletedColor);
        $result = $stmt->execute();

        if($stmt->execute()){
            $_SESSION['deleted'] = "La couleur $deletedColor a été supprimée";
        }
    }

    public function updateColor($updatedColor, $idColor) {
        $query = "UPDATE couleur SET nom_couleur = :updatedColor
            WHERE id_couleur = :idColor";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':updatedColor', $updatedColor);
        $stmt->bindParam(':idColor', $idColor);

        if($stmt->execute()){
            $_SESSION['updated'] = "La couleur $updatedColor a été mise à jour";
        }
    }
    

}