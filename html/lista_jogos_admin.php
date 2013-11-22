<?php
	include("banco.php");
	$bd = new Banco();
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
		<style type="text/css">
		form div{
			position: relative;
			float: left;
		}
		</style>
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

		function atualiza_placar(codigo, that)
		{	
			console.log(codigo);
			
			console.info();
			console.info();
				$.ajax({
					url : 'updateGolJogos.php',
					type: 'POST',
					data : ({
						codigo : codigo,
						gol_time1 : $(that).parents('tr:first').find('input[name=gol_time1]').val(),
						gol_time2 : $(that).parents('tr:first').find('input[name=gol_time2]').val()
					}),
					success: function (response){
						alert(response);
					}
				})
		}
		
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
echo "<table border='1' style='margin-top:20px; margin-left:10px'>";
	
while($dados=mysql_fetch_assoc($resultado))
{
	echo "<tr>";
	echo "<td>".$dados['selecao1_nome']."</td>";
	echo "<td>&nbsp;&nbsp; X &nbsp;&nbsp;</td>";
	echo "<td>".$dados['selecao2_nome']."</td>";
	echo "<td>&nbsp;".date("d/m/Y", strtotime($dados['data']))."</td>";
	echo "<td> &nbsp;".$dados['hora']."&nbsp;&nbsp;</td>";
	echo "<td><input type='text' name='gol_time1' value='".$dados['gol_time1']."'></td>";
	echo "<td><input type='text' name='gol_time2' value='".$dados['gol_time2']."'></td>";
	echo "<td><input type='button' name='acao' onClick='atualiza_placar(".$dados['codigo'].",this)' value='Salva resultado'></td>";
	echo "</tr>";
	$count++;
}
	echo "</table>";
?>
</div>
	
</body>
</html>