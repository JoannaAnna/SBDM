<?php

require_once('./models/Product.php');

class TypeController {

    private $model;

    public function __construct() {
        $this->model = new Product();
    }

    public function index() {
        echo "C'est le Type controller";

        $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        $lastUriSegment = array_pop($uriSegments);

        $types = $this->model->getBeerByType($lastUriSegment);

        $filename = "./views/products/".($lastUriSegment).".view.php";
        // si le contrôleur existe, la fonction appellera le fichier du contrôleur
        if (file_exists($filename)) {
            require $filename;
        }
        // require './views/bio.view.php';
        // require './views/ipa.view.php';

    }
    
}



?>