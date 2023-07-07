<?php

require_once('./models/Product.php');

class HomeController {

    private $model;

    public function __construct() {
        $this->model = new Product();
    }

    public function index() {

        echo "C'est le Home controller";

        $products = $this->model->getRandom();
        require './views/home.view.php';
        
}
    
}

?>
