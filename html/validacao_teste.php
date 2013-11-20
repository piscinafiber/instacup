<?php
session_start();


include("banco.php");
$bd =  new Banco();

if((isset($_POST['login']) and isset($_POST['senha'])) and ($_POST['senha']!="" and $_POST['login']!=""))
{
 
    $sql = "SELECT `codigo`,`login`,`selecao_favorita`,`sexo`, `nome`, `avatar`,`email`,`senha`,`comentario`,`nivel_acesso`,`ultimo_acesso`,
	 `PrimeiroAcesso`,`TempoOnline`,`Acesso` FROM `usuario` WHERE `login` = '".$_POST['login']."' AND `senha` = '".$_POST['senha']."'";
	 
    $resultado = mysql_query($sql);
	if(mysql_num_rows($resultado)>0)
	{
		$obj = mysql_fetch_array($resultado);
		
		$_SESSION['UsuarioLogin'] = $obj['login'];
		$_SESSION['UsuarioNome'] = $obj['nome'];
		$_SESSION['UsuarioNivel'] = $obj['nivel_acesso'];
		$_SESSION['UsuarioCodigo'] = $obj['codigo'];
		$_SESSION['UsuarioSelecao'] = $obj['selecao_favorita'];
		$_SESSION['UsuarioSexo'] = $obj['sexo'];
		$_SESSION['UsuarioAvatar'] = $obj['avatar'];
		$_SESSION['UsuarioEmail'] = $obj['email'];
		$_SESSION['UsuarioSenha'] = $obj['senha'];
		$_SESSION['UsuarioComentario'] = $obj['comentario'];
		$_SESSION['UsuarioPrimeiroAcesso'] = $obj['PrimeiroAcesso'];
		$_SESSION['UsuarioUltimoAcesso'] = $obj['ultimo_acesso'];
		$_SESSION['UsuarioAcesso'] = $obj['Acesso'];
		$_SESSION['UsuarioTempoOn'] = $obj['TempoOnline'];
		if($_SESSION['UsuarioNivel']==0)
		{
			header("Location: Index_Administrador.php");
		}
		elseif($_SESSION['UsuarioNivel']==1)
		{
			header("Location: index.php");
		}
	}
	else
	{
		$msg = "Senha/Login inválidos";
		session_destroy();
		echo $msg;
	}
	
}
else
{
	$msg = "Informe login e senha";
	session_destroy();
	echo $msg;
}
?>