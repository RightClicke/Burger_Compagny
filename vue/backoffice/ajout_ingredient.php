<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleIngredient.css">
    <title>Document</title>
</head>

<body>
    <?php
    include('../traitement/backoffice/function.php');


    ajout_ingredient($bdd);
    ?>
    <form class="ingredientForm" method="POST" enctype="multipart/form-data" action="#">
        <input type="text" name="nom" placeholder="Nom de l'ingredient" required>
        <input type="file" name="image" placeholder="Image" required>
        <label for="valid">Disponible</label>
        <input type="radio" id="valide" name="dispo" required>
        <input type="submit" name="validation" value="Envoyer">
    </form>

</body>

</html>