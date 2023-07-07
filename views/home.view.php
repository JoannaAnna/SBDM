<!DOCTYPE html>
<html>
<head>
    <title>Page d'accueil</title>
</head>
<body>

    <?php include_once 'header.php'?>

    <br><br>
    <div class="py-lg-16 py-10 bg-gray-200">
        <div class="container">
        <!-- row -->
            <div class="row justify-content-center text-center">
                <div class="col-md-9 col-12">
                    <!-- heading -->
                    <h2 class="display-4 ">Bienvenue</h2>
                    <p class="lead  px-lg-12 mb-6">Découvrez nos meilleures ventes</p>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="card-deck">
        <?php
        
            foreach ($products as $product) {
                echo "<div class='col-lg-3 col-md-6'>
                    <div class='card mx-2 my-2'>
                    <img class='card-img-top' src=\"./assets/images/m".$product['id_type'].".jpg\" alt='Card image cap'>
                    <h5><div class='card-header'>".$product['nom_article']."</div></h5>
                        <div class='card-body'>
                            <h6 class='card-title'>".$product['nom_marque']."</h6>
                            <p class='card-text'>".$product['nom_couleur']." | ".$product['nom_type']."</p>
                            <p class='card-text'><small class='text-muted'>Volume : ".$product['volume']." | Titrage : ".$product['titrage']."</small></p>
                            <a href='#' class='btn btn-primary'>ACHETEZ ".$product['prix_achat']." €</a>
                        </div>
                    </div>
                </div>";
        }
    //print_r($count);
        ?>
    </div>


    <?php include_once 'footer.php'?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>