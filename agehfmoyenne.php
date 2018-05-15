    <?php

    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=initiationAuxDonnees;charset=utf8', 'root', 'stagiaire');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    $reponse = $bdd->query('SELECT last_name, birth_date, CURDATE(), TIMESTAMPDIFF(YEAR,birth_date,CURDATE()) AS age 
    FROM initiation_donnees WHERE birth_date is not NULL;');
    
        while ($donnees = $reponse->fetch())
        {
            echo '<tr><td>'.$donnees['last_name'].'</td><td>'.$donnees['age'].'ans</td></tr>'; '<br />';
        }
        $reponse->closeCursor();
    
    ?>

    <?php

    $moy = $bdd->query('SELECT gender, YEAR(NOW())-AVG(YEAR(birth_date)) AS moy_age from initiation_donnees where birth_date not in ("0000-00-00") GROUP BY gender ');

	while ($donnees = $moy->fetch())
	{
		echo '<tr><td>'.$donnees['gender'].'</td><td>'.ROUND($donnees['moy_age']).'Ans</td></tr><br>';
	}
	
	$moy->closeCursor();
    
    ?>