<?php
		include("banco.php");
		$bd = new Banco();
		
		$sql = "select usuario.nome, feeds.codigo, feeds.comentario, feeds.codigo, feeds.data_feed, feeds.foto, feeds.type, feeds.codigo_usuario from feeds,usuario where ";
		$sql.= "feeds.codigo_usuario=usuario.codigo and ";
		$sql.= "usuario.selecao_favorita=".$_POST['selecao']." order by data_feed desc";
		
		
	    $resultado = mysql_query($sql);

		while($obj = mysql_fetch_array($resultado))
		{	

				echo "<table width: 800px;' style='border-top:1px solid; padding:5px 30px; margin-left:2px; color:#00923F; border-color:#f1f6e3;'>";
				echo "<tr><td class='width=60px'><img src='renderizaAvatar.php?id=".$obj['codigo_usuario'] ."' width='50px' height='50px' style='position:relative; float:left; margin-right: 10px'/></td><td><b style='font-size:14px; position:relative; float:left; margin-top:-30px'>".ucwords($obj['nome'])."</b><br><div style='font-size:13px; color:#adadad; text-align:left; margin-top:-25px; word-break:break-all'>".htmlspecialchars(stripslashes($obj['comentario']), ENT_QUOTES)."</div></td></tr>";
				echo "<tr style=''><td></td><td width='100px;' ></td></tr>";
				echo "<tr  height='10px'/>";
				if (!empty($obj['foto'])) {
					echo "<tr  height='40px' ><td></td><td ><center><img src='renderizaImagem.php?id=".$obj['codigo']."' width='400px' style='padding:10px; border:1px solid'></td></tr></div>";	
				}
				echo "<tr><td></td><td style='font-size:9px; color:#7e9c2f; text-align:left; float:right; padding-top:6px'>".date("d/m/Y H:i:s", strtotime($obj['data_feed']))."</td></tr>";
				echo "<tr  height='10px'/>";
				echo "<tr><td style='background-color:#f1f6e3;'></td><td width='800px;' style='background-color:#f1f6e3; padding:5px; color:#adadad; border-color:#f1f6e3;'><div style=''></div></td></tr>";	
				echo "</table>";				
				echo "</div>";
				echo "</hr>";
				//<a href='grava_golaco.php?cod_feed=".$obj['codigo']."'><img src='../icones/icone2.png' width='20px' /></a>

		}
		
?>
