<?php

require_once('./models/Admin.php');

class ColorController {

    private $model;

    public function __construct() {
        $this->model = new Admin();
    }

    public function index() {
        echo "C'est le Admin controller";
        
        $colors = $this->model->getColor();

        if(isset($_POST['addColor'])) {
            // on récupère un paramètre via la méthode POST, (nom du champ de saisie 'newColor')
            // et on utilise un filtre pour empêcher un pirate de mettre un code dans le champ de saisie
            $newColor = filter_input(INPUT_POST, 'newColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $addColor = $this->model->addColor($newColor);

            // die("Une nouvelle couleur de bière a été ajoutée à la base de données");
        }

        if(isset($_POST["deleteColor"])) {
            $deletedColor = $_POST["id"];
            $deletedColor = $this->model->deleteColor($deletedColor);
        }
        
        if(isset($_POST["updateColor"])) {
            $newColor = filter_input(INPUT_POST, 'updatedColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $idColor = $_POST["id"];
            $updateColor = $this->model->updateColor($newColor, $idColor);
        }
        
        require './views/admin/manageColors.view.php';

    }
    
}

?>