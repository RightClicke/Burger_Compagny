<?php
    include('../models/fonction.php');

    inscription($bdd);
?>
<main id="inscriptionF">
<form method="POST" action="#" class="inscriptionForm"> 
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="text" name="prenom"  placeholder="Prenom" required>
    <input type="text" name="adresse" placeholder="Adresse" required>
    <input type="text" name="ville" placeholder="Ville" required>
    <input type="float" name="numero" placeholder="Téléphone" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="mdp" placeholder="Mot de passe" required>
    <input type="password" name="mdp2" placeholder="Confirmation motdepasse" required>
    <input type="submit" value="S'inscrire">     
</form>
</main>
</body>