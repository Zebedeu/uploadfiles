# UploadFiles
Classe para carregar files 

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Zebedeu/uploadfiles/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Zebedeu/uploadfiles/?branch=master)
[![Build Status](https://travis-ci.org/Zebedeu/uploadfiles.svg?branch=master)](https://travis-ci.org/Zebedeu/uploadfiles)

> Estatísticas

[![Total Downloads](https://poser.pugx.org/Zebedeu/uploadfiles/downloads)](https://packagist.org/packages/Zebedeu/uploadfiles)
[![Daily Downloads](https://poser.pugx.org/Zebedeu/uploadfiles/d/daily)](https://packagist.org/packages/Zebedeu/uploadfiles)
[![Monthly Downloads](https://poser.pugx.org/Zebedeu/uploadfiles/d/monthly)](https://packagist.org/packages/Zebedeu/uploadfiles)


## Usage

Create an image class that extends the class Uploads

```php
<?php

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

?>

Create an index.php file with the following contents:

<?php


define('DS', DIRECTORY_SEPARATOR);

define('PV', 'Image' . DS);

define('DIR_FILE', PV  . DS);




require 'Upload/Image.php';

$d = new Image('Up');
echo $d->formUploadFiles($d->img());







