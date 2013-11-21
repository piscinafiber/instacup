<?php
	include("banco.php");
	$bd = new Banco();
	include("classUsuario.php");
	
/*	if(isset($_POST['acao']))
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
		if ( $msg == "" ) 
			{
*/				if(isset($_POST['acao']))
				{
					$usuario = new Usuario("",$_POST['login'],$_POST['selecaof'],$_POST['sexo'],$_POST['nome'],$_POST['avatar'], $_POST['email'], $_POST['senha'],$_POST['status'],"");
					$resultado = $usuario->insere();
					if($resultado)
					$msg = "Novo torcedor cadastrado com sucesso.";
					else
					$msg = "Falha ao cadastrar torcedor.";
				}
			


?>
<html>
<head>

	<meta charset="utf-8">
	<title>InstaCup</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" type="text/css" href="style-login.css">
	<style type="text/css"></style>
</head>
	<body background="../imagens/campo.jpg"> 
	<div id="header">
		<DIV><center><br><br>						
			<div="color:#fff; font-size:25px;">InstaCup - Uma rede de <b>VENCEDORES!</b></div>
		</div>
	</div>
		<div id="wrapper">
			<div id="main">
				<form id="form1" method="post" action="cadastro.php">
					<div style="align:right; padding-right:60px;">
					</div><br>			
					<center>
					<div id="content" >
						<div id="cadastro2">
							<br>
							<div id="logo"><IMG src="../icones/logo.jpg" width="150px"  /></div>
							<br>
							<div id="interior">
									<h6>Qual seu nome?</h6> 
									<input type="text" name="nome" tabindex="1" size=50 style=" border:1px solid;color:#7e9c2f"/><br><br>
									<h6>Qual login deseja usar?</h6> 
									<input type="text" name="login" tabindex="2" size=50 style=" border:1px solid;color:#7e9c2f"/><br><br>
									<h6>Qual seu email?</h6> 
									<input type="text" name="seleçao"  tabindex="3" size=50 style=" border:1px solid;color:#7e9c2f"/><br><br>
									<h6>Qual seleção faz seu coração bater mais forte?</h6> 
									<?php
										include("classSelecao.php");
										$user = new Selecao();

										$rs = mysql_query("SELECT codigo, nome FROM selecao ORDER BY nome");
										$user->montaCombo('comboSelecao', $rs, 'codigo', 'nome');
									?>
									<input type="text" name="seleçao"  tabindex="4" size=50 style=" border:1px solid;color:#7e9c2f" /><br><br>
									<h6>Qual seu sexo?</h6> <br>
									Masculino<input type="radio" name="sexo"> feminino<input type="radio" name="sexo"><br><br>
									
									Senha:<br>
									<input type="password" name="senha" tabindex="5" style=" border:1px solid;color:#7e9c2f"/><br><br>		
									
									<br>
									<input type="submit" name="acao" value="Enviar" /><br><br>
									<a style="font-size: small; color: #000;"><h3>Esqueceu sua senha?</h3></a></td>
							</div>
						</div>			
					</div>
				</form>
			</div>
		</div>	
	

	</body>
</html>