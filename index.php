<DOCTYPE HTML>
	<!DOCTYPE html>
	<html>
	<head>
		<title>DBC</title>
	</head>
	<body>
		<?php		
		try
		{
			$bdd = new PDO('mysql:host=localhost; dbname=colyseum; charset=utf8', 'root', 'SimplonERN17');
		}
		catch(Exception $e)
		{
			die('Erreur:' . $e->getMessage());
		}
		$reponse = $bdd->query('SELECT * FROM clients');
		$donnees = $reponse->fetchAll();		
		foreach ($donnees as $key => $value) {
			echo $value['lastName'].' '.$value['firstName'].'<br />';
		}
		$reponse->closeCursor();

		echo "<hr>";

		$reponse = $bdd->query('SELECT * FROM showTypes');
		$donnees = $reponse->fetchAll();		
		foreach ($donnees as $key => $value) {
			echo $value['type'].' '.'<br />';
		}
		$reponse->closeCursor();

		echo "<hr>";		
		
		//SELECT * FROM clients, cards WHERE cards.cardNumber = clients.cardNumber AND cards.cardTypesId = 1
		
		foreach ($bdd->query('SELECT*FROM clients, cards WHERE cards.cardNumber = clients.cardNumber AND cardTypesId = 1')as $value) {
				echo $value['lastName']." ".$value['firstName']."<br />";
				
			}
			echo "<hr>";

		//SELECT* FROM `clients` WHERE lastName LIKE 'M%'

		foreach ($bdd->query('SELECT* FROM `clients` WHERE lastName LIKE "M%"') as $value) {
			echo $value['lastName']."<br />";
		}
			echo "<hr>";
		//SELECT `title`, `performer`, `date`, `starttime` FROM shows
		//SELECT `title`, `performer`, `date`, `starttime` FROM shows ORDER BY title
		foreach ($bdd->query('SELECT `title`, `performer`, `date`, `starttime` FROM shows ORDER BY title') as $value) {
			echo $value['title']." ".$value['performer']." ".$value['date']." ".$value['starttime']."<br />";
		}
			echo "<hr>";
		foreach ($bdd->query('SELECT* FROM clients,cardTypes') as $value) {
			echo "Nom :".$value['lastName']."<br />";
			echo "Prenom :".$value['firstName']."<br />";
			echo "Date de Naissance:".$value['birthDate']."<br />";
			echo "Carte de fidélité :";
			echo "Numéro de carte :".$value['cardNumber']."<br />";
		}


		
		
		?>
	</body>
	</html>