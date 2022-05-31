<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <script src="https://kit.fontawesome.com/fec8a6cc73.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/styleInscription.css">
    <title>Burger Compagnie - Inscription</title>
</head>
<?php
    include('../models/fonction.php');

    inscription($bdd);
?>
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
</html>