<?php

    include("index.php");

    echo "<br>";
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

    $reponse = $bdd->query('SELECT country_code, COUNT(country_code) FROM initiation_donnees GROUP BY country_code ORDER BY COUNT(country_code) ASC');

    while ($donnees = $reponse->fetch())
    {

    echo $donnees['country_code'].' ' .$donnees['COUNT(country_code)']. '<br />';

    }
    $reponse->closeCursor(); // Termine le traitement de la requête

    ?>