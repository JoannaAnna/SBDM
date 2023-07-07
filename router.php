<?php
// on récupère les informations du serveur
$url = $_SERVER['REQUEST_URI'];

// on divise une chaîne en segments par /
$parts = explode('/', $url);
$page = '/'.end($parts);

// $page contient maintenant la partie de l'URL après le dernier "/"

// echo $page."<br>";

// on utilise le SWITCH pour appeler les contrôleurs pour les pages respectives
switch ($page) {
    case '/home':
    // Lorsque l'URL correspond à "/home"
        require_once './controllers/HomeController.php';
        // Inclut le fichier contenant la définition de la classe HomeController
        $controller = new HomeController();
        // Crée une nouvelle instance de la classe HomeController
        $controller->index();
        // Appelle la méthode "index" de l'objet HomeController
        break;
        // Termine le bloc "case" et sort du switch

    case '/beers':
        require_once './controllers/BeersController.php';
        $controller = new BeersController();
        $controller->index();
        break;
    case '/amber':
        require_once './controllers/BeersController.php';
        $controller = new BeersController();
        $controller->amber();
        break;
    case '/wheat':
        require_once './controllers/BeersController.php';
        $controller = new BeersController();
        $controller->wheat();
        break;
    case '/blond':
        require_once './controllers/BeersController.php';
        $controller = new BeersController();
        $controller->blond();
        break;
    case '/dark':
        require_once './controllers/BeersController.php';
        $controller = new BeersController();
        $controller->dark();
        break;
    case '/bio':
        require_once './controllers/TypeController.php';
        $controller = new TypeController();
        $controller->index();
        break;
    case '/ipa':
        require_once './controllers/TypeController.php';
        $controller = new TypeController();
        $controller->index();
        break;
    case '/ale':
        require_once './controllers/TypeController.php';
        $controller = new TypeController();
        $controller->index();
        break;
    case '/manageProducts':
        require_once './controllers/DeleteProductController.php';
        $controller = new DeleteProductController();
        $controller->index();
        break;
    case '/manageColors':
        require_once './controllers/ColorController.php';
        $controller = new ColorController();
        $controller->index();
        break;
    case '/addProduct':
        require_once './controllers/ProductController.php';
        $controller = new ProductController();
        $controller->index();
        break;
    case '/updateProduct':
        require_once './controllers/UpdateProductController.php';
        $controller = new UpdateProductController();
        $controller->index();
        break;
    default:
            // Gérer les erreurs 404
            // http_response_code(404);
            // echo "La page recherchée n'existe pas";
        // ou rediriger vers une page par défaut
        require_once './controllers/HomeController.php';
        $controller = new HomeController();
        $controller->index();
        break;
}
?>