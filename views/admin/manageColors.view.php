<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tableau de bord administrateur</title>
    
</head>
<body>

<?php include_once './views/header_admin.php'?>

<!--Pour afficher le message de réussite de l'ajout d'une nouvelle couleur-->
<?php
    if(isset($_SESSION['added'])) {
        echo "<button type='button' class='btn btn-success' disabled>".$_SESSION['added']."</button>";
        unset($_SESSION['added']);
    }
    if(isset($_SESSION['updated'])) {
        echo "<button type='button' class='btn btn-success' disabled>".$_SESSION['updated']."</button>";
        unset($_SESSION['updated']);
    }
    if(isset($_SESSION['deleted'])) {
        echo "<button type='button' class='btn btn-danger' disabled>".$_SESSION['deleted']."</button>";
        unset($_SESSION['deleted']);
    }
?>


    <h3 class="text-center">Tableau des couleurs</h3>
    <div class="container w-80 mx-auto">
        <form class="form-inline" method="POST">
            <span class="input-group-text" id="">Insérer une nouvelle couleur</span>
            <input type="text" class="form-control" name="newColor"
                value="Nom de la couleur">
            <input type="submit" class="btn btn-primary" name="addColor" value="INSÉRER">
        </form>
        <br>
        <div class="table-responsive-md">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nom de la couleur</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($colors as $color) {
                            echo "<tr><form action='' name='' method='post'>
                            <input type='hidden' name='id' value=".$color['id_couleur'].">
                            <th scope='row'>".$color['id_couleur']."</th>
                            <td>".$color['nom_couleur']."</td>
                            <td><input type='text' class='form-control' name='updatedColor'
                            value='Modifier le nom de la couleur'></td>
                            <td><input type='submit' class='btn btn-success' name='updateColor' 
                                value='MAJ'></td>
                            <td><input type='submit' class='btn btn-danger' name='deleteColor' 
                                value='SUPPRIME'></td>
                            </form></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
</div>

<?php include_once './views/footer.php'?>


</body>
</html>