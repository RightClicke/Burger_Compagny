<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <script src="https://kit.fontawesome.com/fec8a6cc73.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
    <title>Burger Compagnie</title>
</head>
<body>
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
                    <a href="#"><i class="fa-solid fa-user"></i></a>
                    
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