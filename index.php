<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'Upload/Uploads.php';



if(!empty($_FILES['archive'])) {

	$new = new Uploads();
	$new->file("teste");
}?>

<form action="#" method="post" enctype="multipart/form-data">
	<input type="file" name="archive[]">
	<input type="submit" name="enviar">
</form>
</body>
</html>