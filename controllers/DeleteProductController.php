<?php

require_once('./models/Product.php');

class DeleteProductController {

    private $model;

    public function __construct() {
        $this->model = new Product();
    }

    public function index() {
        echo "C'est le Admin controller";
        $products = $this->model->getAll();
        
        $brands = $this->model->getAllBrands();
        $colors = $this->model->getAllColors();
        $types = $this->model->getAllTypes();
    
        if(isset($_POST["deleteProduct"])) {
            $deletedProduct = $_POST['code'];
            $deletedProduct = $this->model->deleteProduct($deletedProduct);
        }

        require './views/admin/manageProducts.view.php';
    }
    
}

?>