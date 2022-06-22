<?php
session_start();
include('../models/bdd.php');
include('../models/fonction.php');
include('function.php');
$nomproduit = $_GET['action'];
supprimerArticle($nomproduit);
header('Location:../public/index.php?page=4');
