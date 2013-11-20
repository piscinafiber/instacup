<?php
include("banco.php");
include("classSelecao.php");

$bd =  new Banco();
if(isset($_POST['acao']))
{
$selecao = new Selecao("",$_POST['sigla'],$_POST['chave'],$_POST['nome'],$_POST['continente']);
$resultado = $selecao->insere();
if($resultado)
$msg = "Seleção cadastrada com sucesso.";
else
$msg = "Falha ao cadastrar seleção.";
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
		<div id="content"><center><br><br><br>
		<div  style=' background-color:#f1f6e3;color:#7e9c2f; width:500px; height:350px;' ><br> <h1><IMG src='selecao.jpg' width='200'  style='border-radius:90px'><br>Jogador</h1><br><div  style=' background-color:#fff; width:330px; height:2px;'></div><br>
				<form method="post" action="cadSelecao.php">
				<label> Sigla: </label> <input type="text" name="sigla" /><br />
				<label> Nome: </label> <input type="text" name="nome" /><br>
				<label> Chave: </label><input type="radio" name="chave" value="A"> A 
				<input type="radio" name="chave" value="B"> B <br />
				<label> Continente: </label>
					<select name="continente"> 
						<option value="America">América
						<option value="Europa">Europa
						<option value="Africa">África
						<option value="Asia">Ásia
						<option value="Oceania">Oceania
					</select><br />
				<input type="submit" name="acao" value="Enviar" />
				<input type="reset" value="Apagar Campos">
			</form><br/>						
			</div></div>
			
			
<?php
if(isset($msg))
echo $msg;
?>
</body>
</html>