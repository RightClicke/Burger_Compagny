<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="../css/stylePr.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <title>Burger Compagnie</title>
</head>
<nav>
    <a href="#" class="nav-icon" aria-label="visit homepage" aria-current="page">
        <h1>Burger<span>COMPAGNIE</span></h1>
    </a>

      <div class="main-navlinks">
            <button class="hamburger" type="button" aria-label="Toggle navigation" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="navlinks-container">
                <a href="#" aria-current="page">Accueil</a>
                <a href="../traitement/carteMenu.php">Notre carte</a>
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
            <button class="pinka"type="button"><a href="index.php?page=connexion">Connexion</a></button>
            <button type="button"><a href="index.php?page=inscription">Inscription</a></button>
        </div>
      </div>
      
</nav>
<script>
    const hamburgerToggler = document.querySelector(".hamburger")
    const navLinksContainer = document.querySelector(".navlinks-container");

    const toggleNav = () => {
    hamburgerToggler.classList.toggle("open")

    const ariaToggle = hamburgerToggler.getAttribute("aria-expanded") === "true" ?  "false" : "true";
    hamburgerToggler.setAttribute("aria-expanded", ariaToggle)

    navLinksContainer.classList.toggle("open")
    }
    hamburgerToggler.addEventListener("click", toggleNav)

    new ResizeObserver(entries => {
    if(entries[0].contentRect.width <= 900){
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
            include('../traitement/accueil.php');
            break;
        case 'connexion':
            include('../traitement/connexion.php');
            break;
        case "inscription":
            include('../traitement/inscription.php');
            break;
        case "":
            include('');
            break;
        case "4":
            include('');
            break;
        case "5":
            include('');
            break;
        case "6":
            include('');
            break;
        case "7":
            include('');
            break;

        default:
            include('../traitement/accueil.php');
    }
} else {
    include('../traitement/accueil.php');
}

  
   










   ?>








 
<footer>
        <p> Copyright ©2021-2022 | Amine & Christevie </p>
</footer>
    <script>
        var menu_toggle = document.querySelector('.menu_toggle');
        var menu =  document.querySelector('.menu')
        menu_toggle.onclick = function(){
        menu_toggle.classList.toggle('active');
        menu.classList.toggle('responsive');
        }
    </script>

</body>

</html>