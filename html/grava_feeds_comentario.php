<?php 
	include("banco.php");

	$bd = new Banco();
	if($_POST['comentario']!=""){
	$sql = "insert into feed_jogo set comentario='".addslashes($_POST['comentario'])."', data_feed='".date('Y-m-d H:i:s')."', codigo_jogo='".$_POST['codigo'];
	$resultado = mysql_query($sql);
	
	if($resultado==0)
	{
		echo "Falha ao cadastrar comentario.";
	}
}
else{
}
?>