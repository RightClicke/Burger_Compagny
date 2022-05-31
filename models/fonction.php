<?php

/**
 * fonction servant a s'inscrire
 *
 * @param [PDO] $bdd
 * @return void
 */
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
                    var_dump($nom);
                    var_dump($prenom);
                    var_dump($adresse);
                    var_dump($email);
                    var_dump($password);
                    var_dump($numero);



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
/**
 * sert a ce connecter
 *
 * @param [PDO] $bdd
 * @return void
 */
function connexion($bdd)
{
    if (isset($_POST['email'])) {
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
                $_SESSION['email'] = $email;
                $_SESSION['mdp'] = $password;

                header('Location:index.php');
            } else {
                echo 'mots de passe faux';
            }
        }
    }
}
/**
 * sert a ajouter des image a la base de données
 *
 * @param [pdo] $bdd
 * @return void
 */
function ajout_image($bdd)
{

    if (isset($_POST['nom'])) {
        //Si il appuie sur Valider alors ..
        if ($_POST['validation']) {
            $nom = $_POST['nom'];
            //création de la variable du dossier ou l'image sera enregistré
            $uploads_dir = '../image';

            //Récupération du nom de l'image
            $name = $_FILES["image"]["name"];
            $name = str_replace(' ', '_', $name);
            //mettre l'image dans le dossier precedemment donnée dans la variable et le nommé ensuite
            //par son nom recuperer aussi precedemment
            move_uploaded_file($_FILES["image"]["tmp_name"], "$uploads_dir/$name");
            //mettre le chemin de l'image dans variable
            $lien = "$uploads_dir/$name";
            if (exif_imagetype($lien) == IMAGETYPE_JPEG) {
                //eviter qu'une photo en base de donné soit enregistrer a nouveaux
                $userstr = 'SELECT * FROM img WHERE lien=:lien';
                $userquery = $bdd->prepare($userstr);
                $userquery->bindValue(':lien', $lien, PDO::PARAM_STR);
                $userquery->execute();
                $bdduser = $userquery->fetch();
                if ($bdduser == false) {
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

        $catstr = 'SELECT * FROM categorie WHERE nom=:nom';
        $catquery = $bdd->prepare($catstr);
        $catquery->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $catquery->execute();
        $bddcat = $catquery->fetch();
        if ($bddcat == false) {
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


            $queryprep = 'INSERT INTO categorie (ID_categorie,ID_image,dispo,nom) VALUES 
            (null,:ID_img,:dispo,:nom)';
            $query = $bdd->prepare($queryprep);
            $query->bindValue(':ID_img', $ID_img, PDO::PARAM_INT);
            $query->bindValue(':nom', $nom, PDO::PARAM_STR);
            $query->bindValue(':dispo', $dispo, PDO::PARAM_STR);
            $query->execute();
        } else {
            echo 'cette categorie est deja enregister';
        }
    }
}
