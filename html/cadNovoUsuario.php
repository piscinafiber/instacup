<?php
//certo
include("banco.php");
include("classUsuario.php");

$bd =  new Banco();
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
if ( $msg == "" ) {
if(isset($_POST['acao']))
{
$usuario = new Usuario("",$_POST['login'],$_POST['selecaof'],$_POST['sexo'],$_POST['nome'],$_POST['avatar'], $_POST['email'], $_POST['senha'],$_POST['status'],"");
$resultado = $usuario->insere();
if($resultado)
$msg = "Novo torcedor cadastrado com sucesso.";
else
$msg = "Falha ao cadastrar torcedor.";
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//PT"
	  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<meta charset="utf-8">
	<title>Instacup - Cadastrar Novo Torcedor</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css"></style>
</head>
<body>
	<div id="wrapper">
			<div id="main">
			<div id="header">
				
				<IMG src="LOGOMARCAp2.jpg"/>
			</div>
			<div id="header2">
			<div id="botoes">
			<A href="quemsomos.html"><img src="apito.jpg" height= "20px" /></A>	&nbsp&nbsp&nbsp&nbsp
			<A href="quemsomos.html"><img src="trofeu.jpg" height= "20px" /></A>&nbsp&nbsp&nbsp&nbsp
			<A href="quemsomos.html"><img src="brasao.jpg" height= "20px" style=" margin-top: 2px;" /></A>
	
			</div>
			</div>
			<div id="header3"></div>
			<div id="content" ><center><br><br><br>
			<form method="post" action="cadNovoUsuario.php">
				<label> Login: </label> <input type="text" name="login" /><br />
				<label> Sele&ccedil;&atilde;o favorita: </label> 
				<?php
					include("classSelecao.php");
					$user = new Selecao();

					$rs = mysql_query("SELECT codigo, nome FROM selecao ORDER BY nome");
					$user->montaCombo('comboSelecao', $rs, 'codigo', 'nome');
				?>
				<br />
				<label> Sexo:<input type="radio" name="sexo" value="Masculino"> Masculino 
				<input type="radio" name="sexo" value="Feminino"> Feminino 
				 <br />
				<label> Nome: </label> <input type="text" name="nome" /><br />
				<label> Avatar: </label><input type="text" name="avatar"/><br/><input type="file" name="foto" /><br>
				<label> Email: </label> <input type="text" name="email" /><br />
				<label> Senha: </label> <input type="password" name="senha" ><br>
				<label> Confirmar senha: </label><input type="password" name="confsenha"><br>
				<label> Status: </label><br> <textarea cols="30" rows="7" name="status"></textarea>
				<br />
				<input type="submit" name="acao" value="Enviar" />
				<input type="reset" value="Apagar Campos">
				</form>
				</div>
				</div>
				
				<?php
				if(isset($msg))
				echo $msg;
				?>
</body>
</html>