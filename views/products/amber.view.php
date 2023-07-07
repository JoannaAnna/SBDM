<!DOCTYPE html>
<html>
<head>
    <title>Les bières ambrées</title>
        
</head>
<body>

    <?php include_once './views/header.php'?>
    <br><br>
    <div class="container w-80 mx-auto">
        <h2 class="text-center">BIÈRES AMBRÉES</h2>
        <br>
        <nav class="nav nav-pills nav-justified">
            <a class="nav-item nav-link bg-light" href="beers">TOUTES NOS BIÈRES</a>
            <a class="nav-item nav-link bg-light" href="wheat">Blanche</a>
            <a class="nav-item nav-link bg-light" href="blond">Blonde</a>
            <a class="nav-item nav-link bg-light" href="dark">Brune</a>
        </nav>
        <br>
        
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
    </div>

    <?php include_once './views/footer.php'?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>