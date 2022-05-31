<?php
inscription($bdd);
?>

<form method="POST" action="">
    <input type="text" name="nom" class="marque1" placeholder="nom" required />
    <input type="text" name="prenom" class="marque1" placeholder="prenom" required />
    <input type="text" name="adresse" class="marque1" placeholder="adresse" required />
    <input type="email" name="email" class="marque1" placeholder="email" required />
    <input type="number" name="numero" class="marque1" placeholder="numero" required />
    <input type="password" name="mdp" class="marque1" placeholder="mots de passe" required />
    <input type="password" name="mdp2" class="marque1" placeholder="mots de passe" required />
    <input type="text" name="ville" class="marque1" placeholder="ville" required />
    <input type="submit" name="envoyer" id="envoyer">
</form>