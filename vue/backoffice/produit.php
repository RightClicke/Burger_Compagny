<?php
ajout_produit($bdd);
?>

<form enctype="multipart/form-data" action="" method="post">
    <label for="nom">Nom du produit : </label>
    <input type="text" name="nom" id="nom" /><br />

    <label for="nom">prix : </label>
    <input type="number" name="prix" id="nom" /><br />

    <label for="nom">description : </label>
    <input type="text" name="description" id="description" /><br />

    <label for="image">Image : </label>
    <input type="file" name="image" id="image" /><br />

    <label for="validation">disponible : </label>
    <input type="checkbox" name='dispo' id='dispo'><br>
    <?php
    table_cat($bdd);

    ?>
    <br>
    <label for="validation">Valider : </label>
    <input type="submit" name="validation" id="validation" value="Envoyer" />