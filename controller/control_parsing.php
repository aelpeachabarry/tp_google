<?php

class Parsing{

	public $url_format;
	private $url;
	public $tab_link;
	public $tab_img;
	public $h1;
	public $description;
	public $title;
	public $keywords;

	public function __construct(){
		$this->url_format = null;
		$this->url = null;
		$this->tab_link = array();
		$this->tab_img = array();
		$this->description = null;
		$this->h1 = null;
		$this->title = null;
		$this->keywords = null;

	}

	 public function setUrl($value) {
            return $this->url = $value;
     }

	 public function recupLinks(){
	 	//operationel
		$doc = new DOMDocument();
		$doc->loadHTMLFile($this->url);
		//parsing des liens
		echo 'Website : <b>'.$this->url.'</b><br/><br/>';
		$links = $doc->getElementsByTagName('a');
		$nb = 0;
		foreach ($links as $link){
		//nettoyage des url
		$ext = explode('.', $link->getAttribute('href'));
		$debut = explode('//', $link->getAttribute('href'));
		$ancre = stripos($link->getAttribute('href'), "#");
		$javascript = stripos($link->getAttribute('href'), "javascript");
		$mailto = stripos($link->getAttribute('href'), "/mailto:");
		$mail = stripos($link->getAttribute('href'), "/mail");
			if($ancre===false){
				if($link->getAttribute('href')!= ''){
					if($javascript===false){
						if($mailto===false){
							if($mail===false){
								if($ext[3] != 'jpg' || $ext[3] != 'png' || $ext[3] !='gif' && $ext[4] != 'jpg' || $ext[4] != 'png' || $ext[4] != 'gif'){
									if($debut[0] == 'http:' || $debut[0] == 'https:'){
										$link->getAttribute('href');
										$this->tab_link[] = $link->getAttribute('href');
										$nb++;
									}
									else{
											$this->url.$link->getAttribute('href');
											$this->tab_link[] = $this->url.$link->getAttribute('href');
											$nb++;
									}
								}
							}
						}
					}
				}
			}			
			
			
		}
		echo 'Liens : '.$nb.'<br/>';
		$this->tab_unique = array_unique($this->tab_link);
		var_dump($this->tab_unique);
		return $this->tab_link; 
			
	}

	 public function recupImg(){
	 	//fonctionnel
		$doc = new DOMDocument();
		$doc->loadHTMLFile($this->url);
		//parsing des images
		//echo '<h3>Les attributs alt</h3>';
		$links = $doc->getElementsByTagName('img');
		$img_nb = 0;
		foreach ($links as $link) {
			if($link->getAttribute('alt')!=''){
				$link->getAttribute('alt');
				$img_nb++;
				$this->tab_img[] = $link->getAttribute('alt');
			}//echo '<br/><br/>';
		}
		echo 'nb image : '.$img_nb.'<br/>';
		var_dump($this->tab_img);
		return $this->tab_img;
	}

	 public function recupH1(){
	 	//fonctionnel
		$doc = new DOMDocument();
		$doc->loadHTMLFile($this->url);
		//echo '<h3>Les H1</h3>';
		$h1_titre = $doc->getElementsByTagName('h1');
		foreach ($h1_titre as $h1) {
			$this->h1 = $h1->nodeValue;

		}
		var_dump($this->h1);
		return $this->h1;
			
	}

	 public function recupMeta(){
	 	//fonctionnel
		$tags = get_meta_tags($this->url);
		$this->description = $tags['description'];
		var_dump($this->description);
		return $this->description;
		
	}

	public function recupTitle(){
		//fonctionnel
		$content = file_get_contents($this->url);
		preg_match("/<title>(.*)<\/title>/i", $content, $res);
		$this->title = $res[1];
		var_dump($this->title);
		return $this->title;
	}

	public function recupKeywords(){
		//fonctionnel
		$tags = get_meta_tags($this->url);
		$this->keywords = $tags['keywords'];
		var_dump($this->keywords);
		return $this->keywords;
	}



}





?>