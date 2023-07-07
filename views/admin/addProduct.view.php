<!DOCTYPE html>
<html>
<head>
    <title>Tableau de bord administrateur</title>
        
</head>
<body>

<?php include_once './views/header_admin.php'?>

<div class="container">
    <h3 class="text-center">Ajouter un nouvel article</h3>
    
    <form action="" method="post" name="addProduct">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="productName" class="form-label">Nom</label>
            <input type="text" name="productName" class="form-control"
                placeholder="Insérer le nom de l'article" required>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="productPrice" class="form-label">Prix</label>
            <input type="text" name="productPrice" class="form-control"
            placeholder="Insérer le prix de l'article" required>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="productVolume" class="form-label">Volume</label>
            <select name="productVolume" class="form-control" required>
                <option value="">Insérer le volume de l'article</option>
                <option value="">75 cl</option>
                <option value="">33 cl</option>
            </select>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="productTitrage" class="form-label">Titrage</label>
            <input type="text" name="productTitrage" class="form-control"
            placeholder="Insérer le titrage de l'article" required>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brandName" class="form-label">Marque</label>
            <select name="brandName" class="form-control" required>
                <option value="">Sélectionner une marque</option>
                <?php
                    foreach ($brands as $brand) {
                        echo "<option>".$brand['id_marque']." | ".$brand['nom_marque']."</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="colorName" class="form-label">Couleur</label>
            <select name="colorName" class="form-control" required>
                <option value="">Sélectionnez une couleur</option>
                <?php
                    foreach ($colors as $color) {
                        echo "<option>".$color['id_couleur']." | ".$color['nom_couleur']."</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="typeName" class="form-label">Type</label>
            <select name="typeName" class="form-control" required>
                <option value="">Sélectionnez un type</option>
                <?php
                    foreach ($types as $type) {
                        echo "<option>".$type['id_type']." | ".$type['nom_type']."</option>";
                    }
                ?>
            </select>
        </div>
        <br>
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" class="btn btn-primary mb-4 px-4" name="addProduct" 
                value="INSÉRER">
        </div>
        
        
        


    </form>
</div>


<?php include_once './views/footer.php'?>


</body>
</html>