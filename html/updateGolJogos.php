<?php
if($_POST) {
	$g1 = $_POST['gol_time1'];
	$g2 = $_POST['gol_time2'];
	$codigo = $_POST['codigo'];
	include("banco.php");
	$bd = new Banco();
	$sql = "UPDATE jogos SET gol_time1='".$g1."',gol_time2='".$g2."' WHERE codigo = '".$codigo."'";
	$resultado = mysql_query($sql);
	if($resultado){
		echo 'Atualizado';
	} else {
		echo 'Erro ao atualizar';
	}
}