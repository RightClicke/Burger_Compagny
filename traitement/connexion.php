<?php
connexion($bdd);
?>

<form method="POST" action="" id='connexion'>
    <div id='back'>
        <input type="email" name="email" id="marque1" placeholder="email" required>
        <input type="password" name="mdp" id="marque1" placeholder="mot de passe" required>
        <input type="submit" name="connexion" id="envoyer">
    </div>

</form>