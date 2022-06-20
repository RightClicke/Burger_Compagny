<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <!-- <ion-icon name="logo-apple"></ion-icon> -->
                        </span>
                        <span class="title">BURGER COMPAGNY</span>
                    </a>
                </li>

                <li>
                    <a href="index.php?page=espacemembre">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Espace Administrateur</span>
                    </a>
                </li>

                <li>
                    <a href="index.php?page=produit">
                        <span class="icon">
                            <ion-icon name="download"></ion-icon>
                        </span>
                        <span class="title">Produits</span>
                    </a>
                </li>

                <li>
                    <a href="index.php?page=ingredients">
                        <span class="icon">
                            <ion-icon name="download"></ion-icon>
                        </span>
                        <span class="title">Ingredients </span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Deconnexion</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="../assets/imgs/72-729670_png-file-svg-single-user-icon-png.png" alt="">
                </div>
            </div>
            <!-- ================ Order Details List ================= -->
 <?php 
    
        if (isset($_GET['page'])) {

            $page = $_GET['page'];
            switch ($page) {
                case 'espacemembre':
                    include('espaceMembre.php');
                    break;
                case 'produit':
                    include('produit.php');
                    break;
                case "ingredients":
                    include('ingredient.php');
                    break;
                case "notreCarte":
                    include('../traitement/carteMenu.php');
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
                    include('espaceMembre.php');
            }
        } else {
            include('espaceMembre.php');
        }
        
    
    
    
    
    ?>



            </div>
        </div>
   
    </div>
    <!-- =========== Scripts =========  -->
    <script src="../../assets/js/main.js"></script>
   <!-- ====== ionicons ======= -->
   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>