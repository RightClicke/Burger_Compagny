<?php

?>
<?php
function inscription($bdd)
{
    $ok = false;

    if (isset($_POST['nom'])) {
        $mot_de_passe = $_POST['mdp'];
        $nom = strip_tags($_POST['nom']);
        $prenom = strip_tags($_POST['prenom']);
        $email = strip_tags($_POST['email']);
        $numero = $_POST['numero'];
        $adresse = strip_tags($_POST['adresse']);
        $ville = strip_tags($_POST['ville']);

        if ($_POST['mdp'] == $_POST['mdp2']) {

            $userstr = 'SELECT * FROM user ';
            $userquery = $bdd->prepare($userstr);
            $userquery->execute();
            $bdduser = $userquery->fetchall();
            foreach ($bdduser as $resultat) {
                if ($email == $resultat['email']) {
                    $ok = true;
                }
            }

            $password = password_hash($mot_de_passe, PASSWORD_BCRYPT);

            if ($ok == false) {

                $selectstr = 'SELECT * FROM villes WHERE ville_nom=:ville';
                $selectquery = $bdd->prepare($selectstr);
                $selectquery->bindValue(':ville', $ville, PDO::PARAM_STR);
                $selectquery->execute();
                $bddarray = $selectquery->fetchall();
                foreach ($bddarray as $resultat) {
                    $ville_id = $resultat['ville_id'];
                }

                if (isset($ville_id)) {
                    $queryprep = 'INSERT INTO user (ID_user,ID_ville,ID_role,nom,prenom,adresse,email,mdp,numero) VALUES 
                                                (null,:ville,1,:nom,:prenom,:adresse,:email,:mdp,:numero)';
                    $query = $bdd->prepare($queryprep);
                    $query->bindValue(':ville', $ville_id, PDO::PARAM_STR);
                    $query->bindValue(':nom', $nom, PDO::PARAM_STR);
                    $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
                    $query->bindValue(':adresse', $adresse, PDO::PARAM_STR);
                    $query->bindValue(':email', $email, PDO::PARAM_STR);
                    $query->bindValue(':mdp', $password, PDO::PARAM_STR);
                    $query->bindValue(':numero', $numero, PDO::PARAM_INT);

                    $query->execute();
                    echo ('ok');




                    // header('Location:index.php');
                } else {
                    echo 'ville pas reconnue';
                }
            } else {
                echo 'identifiant ou email deja utiliser';
            }
        } else {
            echo 'mail ou mdp different';
        }
    }
}
function connexion($bdd)
{
    if (isset($_POST['email'], $_POST['mdp'])) {
        $email = strip_tags($_POST['email']);
        $mdp = $_POST['mdp'];




        $userstr = 'SELECT * FROM user WHERE email=:email';
        $userquery = $bdd->prepare($userstr);
        $userquery->bindValue(':email', $email, PDO::PARAM_STR);
        $userquery->execute();
        $bdduser = $userquery->fetch();
        if ($bdduser == false) {
            echo 'identifiant inexistant';
        } else {

            $passwordHash = $bdduser['mdp'];
            $password = password_verify($mdp, $passwordHash);

            if ($password == true) {
                echo 'connecter';
                $_SESSION['ID_role'] = $bdduser['ID_role'];
                $_SESSION['prenom'] = $bdduser['prenom'];
                $_SESSION['email'] = $email;
                $_SESSION['mdp'] = $password;

                header('Location:../public/index.php');
            } else {
                echo 'mots de passe faux';
            }
        }
    }
}

function ajout_image($bdd)
{

    if (isset($_POST['nom'])) {
        //Si il appuie sur Valider alors ..
        if ($_POST['validation']) {
            $nom = $_POST['nom'];
            //création de la variable du dossier ou l'image sera enregistré
            $uploads_dir = '../images';

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
                $userstr = 'SELECT * FROM img WHERE lien=:lien';
                $userquery = $bdd->prepare($userstr);
                $userquery->bindValue(':lien', $lien, PDO::PARAM_STR);
                $userquery->execute();
                $bdduser = $userquery->fetch();
                if ($bdduser == false) {

                    echo $nom;
                    echo $lien;
                    $queryprep = 'INSERT INTO img (ID_image,nom,lien) VALUES (null,:nom,:lien)';
                    $query = $bdd->prepare($queryprep);
                    $query->bindValue(':nom', $nom, PDO::PARAM_STR);
                    $query->bindValue(':lien', $lien, PDO::PARAM_STR);
                    $query->execute();
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
/**
 * sert a ajouter des ingredient avec leur image a la base de données
 *
 * @param [PDO] $bdd
 * @return void
 */
function ajout_ingredient($bdd)
{
    if (isset($_POST['nom'])) {

        $ingstr = 'SELECT * FROM ingredient WHERE nom=:nom';
        $ingquery = $bdd->prepare($ingstr);
        $ingquery->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $ingquery->execute();
        $bdding = $ingquery->fetch();
        if ($bdding == false) {
            ajout_image($bdd);
            $nom = strip_tags($_POST['nom']);
            $imgstr = 'SELECT * FROM img where nom=:nom';
            $imgquery = $bdd->prepare($imgstr);
            $imgquery->bindValue(':nom', $nom, PDO::PARAM_STR);
            $imgquery->execute();
            $bddimg = $imgquery->fetch();
            $ID_img = $bddimg['ID_image'];
            $nom = $_POST['nom'];
            $dispo = false;
            if (isset($_POST['dispo'])) {
                $dispo = true;
            }


            $queryprep = 'INSERT INTO ingredient (ID_ingredient,ID_image,nom,dispo) VALUES 
            (null,:ID_img,:nom,:dispo)';
            $query = $bdd->prepare($queryprep);
            $query->bindValue(':ID_img', $ID_img, PDO::PARAM_INT);
            $query->bindValue(':nom', $nom, PDO::PARAM_STR);
            $query->bindValue(':dispo', $dispo, PDO::PARAM_STR);
            $query->execute();
        } else {
            echo 'cette ingredients est deja enregister';
        }
    }
}
/**
 * sert a ajouter des categorie
 *
 * @param [PDO] $bdd
 * @return void
 */
function ajout_categorie($bdd)
{
    if (isset($_POST['nom'])) {
        //recuperation de la table categorie pour verifier si la categorie n'existe pas deja
        $catstr = 'SELECT * FROM categorie WHERE nom=:nom';
        $catquery = $bdd->prepare($catstr);
        $catquery->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $catquery->execute();
        $bddcat = $catquery->fetch();
        if ($bddcat == false) {
            //preparation des donnée pour remplir la table categorie
            ajout_image($bdd);
            $nom = strip_tags($_POST['nom']);
            // on recupere dans la table image l'id de l'image qui a le meme nom que la categorie
            $imgstr = 'SELECT * FROM img where nom=:nom';
            $imgquery = $bdd->prepare($imgstr);
            $imgquery->bindValue(':nom', $nom, PDO::PARAM_STR);
            $imgquery->execute();
            $bddimg = $imgquery->fetch();
            $ID_img = $bddimg['ID_image'];
            $nom = $_POST['nom'];
            $dispo = false;
            //on verifie la disponibilité du produit
            if (isset($_POST['dispo'])) {
                $dispo = true;
            }

            // apres avoir recuperer tout les données necessaire on les insert dans la table categorie
            $queryprep = 'INSERT INTO categorie (ID_categorie,ID_image,dispo,nom) VALUES 
            (null,:ID_img,:dispo,:nom)';
            $query = $bdd->prepare($queryprep);
            $query->bindValue(':ID_img', $ID_img, PDO::PARAM_INT);
            $query->bindValue(':nom', $nom, PDO::PARAM_STR);
            $query->bindValue(':dispo', $dispo, PDO::PARAM_BOOL);
            $query->execute();
        } else {
            echo 'cette categorie est deja enregister';
        }
    }
}
/**
 * sert a ajouter des produit dans la bdd
 *
 * @param [PDO] $bdd
 * @return void
 */
function ajout_produit($bdd)
{
    if (isset($_POST['nom'])) {
        $nom = $_POST['nom'];
        $prix = $_POST['prix'];
        $descrip = $_POST['description'];
        $cat = $_POST['cat'];

        $catstr = 'SELECT * FROM produit WHERE nom=:nom';
        $catquery = $bdd->prepare($catstr);
        $catquery->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $catquery->execute();
        $bddcat = $catquery->fetch();
        if ($bddcat == false) {
            //preparation des donnée pour remplir la table categorie
            ajout_image($bdd);
            // on recupere dans la table image l'id de l'image qui a le meme nom que la categorie
            $imgstr = 'SELECT * FROM img where nom=:nom';
            $imgquery = $bdd->prepare($imgstr);
            $imgquery->bindValue(':nom', $nom, PDO::PARAM_STR);
            $imgquery->execute();
            $bddimg = $imgquery->fetch();

            if (isset($bddimg['ID_image'])) {
                $ID_img = $bddimg['ID_image'];

                $nom = $_POST['nom'];
                $dispo = false;
                //on verifie la disponibilité du produit
                if (isset($_POST['dispo'])) {
                    $dispo = true;
                }
                // apres avoir recuperer tout les données necessaire on les insert dans la table categorie
                $produitprep = "INSERT INTO `produit` (`ID_produit`, `ID_categorie`, `ID_image`, `nom`, `prix`, `description`, `dispo`)
             VALUES (NULL, :ID_cat, :ID_img, :nom, :prix, :descrip, :dispo)";
                $prodquery = $bdd->prepare($produitprep);
                $prodquery->bindValue(':ID_cat', $cat, PDO::PARAM_INT);
                $prodquery->bindValue(':ID_img', $ID_img, PDO::PARAM_INT);
                $prodquery->bindValue(':nom', $nom, PDO::PARAM_STR);
                $prodquery->bindValue(':descrip', $descrip, PDO::PARAM_STR);
                $prodquery->bindValue(':prix', $prix, PDO::PARAM_INT);
                $prodquery->bindValue(':dispo', $dispo, PDO::PARAM_BOOL);
                $prodquery->execute();
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
    $catstr = 'SELECT * FROM categorie ';
    $catquery = $bdd->prepare($catstr);
    $catquery->execute();
    $bddcat = $catquery->fetchall();
    echo "<select class='cat' name='cat'>";
    echo '<option value="">' . "choisir une categorie" . '</option>';
    foreach ($bddcat as $resultat) {

        echo '<option value=' . $resultat['ID_categorie'] . '>' . $resultat['nom'] . '</option>';
    }

    echo '</select>';
}
