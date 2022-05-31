<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <script src="https://kit.fontawesome.com/fec8a6cc73.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Burger Compagnie</title>
</head>
<header>
    <div class="logo">
            <h1>Burger<span>COMPAGNIE</span></h1>
            </div>
            <div class="menu_number">
                <ul class="menu">
                    <li><a href="#">Acceuil</a></li>
                    <li><a href="#">A propos</a></li>
                    <li><a href="#">Notre Carte</a></li>
                    <li><a href="#">Contact</a></li>
                    <i id="searchIcon" class="fa-solid fa-magnifying-glass"></i>
                    <a href="index.php?page=inscripConnex"><i class="fa-solid fa-user"></i></a>
                    
                </ul>
                <div class="clickAndCollect">
                    <button class="click"><a href="#" >Click and collect</a></button>
                    
                </div>
            </div>
            <!-- responsive menu -->
            <div class="menu_toggle"></div>
            
           
    </header>
    <input type="search" id="searchBar" style="color: black;"placeholder="Rechercher...">

<script>
    const searchIcon = document.getElementById("searchIcon");
    const searchBar  = document.getElementById("searchBar");
    /*Fait glisser la barre de recherche vers le bas*/
    searchIcon.onclick = () => {
    searchBar.style.display = "block";
    setTimeout(() => searchBar.classList.add("sliderDown"), 0);
    searchBar.focus();
    };
    /*Fait glisser la barre de recherche vers le haut*/
    searchBar.onblur = () => {
    searchBar.classList.remove("sliderDown");
    setTimeout(() => (searchBar.style.display = "none"), 500);
    };
</script>
<body>
   <?php
   if (isset($_GET['page'])) {

    $page = $_GET['page'];
    switch ($page) {
        case 'accueil':
            include('../traitement/accueil.php');
            break;
        case "inscripConnex":
            include('../traitement/inscripConnex.php');
            break;
        case "":
            include('');
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
            include('../accueil.php');
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