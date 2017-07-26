# UploadFiles
Classe para carregar files 

<?php


ini_set('display_errors', 1);
error_reporting(E_ALL);

define('DS', DIRECTORY_SEPARATOR);

define('PV', 'Image' . DS);

define('DIR_FILE', PV  . DS);




require 'Upload/Image.php';

$d = new Image('Up');
echo $d->formUploadFiles($d->img());

var_dump($d);




