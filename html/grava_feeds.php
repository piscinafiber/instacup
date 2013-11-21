<?php 
	include("banco.php");

	$bd = new Banco();
	if($_POST['comentario']!=""){
	$sql = "insert into feeds set comentario='".addslashes($_POST['comentario'])."',codigo_usuario='".$_POST['codigo_usuario']."', data_feed='".date('Y-m-d H:i:s')."', foto='".$_POST['foto']."', type='".$_POST['tipo']."'";
	$resultado = mysql_query($sql);
	
	if($resultado==0)
	{
		echo "Falha ao cadastrar comentario.";
	}
}
else{
}
?>