 
 <?php
    $host = 'localhost';
    $dbname = 'burgercompany';
    $user = 'root';
    $mdp = '';
    $charset = 'utf8';
    try {
        $bdd = new PDO("mysql:host=$host;dbname=$dbname", $user, $mdp);
    } catch (PDOException $fail) {
        echo 'erreur:' . $fail->getMessage();
        die();
    }
    ?>