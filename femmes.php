<?php

    // Connexion base de données
    $host_name = "localhost";
    $database = "initiationAuxDonnees";
    $user_name = "root";
    $password = "stagiaire";

    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=initiationAuxDonnees;charset=utf8', 'root', 'stagiaire');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    // On récupère tout le contenu de la table des données
    $reponse = $bdd->query('SELECT * FROM initiation_donnees WHERE gender =\'Female\'');
    while ($donnees = $reponse->fetch())
    {
        echo '<p>'.$donnees['id'].' ';
        echo ''.$donnees['first_name'].' ';
        echo ''.$donnees['last_name'].' ';
        echo ''.$donnees['email'].' ';
        echo ''.$donnees['gender'].' ';
        echo ''.$donnees['ip_address'].' ';
        echo ''.$donnees['birth_date'].' ';
        echo ''.$donnees['zip_code'].' ';
        echo ''.$donnees['avatar_url'].' ';
        echo ''.$donnees['state_code'].' ';
        echo ''.$donnees['country_code'].'</p>';
    }
    $reponse->closeCursor();

    ?>