# UploadFiles
Classe para carregar files 

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/apweb/uploadflies/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/apweb/uploadflies/?branch=master)
[![Code Climate](https://codeclimate.com/github/apweb/uploadflies/badges/gpa.svg)](https://codeclimate.com/github/apweb/uploadflies)
[![Build Status](https://travis-ci.org/apweb/uploadflies.svg?branch=master)](https://travis-ci.org/apweb/uploadflies)

> Estatísticas

[![Total Downloads](https://poser.pugx.org/preetender/routing/downloads)](https://packagist.org/packages/apweb/uploadflies)
[![Daily Downloads](https://poser.pugx.org/apweb/uploadflies/d/daily)](https://packagist.org/packages/apweb/uploadflies)
[![Monthly Downloads](https://poser.pugx.org/apweb/uploadflies/d/monthly)](https://packagist.org/packages/apweb/uploadflies)


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







