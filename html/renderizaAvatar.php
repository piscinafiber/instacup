<?php 
	include("banco.php");
	$id = $_GET['id'];
	$bd = new Banco();
	$sql = "select usuario.avatar, usuario.type_avatar from usuario where ";
	$sql.= "usuario.codigo = ".$id;
	$resultado = mysql_query($sql);
	$imagem = mysql_fetch_row($resultado);
	header('Content-Type: '.$imagem[1]);
	$image = $imagem[0];
	$image = str_replace(' ','+',$image);
	echo base64_decode($image);