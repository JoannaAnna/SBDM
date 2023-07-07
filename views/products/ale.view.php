<!DOCTYPE html>
<html>
<head>
    <title>Ale</title>
        
</head>
<body>

    <?php include_once './views/header.php'?>
    <br><br>
    <h2 class="text-center">Ale</h2>
    <br>
    
    <div class="card-deck">
        <?php        

            foreach ($types as $type) {
                echo "<div class='col-lg-3 col-md-6'>
                    <div class='card mx-2 my-2'>
                    <img class='card-img-top' src=\"./assets/images/m".$type['id_type'].".jpg\" alt='Card image cap'>
                    <h5><div class='card-header'>".$type['nom_article']."</div></h5>
                        <div class='card-body'>
                            <h6 class='card-title'>".$type['nom_marque']."</h6>
                            <p class='card-text'>".$type['nom_couleur']." | ".$type['nom_type']."</p>
                            <p class='card-text'><small class='text-muted'>Volume : ".$type['volume']." | Titrage : ".$type['titrage']."</small></p>
                            <a href='#' class='btn btn-primary'>ACHETEZ ".$type['prix_achat']." €</a>
                        </div>
                    </div>
                </div>";
        }
    //print_r($count);
        ?>
    </div>


    <?php include_once './views/footer.php'?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>