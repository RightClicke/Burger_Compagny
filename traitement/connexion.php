<?php
    include('../models/fonction.php');

    connexion($bdd);
?>
<main id="connexionF">
    <form class="connexionF" method="POST" action="#">
        <input type="text" name="email" placeholder="Email" required>
        <input type="password" name="mdp" placeholder="Mot de passe" required>
        <input type="submit" value="Connexion">
        <a class="mdp_oublie" href="#">Mot de passe oublié?</a>
    </form>
</main>



</html>