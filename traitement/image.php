<?php
ajout_image($bdd);
?>



<form enctype="multipart/form-data" action="" method="post">
    <label for="nom">Nom : </label><input type="text" name="nom" id="nom" /><br />
    <label for="image">Image : </label><input type="file" name="image" id="image" /><br />
    <label for="validation">Valider : </label><input type="submit" name="validation" id="validation" value="Envoyer" />
</form>