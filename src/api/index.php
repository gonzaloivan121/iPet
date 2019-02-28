<?php

	require_once "../modelo/Mascota.php" ;

	$apiKey = "11577499-dfaa06698c89492b69a0e6379" ;

	$queue = "https://pixabay.com/api?lang=es&category=animals&key=".$apiKey ;

	if (isset($_GET["q"])) {
		$queue .= "&q=".$_GET["q"] ;
	}

	print_r($queue) ;

	//$curl = curl_init() ;

	//curl_setopt($curl, CURLOPT_URL, $queue) ;

	$obj = json_decode(file_get_contents($queue)) ;

	$imgObjArray = $obj->hits ;
	$imgArray = array() ;

	foreach ($imgObjArray as $imgObj) {
		/*?>
			<img src='<?= $imgObj->largeImageURL ?>'>
		<?php*/
		array_push($imgArray, $imgObj->largeImageURL) ;
	}

	foreach ($imgArray as $img) {
		?>
			<img src='<?= $img ?>'>
		<?php
	}

	/*
	// recibimos por método get (URL) el modelo y la operación a pedir
	$mod = $_GET["mod"] ?? "tablero" ; // modelo
	$ope = $_GET["ope"] ?? "index" 	; // operación (método del modelo)

	// importar el controlador
	require_once "controlador/$mod/controller.$mod.php" ;

	//
	$nme = "controller$mod" ;

	// crear el controlador
	$cont = new $nme() ;

	// llamamos al método correspondiente
	if (method_exists($cont, $ope)) {
		$cont->$ope() ;
	} else {
		die("***ERROR: Se ha producido un error en la Aplicación.") ;
	}*/

	?>