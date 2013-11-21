<?php 
	include("banco.php");
	$id = $_GET['id'];
	$bd = new Banco();
	$sql = "select feeds.foto, feeds.type from feeds where ";
	$sql.= "feeds.codigo = ".$id;
	$resultado = mysql_query($sql);
	$imagem = mysql_fetch_row($resultado);
	header('Content-Type: image/jpeg');
	$image = $imagem[0];
	$image = str_replace(' ','+',$image);
	echo base64_decode($image);