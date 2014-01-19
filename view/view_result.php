<?php
//annuler les warning
error_reporting(E_ERROR | E_PARSE);
if($_POST["search"] && !empty($_POST["search"])){
	$bibli = new Bibliotheque();
	$bibli->filtreUrl($_POST["search"]);
	$parsing = new Parsing();
	//on initialise l'attribut variable de la classe
	$parsing->setUrl($_POST["search"]);
	//on recupère l'array avec tous les lien de la page
	$tab_link = $parsing->recupLinks();
	$tab_img = $parsing->recupImg();
	$h1 = $parsing->recupH1();
	$description = $parsing->recupMeta();
	$title = $parsing->recupTitle();
	$keywords = $parsing->recupKeywords();
	$nb_img = sizeof($tab_img);
	$nb_link = sizeof($tab_link);
	$note_final = $bibli->notation($title, $description, $nb_link, $nb_img, $nb_img);
	echo '<br/><b>RANK</b> : '.$note_final;
 	$database = new Database();
	foreach ($tab_link as $lien) {
		$database->insertURL($lien);
	}

	
}
	

?>