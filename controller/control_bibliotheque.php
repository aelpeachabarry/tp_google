<?php

class Bibliotheque{

	public $note_final = 0;

	const TITLE = 3;
	const DESCR = 2;
	const LIEN = 0.1;
	const ALT = 1;
	const IMG = 0.5;

	public $url_valide = false;

	 public function filtreUrl($data){
		
		if(!filter_var($data, FILTER_VALIDATE_URL)){
  				echo "L'URL n'\est pas valide<br/>";
  				exit;
  		}
		else{
  				echo "L'URL est valide<br/>";
  				
  		}


	}


	public function writeLinks($data){
		$files = "fichiers/liens.txt";
		//creation du ficher avec touch() qui va creer le fichier et lui defini une date de creation puis de modif
		if(!file_exists($files)){

			$time = time();
			touch($files, $time);
		}
		if(is_array($data)){
			//ouvre le fichier en ecriture
			$handle = fopen($files, 'r+');
			//efface le contenu du fichier 
			ftruncate($handle,0);
			//ecriture dans le fichier
			$current = file_get_contents($files);
			foreach ($data as $lien){
				//$current .= $lien."<br/>".
				$current .= $lien."\n";
				file_put_contents($files, $current);

			}
			
			echo 'Ecriture finaliser';
		}
		else{
			echo 'Erreur lors de l\'ecriture';
		}


	}

	public function notation($titl, $descr, $lien, $alt, $img){

		if(empty($titl)){ $titl = ''; }else{ $titl = 3;}
		if($desc!= ''){ $descri = 3; }else{ $descri = ''; }
		$note_title = $titl * Bibliotheque::TITLE;
		$note_descr = $descri * Bibliotheque::DESCR;
		$note_lien = $lien * Bibliotheque::LIEN;
		$note_alt = $alt * Bibliotheque::ALT;
		$note_img = $img * Bibliotheque::IMG;
		$this->note_final = $note_title + $note_descr + $note_lien + $note_alt + $note_img;

		return $this->note_final; 
		

	}


}


?>