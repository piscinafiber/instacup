
<?php
Session_Start();
mysql_connect("localhost", "tipboxar_arena", "@123xyz@");
mysql_select_db("tipboxar_instacup");
include("classUsuario.php");

if(isset($_POST['acao']))
{
	$usuario = $_POST['login'];
    $senha = $_POST['senha'];
	$senha2 = $_POST['senha2'];
    $pesquisar = mysql_query("SELECT * FROM usuario WHERE login = '$usuario'"); //conferimos se o login escolhido já não foi cadastrado
	$contagem = mysql_num_rows($pesquisar); //traz o resultado da consulta acima
 
if ( $contagem == 1 ) 
{
  $msg = "Login escolhido já cadastrado."; //se o login já existir, ele adiciona o erro
}
 
if ( $usuario == "" )
{
  $msg = "Você não digitou um login"; //confere se o campo login não ficou vazio
}
 
if ( $senha == "" )
{
  $msg = "Você não digitou uma senha"; //confere se o campo senha não ficou vazio
}
if ( $senha != $senha2 )
{
  $msg = "Você digitou 2 senhas diferentes.";
}
if ($msg == "") { //checa se houve ou não erros no cadastro
$usuario = new Usuario("",$_POST['login'],$_POST['comboSelecao'],$_POST['sexo'],$_POST['nome'],$_POST['avatar'], $_POST['email'], $_POST['senha'],$_POST['status'],"");

$resultado = $usuario->insere();
if($resultado)
$msg = "Usuario cadastrado com sucesso.";
else
$msg = "Falha ao cadastrar usuario.";
}
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
				<?php
if(isset($msg))
echo $msg;
?>
			<form method="post" action="cadUsuario.php">
				<label> Login: </label> <input type="text" name="login" /><br />
				<label> Sele&ccedil;&atilde;o favorita: </label> 
				<?php
				include("classSelecao.php");
				$user = new Selecao();

				$rs = mysql_query("SELECT codigo, nome FROM selecao ORDER BY nome");
				$user->montaCombo('comboSelecao', $rs, 'codigo', 'nome');
				?>
				<br />
				<label> Sexo:</label><input type="radio" name="sexo" value="Masculino"/> Masculino 
				<input type="radio" name="sexo" value="Feminino" /> Feminino 
				 <br />
				<label> Nome: </label> <input type="text" name="nome" /><br />
				<label> Avatar: </label><input type="text" name="avatar"/><br/><input type="file" name="foto" /><br>
				<label> Email: </label> <input type="text" name="email" /><br />
				<label> Senha: </label> <input type="password" name="senha" ><br>
				<label> Confirmar senha: </label><input type="password" name="senha2"><br>
				<label> Status: </label><br> <textarea cols="30" rows="7" name="status"></textarea>
				<br />
				<input type="submit" name="acao" value="Enviar" />
				<input type="reset" value="Apagar Campos">
				</form>
				</div>
			
			

</body>
</html>