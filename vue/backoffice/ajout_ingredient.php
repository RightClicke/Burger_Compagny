<?php
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