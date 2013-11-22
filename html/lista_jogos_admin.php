<?php
mysql_connect("localhost", "tipboxar_arena", "@123xyz@");
mysql_select_db("tipboxar_instacup");
include("classJogos.php");
$jogos = new Jogos();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		 <meta charset="utf-8" />
		<link rel="stylesheet" href="./css/animate.css"> <!-- Optional -->
		<link rel="stylesheet" href="./css/liquid-slider.css">
		<meta http-equiv="Content-Type" content="text/xhtml; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="style.css"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="text/javascript" src="jquery-1.4.2.min.js"></script>
		<link href="css/screen.css" rel="stylesheet" type="text/css" media="screen" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/easySlider1.7.js"></script>
		<title>Instacup - ADM</title>
        <script type="text/javascript">
			
			$( document ).ready( function(){
				
				$( "#cabecalho" ).load( "cabecalhoadm.html" );
				$( "#rodape" ).load( "rodape.html" );
			});
			$(document).ready(function(){	
			$("#slider").easySlider({
				auto: true, 
				continuous: true
			});
		});	
		
        </script>
	</head>
<body background="../../../imagens/campo.jpg" > 

        <div id="cabecalho"></div>
		<div id="content">
		<?php




// <tr>
// <th>Código</th>
// <th>Estadio</th>
// <th>Local</th>
// <th>Data</th>
// <th>Hora</th>
// <th>Time 1</th>
// <th>Time 2</th>
// <th>Gols time 1</th>
// <th>Gols time 2</th>
// <th></th>
// </tr>";

$count=1;

$resultado = $jogos->executaLista();

while($dados=mysql_fetch_assoc($resultado))
{
	echo "<form name='form".$count."' method='post' action ='salva_gol.php?count=".$count.">";
	echo "<table border='1'>";
	echo "<tr>";
	echo "<td>".$dados['codigo']."</td>";
	echo "<td>".$dados['estadio']."</td>";
	echo "<td>".$dados['local']."</td>";
	echo "<td>".$dados['data']."</td>";
	echo "<td>".$dados['hora']."</td>";
	echo "<td>".$dados['time1']."</td>";
	echo "<td>".$dados['time2']."</td>";
	echo "<td><input type='text' name='gol_time1[".$count."]' value='".$dados['gol_time1']."'></td>";
	echo "<td><input type='text' name='gol_time2[".$count."]' value='".$dados['gol_time2']."'></td>";
	echo "<td><input type='submit' name='acao' value='Salva resultado'></td>";
	echo "</tr>";
	echo '</table>';
	echo "</form>";
	$count++;
}
?>
</div>
	
</body>
</html>