<?php	
	include("banco.php");
	$bd = new Banco();	
	echo $_POST['codigo'];
	$sql = "select comentario, data_feed from feed_jogo where codigo_jogo=3 order by data_feed desc";		
	$resultado = mysql_query($sql);
	while($obj = mysql_fetch_array($resultado))
	{	
				echo "<center><table  style='border:1px solid; padding:5px; margin-left:2px; color:#00923F; border-color:#f1f6e3 ;width: 700px;'>";
				echo "<tr  height='10px'/>";
				echo "<tr  height='10px'/>";
				
				echo "<tr><td>".htmlspecialchars(stripslashes($obj['comentario']), ENT_QUOTES)."<div style='font-size:8px; color:#7e9c2f; text-align:left; float:right; padding-top:6px'>".$obj['data_feed']."</div></td></tr>";	
				echo "<tr  height='10px'/>";
				echo "<tr  height='10px'/>";
				echo "</table>";				
				echo "</div>";
				echo "</hr>";
	}
?>
