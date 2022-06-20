<?php
session_start();
include('../models/bdd.php');
include('../models/fonction.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <?php
    if (isset($_GET['page'])) {

        $page = $_GET['page'];
        switch ($page) {
            case '0':
                include('../traitement/connexion.php');
                break;
            case "1":
                include('../traitement/image.php');
                break;
            case "2":
                include('');
                break;
            case "3":
                include('');
                break;
            case "4":
                include('../traitement/inscription.php');
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
                include('../traitement/default.php');
        }
    } else {
        include('../traitement/default.php');
    }


    ?>


</body>

</html>