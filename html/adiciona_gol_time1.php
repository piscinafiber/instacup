<?php
Session_Start();
		include("banco.php");
		$bd = new Banco();
		$sql= "update jogos set gol_time1 = (select max(gol_time1)) +1 where codigo =1";	
		echo $sql;
		$resultado = mysql_query($sql);
		echo $resultado;
			if($resultado==0)
				{
					$obj['codigo'];
					echo "Falha ao cadastrar comentario.";
				}

?>