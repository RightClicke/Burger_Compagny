<?php


function ajout_image($bdd)
{

    if (isset($_POST['nom'])) {
        //Si il appuie sur Valider alors ..
        if ($_POST['validation']) {
            $nom = $_POST['nom'];
            //création de la variable du dossier ou l'image sera enregistré
            $uploads_dir = '../public\assets\images';


            //Récupération du nom de l'image
            $name = $_FILES["image"]["name"];
            $name = str_replace(' ', '_', $name);
            //mettre l'image dans le dossier precedemment donnée dans la variable et le nommé ensuite
            //par son nom recuperer aussi precedemment
            move_uploaded_file($_FILES["image"]["tmp_name"], "$uploads_dir/$name");
            //mettre le chemin de l'image dans variable
            $lien = "$uploads_dir/$name";
            if (exif_imagetype($lien) == IMAGETYPE_JPEG) {
                echo 'Cette image est  un JPEG';
                //eviter qu'une photo en base de donné soit enregistrer a nouveaux
                $bdduser = selectImgByLien($bdd, $lien);
                if ($bdduser == false) {
                    insertImg($bdd, $nom, $lien);
                } else {
                    echo 'photo deja enregister';
                }
            } else {
                echo "cette image n'est pas un jpeg";
                $fichier = $lien;
                if (file_exists($fichier)) {
                    unlink($fichier);
                }
            }
        }
    }
}
function ajout_ingredient($bdd)
{
    if (isset($_POST['nom'])) {

        $bdding = selectIngredientByname($bdd);
        if ($bdding == false) {
            ajout_image($bdd);
            $nom = strip_tags($_POST['nom']);
            $bddimg = selectImgByName($bdd, $nom);
            $ID_img = $bddimg['ID_image'];
            $nom = $_POST['nom'];
            $dispo = false;
            if (isset($_POST['dispo'])) {
                $dispo = true;
            }
            insertIngredient($bdd, $ID_img, $nom, $dispo);
        } else {
            echo 'cette ingredients est deja enregister';
        }
    }
}
function ajout_categorie($bdd)
{
    if (isset($_POST['nom'])) {
        //recuperation de la table categorie pour verifier si la categorie n'existe pas deja
        $bddcat = selectCategorieByName($bdd, $_POST['nom']);
        if ($bddcat == false) {
            //preparation des donnée pour remplir la table categorie
            ajout_image($bdd);
            $nom = strip_tags($_POST['nom']);
            // on recupere dans la table image l'id de l'image qui a le meme nom que la categorie
            $bddimg = selectImgByName($bdd, $nom);
            $ID_img = $bddimg['ID_image'];
            $nom = $_POST['nom'];
            $dispo = false;
            //on verifie la disponibilité du produit
            if (isset($_POST['dispo'])) {
                $dispo = true;
            }

            // apres avoir recuperer tout les données necessaire on les insert dans la table categorie
            insertcategorie($bdd, $ID_img, $nom, $dispo);
        } else {
            echo 'cette categorie est deja enregister';
        }
    }
}
function ajout_produit($bdd)
{
    if (isset($_POST['nom'])) {
        $nom = $_POST['nom'];
        $prix = $_POST['prix'];
        $descrip = $_POST['description'];
        $cat = $_POST['cat'];

        $bddprod = selectProduitByName($bdd, $nom);
        if ($bddprod == false) {
            //preparation des donnée pour remplir la table categorie
            ajout_image($bdd);
            // on recupere dans la table image l'id de l'image qui a le meme nom que la categorie
            $bddimg = selectImgByName($bdd, $nom);

            if (isset($bddimg['ID_image'])) {
                $ID_img = $bddimg['ID_image'];

                $nom = $_POST['nom'];
                $dispo = false;
                //on verifie la disponibilité du produit
                if (isset($_POST['dispo'])) {
                    $dispo = true;
                }
                // apres avoir recuperer tout les données necessaire on les insert dans la table categorie
                insertProduit($bdd, $cat, $ID_img, $nom, $descrip, $prix, $dispo);
            }
        } else {
            echo 'produit deja enregistrer';
        }
    }
}
/**
 * menu deroulant des categorie categorie 
 *
 * @param [PDO] $bdd
 * @return void
 */
function table_cat($bdd)
{
    $bddcat = selectCategorie($bdd);
    echo "<select class='cat' name='cat'>";
    echo '<option value="">' . "choisir une categorie" . '</option>';
    foreach ($bddcat as $resultat) {

        echo '<option value=' . $resultat['ID_categorie'] . '>' . $resultat['nom'] . '</option>';
    }

    echo '</select>';


    echo '</select>';
}
