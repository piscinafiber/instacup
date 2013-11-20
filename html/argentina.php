<?php Session_Start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//PT"
	  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/xhtml; charset=UTF-8" />
	<meta charset="utf-8">
	<title>Instacup - Argentina</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="style_campeoes.css">
	<style type="text/css"></style>
</head>
<body background="../campo.jpg" >
	<div id="header" >
							
						<img src="../logo.png" height= "85px" />
						</div>
						<div  id="menucima">
								<a href="../estadios/Estadios.html" >Estadios</a>&nbsp&nbsp&nbsp&nbsp						
								<a href="listaSelecao.php">Listar Sele&ccedil;&otilde;es</a>&nbsp&nbsp&nbsp&nbsp
								<a href="listaUsuario.php">Listar Torcedores</a>&nbsp&nbsp&nbsp&nbsp			
								<a href="listaJogador.php">Listar Jogador</a>	
													
								
						</div>
						
						<div id="botoes">
								<A href="quemsomos.html"><img src="../apito.png" height= "20px" /></A>	&nbsp&nbsp&nbsp&nbsp
								<A href="quemsomos.html"><img src="../taca.png" height= "20px" /></A>&nbsp&nbsp&nbsp&nbsp&nbsp
								<A href="quemsomos.html"><img src="../brasao.png" height= "20px" style=" margin-top: 2px;" /></A>
						
						</div><!-- fim botoes -->
						
	</div><!-- fim header -->
						
	<div id="wrapper">
	<div id="foto"><img src="../teste.jpg" width="150px" height="150px" style="border-top-right-radius: 25px;	border-bottom-left-radius: 25px;  "/> </div>
	<div id="texto"><b>Caio Dutra</b></div>
	
	

<div id="content" ><center><br><br><br>
			 <div id="Titulo" ><center><h1><b>Seleções</h1></b><hr></div> 	
				<?
				mysql_connect("localhost", "root", "");
				mysql_select_db("instacup");
				$sql= "select * from selecao";	
				$resultado = mysql_query($sql);
				while ($obj = mysql_fetch_array($resultado))						
				{
					echo "<div id='teste'>";
					echo "kkkkk";
						echo "<a href='lista_jogador.php?selecao=".$obj['codigo']."'><img src='".$obj['foto']."' /></a>";
					echo "</div>";
				}
				?>			
</div>
<!-- <div id="sidebar">
			<div id="time"><center><IMG src="CBF.jpg" width="52px" height="68px"/> </div>
			<div id="foto"><center><IMG src="teste.jpg" width="80px" height="80px"  /></div> 
			
			
			<div id="nome"><h6>Caio Dutra</h6></div>
			
			<ul>
					<li><a href="Estadios.html" style="text-decoration:none; color:#00923F">Estadios</a>							</li>
					<li><a href="listaSelecao.php" style="text-decoration:none; color:#00923F">Listar Sele&ccedil;&otilde;es</a>	</li>
					<li><a href="listaUsuario.php" style="text-decoration:none; color:#00923F">Listar Torcedores</a>				</li>
					<li><a href="listaJogador.php" style="text-decoration:none; color:#00923F">Listar Jogador</a>					</li>
					
			</ul>
			</div> -->
			
			<!-- <div id="sidebarE"></div><div id="sidebarE"></div> -->
			
			
		</div>
		
	</div><br/>
</body>
</html>