# UploadFiles
Classe para carregar files 

<?php 

class Image extends Uploads {

public $img;

public function __construct($d){
		$this->img = $this->file($d);
}

	public function img() {

		$this->img;
	}
}
