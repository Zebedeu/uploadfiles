# UploadFiles
Classe para carregar files 



## Usage

Create an image class that extends the class Uploads


require 'Uploads.php';

class Image extends Uploads {

private $img;

public function __construct($d){

		$this->img = $this->file($d);
	}

	public function img() {

		$this->img;
	}
}

Create an index.php file with the following contents:

```php
<?php


define('DS', DIRECTORY_SEPARATOR);

define('PV', 'Image' . DS);

define('DIR_FILE', PV  . DS);




require 'Upload/Image.php';

$d = new Image('Up');
echo $d->formUploadFiles($d->img());







