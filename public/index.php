<?php
session_start();
include('../models/fonction.php');
include('../traitement/function.php');

$connecter = false; //initialisation en faux
if (isset($_SESSION['user']['ID_role'])) {
    $connecter = true;
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/assets/css/stylePr.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <script src="https://kit.fontawesome.com/fec8a6cc73.js" crossorigin="anonymous"></script>
    <title>Burger Compagnie</title>
</head>
<nav>
    <a href="index.php" class="nav-icon" aria-label="visit homepage" aria-current="page">
        <h1>Burger<span>COMPAGNIE</span></h1>
    </a>

    <div class="main-navlinks">
        <button class="hamburger" type="button" aria-label="Toggle navigation" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div class="navlinks-container">
            <a href="index.php" aria-current="page">Accueil</a>
            <a href="index.php?page=notreCarte">Notre carte</a>
            <a href="index.php?page=4">panier</a>
            <a href="#">A propos</a>
            <a href="#">Contact</a>
        </div>
    </div>

    <div class="nav-authentication">
        <a href="" class="sign-user" aria-label="Sign in page">
            <img src="../images/user.svg" alt="user-icon">
        </a>
        <div class="sign-btns">
            <!-- JE DOIS AJOUTER L'ICONE pour la barre de recherche<i id="searchIcon"class="fa-solid fa-magnifying-glass"></i> -->
            <?php if ($connecter == false) { ?>
                <svg width="26" height="20" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                </svg>
                <button type="button"><a href="index.php?page=connexion">Connexion/Inscription</a></button>

            <?php
            }
            ?>
        </div>
        <div class="sign-btns">
            <!-- JE DOIS AJOUTER L'ICONE pour la barre de recherche<i id="searchIcon"class="fa-solid fa-magnifying-glass"></i> -->
            <?php if ($connecter == true) { ?>
                <button type="button" style="background-color:red"><a href="../traitement/deco.php">deconnexion</a></button>
            <?php
            }
            ?>
        </div>
    </div>

</nav>
<!-- <script type="text/javascript" src="./assets/js/"></script> ajouter du script js en partant du dossier asset -->
<script>
    const hamburgerToggler = document.querySelector(".hamburger")
    const navLinksContainer = document.querySelector(".navlinks-container");

    const toggleNav = () => {
        hamburgerToggler.classList.toggle("open")

        const ariaToggle = hamburgerToggler.getAttribute("aria-expanded") === "true" ? "false" : "true";
        hamburgerToggler.setAttribute("aria-expanded", ariaToggle)

        navLinksContainer.classList.toggle("open")
    }
    hamburgerToggler.addEventListener("click", toggleNav)

    new ResizeObserver(entries => {
        if (entries[0].contentRect.width <= 900) {
            navLinksContainer.style.transition = "transform 0.3s ease-out"
        } else {
            navLinksContainer.style.transition = "none"
        }
    }).observe(document.body)
    // barre de recherche 
    // const searchIcon = document.getElementById("searchIcon");
    //     const searchBar  = document.getElementById("searchBar");
    //     /*Fait glisser la barre de recherche vers le bas*/
    //     searchIcon.onclick = () => {
    //     searchBar.style.display = "block";
    //     setTimeout(() => searchBar.classList.add("sliderDown"), 0);
    //     searchBar.focus();
    //     };
    //     /*Fait glisser la barre de recherche vers le haut*/
    //     searchBar.onblur = () => {
    //     searchBar.classList.remove("sliderDown");
    //     setTimeout(() => (searchBar.style.display = "none"), 500);
    //     };
</script>

<body>
    <?php
    if (isset($_GET['page'])) {

        $page = $_GET['page'];
        switch ($page) {
            case 'accueil':
                include('../vue/accueil.php');
                break;
            case 'connexion':
                include('../vue/connexionInscription.php');
                break;
            case "inscription":
                include('');
                break;
            case "notreCarte":
                include('../vue/carteMenu.php');
                break;
            case "4":
                include('../traitement/lepanier.php');
                break;
            case "5":
                include('../vue/backoffice/ajout_ingredient.php');
                break;
            case "6":
                include('');
                break;
            case "7":
                include('');
                break;

            default:
                include('../vue/accueil.php');
        }
    } else {
        include('../vue/accueil.php');
    }













    ?>









    <footer>
        <p> Copyright ©2021-2022 | Amine & Christevie </p>
    </footer>
    <script>
        var menu_toggle = document.querySelector('.menu_toggle');
        var menu = document.querySelector('.menu')
        menu_toggle.onclick = function() {
            menu_toggle.classList.toggle('active');
            menu.classList.toggle('responsive');
        }
    </script>

</body>

</html>