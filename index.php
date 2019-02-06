<?php

	// recibimos por método get (URL) el modelo y la operación a pedir
	$mod = $_GET["mod"] ?? "usuario" ; // modelo
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
	}