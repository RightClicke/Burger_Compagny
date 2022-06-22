<?php
include('../models/bdd.php');
include('../models/fonction.php');
include('function.php');
session_start();
$bddproduit = selectProduitById($bdd);

$nomproduit = $bddproduit['nom'];
$prix = $bddproduit['prix'];
$qteproduit = 1;
$ID_produit = $bddproduit['ID_produit'];

ajouterArticle($nomproduit, $qteproduit, $prix, $ID_produit);
header('Location:../vue/articleAjouter.php');
?>


<a href="../public/index.php?page=4" aria-current="page">panier</a>