<?php
include('bdd.php');
?>
<?php
function getUsers($bdd)
{
    $userstr = 'SELECT * FROM user ';
    $userquery = $bdd->prepare($userstr);
    $userquery->execute();
    $bdduser = $userquery->fetchall();
    return $bdduser;
}

function getVilleByName($bdd, $ville)
{
    $selectstr = 'SELECT * FROM villes WHERE ville_nom=:ville';
    $selectquery = $bdd->prepare($selectstr);
    $selectquery->bindValue(':ville', $ville, PDO::PARAM_STR);
    $selectquery->execute();
    $bddarray = $selectquery->fetchall();
    foreach ($bddarray as $resultat) {
        $ville_id = $resultat['ville_id'];
        return $ville_id;
    }
}

function setNewUser($bdd, $password, $nom, $prenom, $email, $numero, $adresse, $ville_id)
{
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
}

function selectUserByEmail($bdd, $email)
{
    $userstr = 'SELECT * FROM user WHERE email=:email';
    $userquery = $bdd->prepare($userstr);
    $userquery->bindValue(':email', $email, PDO::PARAM_STR);
    $userquery->execute();
    $bdduser = $userquery->fetch();
    return $bdduser;
}


function selectImgByLien($bdd, $lien)
{
    $userstr = 'SELECT * FROM img WHERE lien=:lien';
    $userquery = $bdd->prepare($userstr);
    $userquery->bindValue(':lien', $lien, PDO::PARAM_STR);
    $userquery->execute();
    $bdduser = $userquery->fetch();
    return $bdduser;
}
function insertImg($bdd, $nom, $lien)
{
    $queryprep = 'INSERT INTO img (ID_image,nom,lien) VALUES (null,:nom,:lien)';
    $query = $bdd->prepare($queryprep);
    $query->bindValue(':nom', $nom, PDO::PARAM_STR);
    $query->bindValue(':lien', $lien, PDO::PARAM_STR);
    $query->execute();
}
function selectIngredientByname($bdd)
{
    $ingstr = 'SELECT * FROM ingredient WHERE nom=:nom';
    $ingquery = $bdd->prepare($ingstr);
    $ingquery->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
    $ingquery->execute();
    $bdding = $ingquery->fetch();
    return  $bdding;
}
function selectImgByName($bdd, $nom)
{

    $imgstr = 'SELECT * FROM img where nom=:nom';
    $imgquery = $bdd->prepare($imgstr);
    $imgquery->bindValue(':nom', $nom, PDO::PARAM_STR);
    $imgquery->execute();
    $bddimg = $imgquery->fetch();
    return $bddimg;
}
function insertIngredient($bdd, $ID_img, $nom, $dispo)
{
    $queryprep = 'INSERT INTO ingredient (ID_ingredient,ID_image,nom,dispo) VALUES 
    (null,:ID_img,:nom,:dispo)';
    $query = $bdd->prepare($queryprep);
    $query->bindValue(':ID_img', $ID_img, PDO::PARAM_INT);
    $query->bindValue(':nom', $nom, PDO::PARAM_STR);
    $query->bindValue(':dispo', $dispo, PDO::PARAM_STR);
    $query->execute();
}


function selectCategorie($bdd)
{
    $catstr = 'SELECT * FROM categorie ';
    $catquery = $bdd->prepare($catstr);
    $catquery->execute();
    $bddcat = $catquery->fetchall();
    return $bddcat;
}




function selectCategorieByName($bdd, $name)
{
    $catstr = 'SELECT * FROM categorie WHERE nom=:nom';
    $catquery = $bdd->prepare($catstr);
    $catquery->bindValue(':nom', $name, PDO::PARAM_STR);
    $catquery->execute();
    $bddcat = $catquery->fetch();
    return $bddcat;
}
function insertCategorie($bdd, $ID_img, $nom, $dispo)
{
    $queryprep = 'INSERT INTO categorie (ID_categorie,ID_image,dispo,nom) VALUES 
    (null,:ID_img,:dispo,:nom)';
    $query = $bdd->prepare($queryprep);
    $query->bindValue(':ID_img', $ID_img, PDO::PARAM_INT);
    $query->bindValue(':nom', $nom, PDO::PARAM_STR);
    $query->bindValue(':dispo', $dispo, PDO::PARAM_BOOL);
    $query->execute();
}
function selectProduitByName($bdd, $nom)
{
    $catstr = 'SELECT * FROM produit WHERE nom=:nom';
    $catquery = $bdd->prepare($catstr);
    $catquery->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
    $catquery->execute();
    $bddprod = $catquery->fetch();
    return $bddprod;
}
function insertProduit($bdd, $cat, $ID_img, $nom, $descrip, $prix, $dispo)
{
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
function selectProduitById($bdd)
{
    $userstr = 'SELECT * FROM produit WHERE ID_produit=:ID_produit';
    $userquery = $bdd->prepare($userstr);
    $userquery->bindValue(':ID_produit', $_GET['produit'], PDO::PARAM_INT);
    $userquery->execute();
    $bddproduit = $userquery->fetch();
    return $bddproduit;
}
