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
        $colorId = $row['id_couleur'];
        $brandName = $row['nom_marque'];
        $brandId = $row['id_marque'];
        $typeName = $row['nom_type'];
        $typeId = $row['id_type'];
    ?>

<?php include_once './views/header_admin.php'?>

<div class="container w-80 mx-auto">
    <h3 class="text-center">Ajouter un nouvel article</h3>
    <form action="" method="post" name="updateProduct">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="productId" class="form-label">Id</label>
            <input type="text" name="productId" class="form-control"
                value="<?php echo $idProduct; ?>">
            </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="productName" class="form-label">Nom</label>
            <input type="text" name="productName" class="form-control"
            value="<?php echo $productName; ?>" required>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="productPrice" class="form-label">Prix</label>
            <input type="number" step=".01" name="productPrice" class="form-control"
            value="<?php echo $productPrice; ?>" required>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="productVolume" class="form-label">Volume</label>
            <input type="number" step=".01" name="productVolume" class="form-control"
            value="<?php echo $productVolume; ?>" required>
        
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="productTitrage" class="form-label">Titrage</label>
            <input type="number" step=".01" name="productTitrage" class="form-control"
            value="<?php echo $productTitrage; ?>" required>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brandName" class="form-label">Marque</label>
            <select name="brandName" class="form-control" >
                <option value="<?php echo $brandId; ?>" selected><?php echo $brandName; ?></option>
                <?php
                    foreach ($brands as $brand) {
                        echo "<option value='".$brand['id_marque']."'>".$brand['nom_marque']."</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="colorName" class="form-label">Couleur</label>
            <select name="colorName" class="form-control" >
                <option value="<?php echo $colorId; ?>" selected><?php echo $colorName; ?></option>
                <?php
                    foreach ($colors as $color) {
                        echo "<option value='".$color['id_couleur']."'>".$color['nom_couleur']."</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="typeName" class="form-label">Type</label>
            <select name="typeName" class="form-control" >
                <option value="<?php echo $typeId; ?>" selected><?php echo $typeName; ?></option>
                <?php
                    foreach ($types as $type) {
                        echo "<option value='".$type['id_type']."'>".$type['nom_type']."</option>";
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
