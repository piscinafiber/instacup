<?php session_start(); ?>

<body background="../imagens/campo.jpg"> 
<!-- <link rel="stylesheet" type="text/css" href="style.css"/>  -->

	<div id="header">							
		<div id="logo"><a href="index.php"><img src="../icones/logo2.png" height= "45px" /></a></div>
		<div id="sair"><a href="sair.php"><img src="../icones/sair2.png" height= "23px" style="float:right; margin-right:10px; margin-top:10"/></a></div>
	<div  id="menucima">	
	<table style="margin-left:10%">
		<tr height="40px">		
			<td width="50px">
			<a href="estadios.html" >Estádios</a>	
			</td>		
			<td width="50px">
			</td>
			<td>
			<a href="listar_selecoes.php">Sele&ccedil;&otilde;es</a>
			</td>
			<td width="50px">
			</td>
			<td>
			<a href="chamada-jogador.php">Jogador</a>	
			</td>

		</tr>
	</table>
	</div>
	
	</div>					 						
	<div id="wrapper">
		<div id="foto">
			<a href="Perfil_usuario.html">
				<img src="renderizaAvatar.php?id=<?php echo $_SESSION['UsuarioCodigo'] ?>" width="100px" height="100px" style="border-top-right-radius: 25px; border-bottom-left-radius: 25px;  margin-top:0px"/>
			</a> 
		</div>
		<div id='texto'><b><?php echo $_SESSION['UsuarioNome']; ?></b></div>
		<div id="botoes">
			<div id="sidebar">
				<ul>
						<li><a href="lista_partida.php" style="text-decoration:none; color:#fff"><img src="../icones/apito.png" height= "25px" style="margin-top:0px; border:1px solid;"/><div style="margin-left:60px; margin-top:-23px;"><h2>Partidas</h2></div></a></li>
						<li><a href="tabela.php" style="text-decoration:none; color:#fff"><img src="../icones/tabela.png" height= "25px" style="margin-top:0px;border:1px solid;"/><div style="margin-left:60px; margin-top:-23px;"><h2>Tabela</h2></div></a></li>
						<li><a href="campeoes.html" style="text-decoration:none; color:#fff"><img src="../icones/campeoes.png" height= "25px" style="margin-top:0px;border:1px solid;"/><div style="margin-left:60px; margin-top:-23px;"><h2>Campeões</h2></div></a></li>
						<li><a href="sobre.html" style="text-decoration:none; color:#fff"><img src="../icones/sobre.png" height= "25px" style="margin-top:0px;border:1px solid;"/><div style="margin-left:60px; margin-top:-23px;"><h2>Sobre</h2></div></a></li>
				</ul>
			</div>
		</div><!-- fim botoes -->
	</div>