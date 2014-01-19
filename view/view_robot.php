<?php
//a tester
	$bibli = new Bibliotheque();
	$parsing = new Parsing();
	$database = new dataBase();

	$tour = 50;
	for ($i=0; $i <	$tour; $i++){
		
		echo 'Tour numéro : '.$i.'<br/>'; 
		$lastlink = $database->selectLastUrl();
		//var_dump($lastlink);
		
		foreach ($lastlink[$i] as $liens) {
			echo 'liens : '.$liens.'<br/>';
			//$bibli->filtreUrl($liens);
			$parsing->setUrl($liens);
			$tab_link = $parsing->recupLinks();
			$database->insertURL($liens);
			//$database->insertData($nb_links, $title, $description, $h1, $keywords, $note_final);
			
		}
	}	
		

?>