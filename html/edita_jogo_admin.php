<?php
Session_Start();
$codigo=$_GET['cod'];
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
		<div id="Titulo" ><center><h1>Partida</h1></div>
		<div id="abaixoTitulo"></div>
<table>
<?php
include("banco.php");
$bd = new Banco();
include("classJogos.php");
$jogos = new Jogos();
echo $codigo;
if(isset($_POST['acao']))
	{
	echo "esse é o código: ".$codigo."<br>";
		$sql= "update jogos set gol_time1 = (select max(gol_time1)) +1 where codigo =".$codigo;
		$resultado = mysql_query($sql);
		echo $resultado;
			if($resultado==0)
				{
					echo $codigo;
					$obj['codigo'];
					echo "Falha ao cadastrar comentario.";
				}
		}
	echo"<form method='post' action='edita_jogo_admin.php'>
		<tr>
			<td><input type='submit' name='acao' value='Enviar' /> </td>
		</form>
	<form method='post' action='adiciona_gol_time2.php'>	
			<td><input type='button' name='acao' value='+'/></td>
	</form>";
	?>
	</tr>
	
</table>
</div>
</div>
	
</body>
</html>