<?php

require_once('./models/Product.php');

class UpdateProductController {

    private $model;

    public function __construct() {
        $this->model = new Product();
    }

    public function index() {
        echo "C'est le Admin controller";

        // on définit des variables en exécutant des méthodes à partir du modèle Product
        $products = $this->model->getAll();
        $brands = $this->model->getAllBrands();
        $colors = $this->model->getAllColors();
        $types = $this->model->getAllTypes();
        $countries = $this->model->getAllCountries();

        // pour avoir des champs préremplis dans le formulaire de mise à jour du produit, 
        // on obtiendra les données de l'article sur id_article 
        // (reçu via la méthode post du site de gestion du produit)
        if(isset($_POST["getProduct"])) {
            $idProduct = $_POST['code'];
            $rows = $this->model->getProduct($idProduct);
            // print_r($rows);
        }
        
        // on appelle la méthode updateProduct via la variable globale POST sur le site MAJ
        if(isset($_POST["updateProduct"])) {
            $productId = filter_input(INPUT_POST, 'productId');
            $productName = filter_input(INPUT_POST, 'productName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $productPrice = filter_input(INPUT_POST, 'productPrice', FILTER_SANITIZE_NUMBER_FLOAT);
            $productVolume = filter_input(INPUT_POST, 'productVolume');
            $productTitrage = filter_input(INPUT_POST, 'productTitrage', FILTER_SANITIZE_NUMBER_FLOAT);
            $brandId = filter_input(INPUT_POST, 'brandName');
            $colorId = filter_input(INPUT_POST, 'colorName');
            $typeId = filter_input(INPUT_POST, 'typeName');

            $updateProduct = $this->model->updateProduct($productId, $productName, $productPrice, 
                $productVolume, $productTitrage, $brandId, $colorId, $typeId);    

        }
    

        require './views/admin/updateProduct.view.php';
    }
    
}

?>