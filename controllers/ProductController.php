<?php

require_once('./models/Product.php');

class ProductController {

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

        if(isset($_POST['addProduct'])) {
            $productId = $this->model->getLastId();
            //var_dump($productId);
            $productName = filter_input(INPUT_POST, 'productName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $productPrice = filter_input(INPUT_POST, 'productPrice', FILTER_SANITIZE_NUMBER_FLOAT);
            $productVolume = $_POST["productVolume"];
            $productTitrage = filter_input(INPUT_POST, 'productTitrage', FILTER_SANITIZE_NUMBER_FLOAT);
            $brandId = $_POST["brandName"];
            $colorId = $_POST["colorName"];
            $typeId = $_POST["typeName"];
            $addProduct = $this->model->addProduct($productId, $productName, $productPrice, 
                $productVolume, $productTitrage, $brandId, $colorId, $typeId);
        }

        require './views/admin/addProduct.view.php';
    }
    
}

?>

    