<?php
include("banco.php");
$bd = new Banco();	

$consulta = mysql_query("SELECT time, vitorias, empates, derrotas, saldo_de_gols,pontos FROM tabelas WHERE time = 'time A'"); 
$venceu = 'false';
if($venceu == 'true') {

$pontos = $pontos + 3;

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//PT"
	  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
		<meta charset="ISO-8859-1" />
		<link rel="stylesheet" href="./css/animate.css"> <!-- Optional -->
		<link rel="stylesheet" href="./css/liquid-slider.css">
		<meta http-equiv="Content-Type" content="text/xhtml; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="style.css"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="text/javascript" src="jquery-1.4.2.min.js"></script>
		<title>InstaCup - Tabela </title>
        <script type="text/javascript">
			
			$( document ).ready( function(){
				
				$( "#cabecalho" ).load( "cabecalho.php" );
				$( "#rodape" ).load( "rodape.html" );
			});
			$(function(){
			 $('#slider-id').liquidSlider();
			});
		
        </script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="./js/jquery.easing.1.3.js"></script>
		<script src="./js/jquery.touchSwipe.min.js"></script>
		<script src="./js/jquery.liquid-slider.min.js"></script>
		<script>
		</script>
	</head>
<body> 

        <div id="cabecalho" style="height:100%"></div>
		
		<div id="content">
			<div id="Titulo" ><center><h1>Tabela</h1></center></div>
			<div id="abaixoTitulo"></div><br>
			<?php
					echo "<center><table  style='border:1px solid; padding:5px; margin-left:2px; color:#00923F; border-color:#f1f6e3 ;width: 700px;'>";	
							echo "<tr height='20px'style='background-color:#f1f6e3'><th colspan='7'></th></tr>";	
							echo "<th style='background-color:#f1f6e3'>Selecao</th>";	
							echo "<th style='background-color:#f1f6e3' width: '70px' >Brasao</th>";
							echo "<th style='background-color:#f1f6e3'>Vitorias</th>";	
							echo "<th style='background-color:#f1f6e3'>Empates</th>";	
							echo "<th style='background-color:#f1f6e3'>Derrotas</th>";	
							echo "<th style='background-color:#f1f6e3'>SG</th>";	
							echo "<th style='background-color:#f1f6e3'>Pontos</th></tr>";					
				$sql = "SELECT time,  vitorias, empates, derrotas, saldo_de_gols,pontos FROM tabelas order by pontos desc";		
				$resultado = mysql_query($sql);
				while($obj = mysql_fetch_array($resultado))
				{	
							
							echo "<tr  height='10px'/>";
							echo "<tr  height='10px'/>";
						
							echo "<td>".$obj['time']."</td>";	
							// echo "<td>".$obj['fototime']."</td>";	
							echo "<td>".$obj['vitorias']."</td>";	
							echo "<td>".$obj['empates']."</td>";	
							echo "<td>".$obj['derrotas']."</td>";	
							echo "<td>".$obj['saldo_de_gols']."</td>";	
							echo "<td>".$obj['pontos']."</td></tr>";
							echo "<tr  height='10px'/>";
							echo "<tr  height='10px'/>";
							
								}
				echo "</table>";				
	echo "</div>";
							echo "</hr>";
			?>
		</div>
			
			
<?php
if(isset($msg))
echo $msg;
?>
</body>
</html>