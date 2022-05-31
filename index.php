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
<section class="sect2">
        <div class="section2">
            <div class="gauche">
                <h1>Commander de la nourriture dans nos restaurants près de chez vous.</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero assumenda cupiditate impedit minus repellendus amet laboriosam quibusdam ea officia;</p>
                <div class="gauche_button">
                    <a href="#">Commander Maintenant <img src="images/cart.png"></a>
                    <a href="#">Apprendre Plus <img src="images/next.png" alt=""></a>
                </div>
            </div>
            <div class="droite">
                <img src="./images/burger-gbc989f009_1920.jpg" alt="">
            </div>
        </div>
    </section>
    <section class="info-statistics">
        <div class="box">
            <h1>7505+</h1>
            <p>Restaurants</p>
        </div>
        <div class="box">
            <h1>4871+</h1>
            <p>Franchisés</p>
        </div>
        <div class="box">
            <h1>5184+</h1>
            <p>Employés</p>
        </div>
        <div class="box">
            <h1>7544+</h1>
            <p>Collaborateurs</p>
        </div>
    </section>
     <!-- à propos -->
    <section class="about-us">
        <div class="left">
            <img src="./images/hamburger-ga2c8883be_1920.jpg">
        </div>
        <div class="right">
            <h2>Nous préparons nos mets avec les meilleurs ingrédients du monde.</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis vero, porro doloremque soluta cumque ipsa molestias aliquam aspernatur.</p>
            <button><a href="#"> Apprendre Plus  <img src="images/next_white.png" alt=""></a> </button>

        </div>
    </section>
    <!-- services -->
    <section class="services">
        <div class="left">
            <h2>Nous faissons tout nos mets à la main avec de meilleurs ingrédients</h2>
            <p class="text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde sit blanditiis exercitationem rerum esse ipsam numquam dolorum autem.</p>
            <div class="service"><img src="images/check.png"> <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p></div>
            <div class="service"><img src="images/check.png"> <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p></div>
            <div class="service"><img src="images/check.png"> <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p></div>
            <button><a href="#"> Savoir Plus <img src="images/next_white.png"></a></button>
        </div>
        <div class="right">
            <img src="images/img2.jpg" alt="">
        </div>
    </section>
    <div class="meal">
        <div class="top">
            <h1>Explorer nos mets</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis ipsam, sit ipsum autem, sunt harum explicabo a cupiditate praesentium iure sequi.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis ipsam, sit ipsum autem, sunt harum explicabo a cupiditate praesentium iure sequi.</p>
            <p> Perferendis, voluptate impedit maiores natus consequuntur alias optio sit.</p>
        </div>
         <div class="bottom">
            <div class="box">
                <img src="./images/burger-g41ca5520a_1920.jpg">
                <h4>Vegétarien Salade Sandwish</h4>
                <p>Temps:10 - 15 Minutes | Livraison gratuite</p>
                <span>$20</span>
                <button><a href="#">Commander <img src="images/cart.png"></a></button>
            </div>
            <div class="box">
                <img src="./images/hamburger-ge507374ef_1920.jpg">
                <h4>Vegétarien Salade Sandwish</h4>
                <p>Temps:10 - 15 Minutes | Livraison gratuite</p>
                <span>$30</span>
                <button><a href="#">Commander <img src="images/cart.png"></a></button>
            </div>
            <div class="box">
                <img src="images/img3.jpg">
                <h4>Vegétarien Salade Sandwish</h4>
                <p>Temps:10 - 15 Minutes | Livraison gratuite</p>
                <span>$70</span>
                <button><a href="#">Commander <img src="images/cart.png"></a></button>
            </div>
        </div>
    </div>
    
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