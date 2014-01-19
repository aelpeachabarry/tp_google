<?php

class dataBase{

	public $lastlink = array();

	public function insertData($nb_liens, $webtitle, $webdescr, $webh1, $keyw, $webrank){

		global $connexion;
		

		try{

    		$req = $connexion->prepare('INSERT INTO data (DAT_nb_links, DAT_title, DAT_descr, DAT_h1, DAT_keywords, DAT_rank) VALUES( :DAT_nb_links, :DAT_title, :DAT_descr, :DAT_h1, :DAT_keywords, :DAT_rank)');
			$variables = array(
			    ':DAT_nb_links' => $nb_liens,
			    ':DAT_title' => $webtitle,
			    ':DAT_descr' => $webdescr,
			    ':DAT_h1' => $webh1,
			    ':DAT_keywords' => $keyw,
			    ':DAT_rank' => $webrank
			    );

			$req->closeCursor();
		}catch( Exception $e){

		        echo 'Une erreur de requete';
		        die();
		}

	}

	public function insertURL($weburl){

		global $connexion;
		

		try{

    		$req = $connexion->prepare('INSERT INTO url (URL_url) VALUES (:URL_url)');
			$variables = array(
			    ':URL_url' => $weburl
			    );
			$req->execute($variables);
			$req->closeCursor();
		}catch(Exception $e){

		        echo 'Une erreur de requete';
		        die();
		}

	}

	public function selectLastUrl(/*$debut, $fin*/){

		global $connexion;
		

		try{

    		$req = $connexion->query('SELECT URL_url FROM url ORDER BY URL_date DESC LIMIT 0, 49');
    		/*$variables = array(
			    ':debut' => $debut,
			    ':fin' => $fin
			    );*/
    		/*$req->execute($variables);*/
    		$this->lastlink = $req->fetchAll();
    		//var_dump($this->lastlink);
    		return $this->lastlink;
			$req->closeCursor();

			
		}catch( Exception $e){

		        echo 'Une erreur de requete';
		        die();
		}

	}


	public function selectOtherUrl(/*$debut, $fin*/){

		global $connexion;
		

		try{

    		$req = $connexion->query('SELECT URL_url FROM url ORDER BY URL_date DESC LIMIT 1, 2');
    		/*$variables = array(
			    ':debut' => $debut,
			    ':fin' => $fin
			    );*/
    		/*$req->execute($variables);*/
    		$this->lasturl = $req->fetch();
    		$this->lastlink = $this->lasturl['URL_url'];
    		return $this->lastlink;
			$req->closeCursor();

			
		}catch( Exception $e){

		        echo 'Une erreur de requete';
		        die();
		}

	}

}
?>