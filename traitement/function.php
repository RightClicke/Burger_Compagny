<?php
function inscription($bdd)
{
    $ok = false;
    if (isset($_POST['adresse'])) {
        $mot_de_passe = $_POST['mdp'];
        $nom = strip_tags($_POST['nom']);
        $prenom = strip_tags($_POST['prenom']);
        $email = strip_tags($_POST['email']);
        $numero = $_POST['numero'];
        $adresse = strip_tags($_POST['adresse']);
        $ville = strip_tags($_POST['ville']);
    }


    if ($_POST['mdp'] == $_POST['mdp2']) {


        $bdduser = getUsers($bdd);
        foreach ($bdduser as $resultat) {
            if ($email == $resultat['email']) {
                $ok = true;
            }
        }

        $password = password_hash($mot_de_passe, PASSWORD_BCRYPT);

        if ($ok == false) {

            $id_ville = getVilleByName($bdd, $ville);

            if (isset($ville_id)) {
                setNewUser($bdd, $password, $nom, $prenom, $email, $numero, $adresse, $ville_id);
                echo ('ok');

                // header('Location:index.php');
            } else {
                echo 'ville pas reconnue';
            }
        } else {
            echo 'email deja utiliser';
        }
    } else {
        echo 'mail ou mdp different';
    }
}
function connexion($bdd)
{
    if (isset($_POST['email'], $_POST['mdp'])) {
        $email = strip_tags($_POST['email']);
        $mdp = $_POST['mdp'];

        $bdduser = selectUserByEmail($bdd, $email);
        if ($bdduser == false) {
            echo 'identifiant inexistant';
        } else {

            $passwordHash = $bdduser['mdp'];
            $password = password_verify($mdp, $passwordHash);

            if ($password == true) {
                echo 'connecter';
                $_SESSION['user']['ID_role'] = $bdduser['ID_role'];
                $_SESSION['user']['email'] = $email;
                $_SESSION['user']['mdp'] = $password;
                return $_SESSION['user'];
            } else {
                echo 'mots de passe faux';
            }
        }
    }
}
function creationPanier()
{
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = array();
        $_SESSION['panier']['nomproduit'] = array();
        $_SESSION['panier']['qteproduit'] = array();
        $_SESSION['panier']['prix'] = array();
    }
    return true;
}
function ajouterArticle($nomproduit, $qteproduit, $prix)
{

    //Si le panier existe
    if (creationPanier()) {
        //Si le produit existe déjà on ajoute seulement la quantité
        $positionProduit = array_search($nomproduit,  $_SESSION['panier']['nomproduit']);

        if ($positionProduit !== false) {
            $_SESSION['panier']['qteproduit'][$positionProduit] += $qteproduit;
        } else {
            //Sinon on ajoute le produit
            array_push($_SESSION['panier']['nomproduit'], $nomproduit);
            array_push($_SESSION['panier']['qteproduit'], $qteproduit);
            array_push($_SESSION['panier']['prix'], $prix);
        }
    } else
        echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

function supprimerArticle($nomproduit)
{
    //Si le panier existe
    if (creationPanier()) {
        //Nous allons passer par un panier temporaire
        $tmp = array();
        $tmp['nomproduit'] = array();
        $tmp['qteproduit'] = array();
        $tmp['prix'] = array();



        for ($i = 0; $i < count($_SESSION['panier']['nomproduit']); $i++) {
            if ($_SESSION['panier']['nomproduit'][$i] !== $nomproduit) {
                array_push($tmp['nomproduit'], $_SESSION['panier']['nomproduit'][$i]);
                array_push($tmp['qteproduit'], $_SESSION['panier']['qteproduit'][$i]);
                array_push($tmp['prix'], $_SESSION['panier']['prix'][$i]);
            }
        }
        //On remplace le panier en session par notre panier temporaire à jour
        $_SESSION['panier'] =  $tmp;
        var_dump($_SESSION['panier']);
        //On efface notre panier temporaire
        unset($tmp);
    } else
        echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}
