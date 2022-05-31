<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <script src="https://kit.fontawesome.com/fec8a6cc73.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/styleConnex.css">
    <title>Burger Compagnie - connexion</title>
</head>
<?php
    include('../models/fonction.php');

    connexion($bdd);
?>

<main id="mainConnex">
<form class="connexionForm" method="POST" action="#">
    <input type="text" name="email" placeholder="Email" required>
    <input type="password" name="mdp" placeholder="Mot de passe" required>
    <input type="submit" value="Connexion">
    <a class="mdp_oublie" href="#">Mot de passe oublié?</a>
</form>



</html>