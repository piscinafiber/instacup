<?php
Session_Start();
mysql_connect("localhost", "tipboxar_arena", "@123xyz@");
mysql_select_db("tipboxar_instacup");
include("classJogador.php");

if(isset($_POST['acao']))
{
$jogador = new Jogador("",$_POST['selecao'],$_POST['nome'],$_POST['idade'],$_POST['posicao'],$_POST['dtnasc'],$_POST['local'],$_POST['nacionalidade'],$_POST['pe'],$_POST['apelido'],$_POST['clubeat'],$_POST['numero'],$_POST['foto']);
$resultado = $jogador->insere();
if($resultado)
$msg = "Novo jogador cadastrado com sucesso.";
else
$msg = "Falha ao cadastrar jogador.";
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
		<title>Instacup - Cadastrar Jogador</title>
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
		<div id="content"><center><br>
		<div  style=' background-color:#f1f6e3;color:#7e9c2f; width:500px; height:550px;' ><br> <h1><IMG src='jogador.jpg' width='100'  style='border-radius:90px'><br>Jogador</h1><br><div  style=' background-color:#fff; width:330px; height:2px;'></div><br>
		<table style="text-align:right">
		<form method="post" action="cadJogador.php">
			
				<tr style="text-align:right"><td>
					<label> Nome: </label></td><td> <input type="text" name="nome" size="25"/><br />
				</td></tr>
				<tr><td>
					<label> Idade: </label></td><td> <input type="text" name="idade" size="1"/><br />
				</td></tr>
				<tr><td>
					<label> Sele&ccedil;&otilde;es favorita: </label> </td><td><?php
					include("classSelecao.php");
					$user = new Selecao();

					$rs = mysql_query("SELECT codigo, nome FROM selecao ORDER BY nome");
					$user->montaCombo('comboSelecao', $rs, 'codigo', 'nome');
					?><br />
				</td></tr>
				<tr><td>				
					<label> Posi&ccedil;&atilde;o: </label></td><td> <input type="text" name="posicao" size="10"/><br />
				</td></tr>
				<tr><td>
					<label> Data de Nascimento: </label></td><td> <input type="text" name="dtnasc" size="7"/><br />
				</td></tr>
				<tr><td>
					<label> Nacionalidade: </label></td><td> <input type="text" name="nacionalidade" size="7"/><br />
				</td></tr>
				<tr><td>
					<label> Local de Nascimento: </label></td><td> <input type="text" name="local" size="10"/><br />
				</td></tr>
				<tr><td>
					<label> Pe: </label></td><td> <input type="text" name="pe" size="5" /><br />
				</td></tr>
				<tr><td>
					<label> Apelido: </label></td><td> <input type="text" name="apelido" /><br />
				</td></tr>
				<tr><td>
					<label> Clube Atual: </label></td><td> <input type="text" name="clubeat" /><br />
				</td></tr>
				<tr><td>
					<label> Numero: </label></td><td> <input type="text" name="numero" size="1"/><br />
				</td></tr>
				<tr><td>
					<label> Foto: </label> </td><td><input type="text" name="foto" /><br />
				</td></tr>
				<tr><td colspan="2"><center>
					<input type="submit" name="acao" value="Enviar" />
					<input type="reset" value="Apagar Campos">
				</td></tr>
				</table>
			</form>					
		</div></div>

			
	<?php
if(isset($msg))
echo $msg;
?>
</body>
</html>