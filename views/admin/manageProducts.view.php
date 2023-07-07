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

<div class="container w-80 mx-auto">
<!--Pour afficher le message de réussite de l'ajout d'une nouvelle bière-->
<?php
    if(isset($_SESSION['status'])) {
        echo "<button type='button' class='btn btn-success' disabled>".$_SESSION['status']."</button>";
        unset($_SESSION['status']);
    }
    if(isset($_SESSION['updatedPr'])) {
        echo "<button type='button' class='btn btn-success' disabled>".$_SESSION['updatedPr']."</button>";
        unset($_SESSION['updatedPr']);
    }
    if(isset($_SESSION['deletedPr'])) {
        echo "<button type='button' class='btn btn-danger' disabled>".$_SESSION['deletedPr']."</button>";
        unset($_SESSION['deletedPr']);
    }
?>

<h3 class="text-center">Tableau des articles</h3>

<div class="container w-80 mx-auto">
      <a href="addProduct"><button type="submit" class="btn btn-primary" name="addProduct">AJOUTER UN NOUVEL ARTICLE</button></a>

    <br>
    <div class="table-responsive-md">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nom de la bière</th>
                    <th scope="col">Nom de la marque</th>
                    <th scope="col">Couleur</th>
                    <th scope="col">Type</th>
                    <th scope="col">Pays</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($products as $product) {
                        echo "<tr>
                        <th scope='row'>".$product['code']."</th>
                        <td>".$product['nom_article']."</td>
                        <td>".$product['nom_marque']."</td>
                        <td>".$product['nom_couleur']."</td>
                        <td>".$product['nom_type']."</td>
                        <td>".$product['nom_pays']."</td>
                        <td><form action='updateProduct' name='' method='post'>
                        <input type='hidden' name='code' value=".$product['code'].">
                        <a href='updateProduct'><button type='submit' class='btn btn-success' 
                            name='getProduct'>MAJ</button></a></form></td>
                        <form action='' name='' method='post'>
                        <input type='hidden' name='code' value=".$product['code'].">
                        <td><input type='submit' class='btn btn-danger' name='deleteProduct' 
                            value='SUPPRIME'></td>
                        </form></tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
<?php include_once './views/footer.php'?>


</body>
</html>