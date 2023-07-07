<!DOCTYPE html>
<html>
<head>
    <title>Tableau de bord administrateur</title>
        
</head>
<body>

    <?php foreach ($rows as $row) {
        $idProduct = $row['code'];
        $productName = $row['nom_article'];
        $productPrice = $row['prix_achat'];
        $productVolume = $row['volume'];
        $productTitrage = $row['titrage'];
        $colorName = $row['nom_couleur'];
        $brandName = $row['nom_marque'];
        $typeName = $row['nom_type'];
        $countryName = $row['nom_pays'];
    ?>

<?php include_once './views/header_admin.php'?>

<div class="container w-80 mx-auto">
    <h3 class="text-center">Ajouter un nouvel article</h3>
    <form action="" method="post" name="updateProduct">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="productId" class="form-label">Id</label>
            <input type="text" name="productId" class="form-control"
                value="<?php echo $idProduct; ?>" disabled>
            </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="productName" class="form-label">Nom</label>
            <input type="text" name="productName" class="form-control"
            value="<?php echo $productName; ?>" required>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="productPrice" class="form-label">Prix</label>
            <input type="text" name="productPrice" class="form-control"
            value="<?php echo $productPrice; ?>" required>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="productVolume" class="form-label">Volume</label>
            <select name="productVolume" class="form-control" >
                <option value=""><?php echo $productVolume; ?></option>
                <option value="">75 cl</option>
                <option value="">33 cl</option>
            </select>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="productTitrage" class="form-label">Titrage</label>
            <input type="text" name="productTitrage" class="form-control"
            value="<?php echo $productTitrage; ?>" required>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="productVolume" class="form-label">Marque</label>
            <select name="productVolume" class="form-control" >
                <option value=""><?php echo $brandName; ?></option>
                <?php
                    foreach ($brands as $brand) {
                        echo "<option>".$brand['id_marque']." | ".$brand['nom_marque']."</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="productVolume" class="form-label">Couleur</label>
            <select name="productVolume" class="form-control" >
                <option value=""><?php echo $colorName; ?></option>
                <?php
                    foreach ($colors as $color) {
                        echo "<option>".$color['id_couleur']." | ".$color['nom_couleur']."</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="productVolume" class="form-label">Type</label>
            <select name="productVolume" class="form-control" >
                <option value=""><?php echo $typeName; ?></option>
                <?php
                    foreach ($types as $type) {
                        echo "<option>".$type['id_type']." | ".$type['nom_type']."</option>";
                    }
                ?>
            </select>
        </div>

        <br>
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" class="btn btn-success mb-4 px-4" name="updateProduct" 
                value="MAJ">
        </div>
        <?php } ?>


<?php include_once './views/footer.php'?>


</body>
</html>