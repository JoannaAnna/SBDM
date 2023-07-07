<?php

require_once('./models/Product.php');

class BeersController {

    private $model;

    // on "crée" un nouvel objet (notre classe modèle)
    public function __construct() {
        $this->model = new Product();
    }

    // on peut maintenant exécuter des méthodes créées dans le modèle
    
    // "appelle" les vues correspondantes
    public function index() {
        echo "C'est le Beers controller";
        $products = $this->model->getAll();
        
        require './views/products/beers.view.php';
    }

    public function amber() {
        echo "C'est le Amber controller";
        $products = $this->model->getBeerByColor('Ambree');
        //print_r($products);
        require './views/products/amber.view.php';
    }

    public function blond() {
        echo "C'est le Blond controller";
        $products = $this->model->getBeerByColor('Blonde');
        require './views/products/blond.view.php';
    }

    public function dark() {
        echo "C'est le Dark controller";
        $products = $this->model->getBeerByColor('Brune'); 
        require './views/products/dark.view.php';
    }

    public function wheat() {
        echo "C'est le Wheat controller";
        $products = $this->model->getBeerByColor('Blanche');
        require './views/products/wheat.view.php';
    }
    
}



?>