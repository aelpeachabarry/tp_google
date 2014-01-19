<?php


		// connexion à la base de données
		try{

				$PARAM_hote='localhost'; //le chemin vers le serveur
				$PARAM_port='3306';
				$PARAM_nom_bd='tp_google'; //nom de la bd
				$PARAM_utilisateur='root';
				$PARAM_mot_passe=''; // mot de passe de l'utilisateur pour se connecter
				$connexion = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe); 

				$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			}
		catch(Exception $e){

			echo 'Erreur connexion : '.$e->getMessage();
		}

?>