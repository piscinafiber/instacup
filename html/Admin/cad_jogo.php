<?php
//certo
mysql_connect("localhost", "tipboxar_arena", "@123xyz@");
mysql_select_db("tipboxar_instacup");
include("classJogos.php");

if(isset($_POST['acao']))
{
$jogos = new Jogos("",$_POST['estadio'],$_POST['local'],$_POST['data'],$_POST['hora']);
$resultado = $jogos->insere();
if($resultado)
$msg = "Jogo cadastrado com sucesso.";
else
$msg = "Falha ao cadastrar jogo.";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//PT"
	  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
		<title>Instacup - Fonte Nova</title>
        <script type="text/javascript">
			
			$( document ).ready( function(){
				
				$( "#cabecalho" ).load( "cabecalho.php" );
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
		<div id="content"><center><br><br><br>
			<form method="post" action="cad_jogo.php">
<label> Estadio: </label>
<select name="estadio"> 
   	<option value="Estadio Nacional de Brasilia">Estádio Nacional de Brasilia
   	<option value="Estadio do Maracana">Estadio do Maracana
   	<option value="Estadio Castelao">Estadio Castelao
   	<option value="Arena Pernambuco">Arena Pernambuco
	<option value="Arena Fonte Nova">Arena Fonte Nova
	<option value="Estadio Mineirão">Estádio Mineirao
</select><br><br>
<label> Local: </label> <input type="text" name="local" /><br><br>
<label> Data: </label> <input type="text" name="data" /><br><br>
<label> Hora: </label> <input type="text" name="hora" /><br><br>
<label> Time 1: </label><select name="time1"> 
   	<option value="Brasil ">Brasil 
   	<option value="Italia">Italia
   	<option value="Japao">Japão
   	<option value="Mexico">Mexico
	<option value="Espanha">Espanha
	<option value="Uruguai">Uruguai
	<option value="Nigeria">Nigeria
	<option value="Taiti">Taiti
</select><br><br>
<label> Time 2: </label><select name="time2"> 
   	<option value="Brasil">Brasil 
   	<option value="Italia">Italia
   	<option value="Japao">Japao
   	<option value="Mexico">Mexico
	<option value="Espanha">Espanha
	<option value="Uruguai">Uruguai
	<option value="Nigeria">Nigeria
	<option value="Taiti">Taiti
</select><br><br>
<input type="submit" name="acao" value="Enviar" />
<input type="reset" value="Apagar Campos">
</form>						
			</div>
			
			
<?php
if(isset($msg))
echo $msg;
?>
</body>
</html>