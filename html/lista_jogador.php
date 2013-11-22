<?php Session_Start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
		 <meta charset="utf-8" />
		<link rel="stylesheet" href="./css/animate.css"> <!-- Optional -->
		<link rel="stylesheet" href="./css/liquid-slider.css">
		<meta http-equiv="Content-Type" content="text/xhtml; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="style.css"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="text/javascript" src="jquery-1.4.2.min.js"></script>
		<title>Instacup - Estádios</title>
        <script type="text/javascript">
			
			$( document ).ready( function(){
				
				$( "#cabecalho" ).load( "cabecalho.php" );
				$( "#rodape" ).load( "rodape.html" );
			});
		
        </script>
	</head>
<body>
		<?php
			include("banco.php");
			$bd = new Banco();
			$sql= "select * from jogador where codigo_selecao=".$_GET['selecao'];
			$resultado = mysql_query($sql);
			$sql2= "select * from selecao where codigo=".$_GET['selecao'];	
			$resultado2 = mysql_query($sql2);				
			$obj2 = mysql_fetch_array($resultado2);
		?>
        <div id="cabecalho"></div>
		<div id="content"><center>
			<div id="Titulo" ><center><div><img src="<?php echo $obj2['foto']; ?>" height='150px' /> <h2 style="text-align:center;"><?php echo $obj2['nome']; ?></h2><br/></center></div><br><br><br><br><br><br><br><br><br>
			<div id="abaixoTitulo"></div></center>
			<br>
			<center><h2 style="text-align:center;">Jogadores</h2></center><br><br>
			<center>
			<TABLE width ="370px" height="300px" style="border:none; color:#B2C482; background-color:#B2C482;">				
				<?php 
				while ($obj = mysql_fetch_array($resultado))
				{
					echo "<tr height='5px'></tr>";	
					echo "<a href='perfil_jogador.php?cod=".$obj['codigo']."' style='nomejogador'><tr height='20px'>";			
						echo "<td width = '40px'></td>";						
						echo "<td width = '20px' ><div style='margin-top:10px'><img src=".$obj2['foto']." height='25px' /></div></a></td>";
						echo "<td width = '30px'  ><div style='background-color:#7e9c2f;'></div></td>";
						echo "<td width = '170px' ><a href='perfil_jogador.php?cod=".$obj['codigo']."' style='nomejogador'><div style='padding-bottom:5px;'>".$obj['nome']."</div></a></td>";
						echo "<td width = '50px'><a href='perfil_jogador.php?cod=".$obj['codigo']."' style='nomejogador'>".$obj['idade']."</a></td>";
						echo "<td width = '40px'><a href='perfil_jogador.php?cod=".$obj['codigo']."' style='nomejogador'>".$obj['posicao']."</a></td>";
						echo "<td width = '30px'></td>";						
					echo "</tr>";
					echo "<tr height='0px'>";	
						echo "<td colspan='7'><div id='abaixonomejogador'></td>";
					echo "</tr>";		
					
				}
				
				

				?>

				</table> <br><br>
				<a href='chamada-jogador.php'><div id='btn-voltar-lista-jogador' width='35' height='35px' style="margin-left: 300px;margin-right: 300px;">Voltar</div></a>
				</center>		
				<br>
			
			
</div>			
		</div>
		
	</div><br/>
			</div>
		
			</div>
				
		</div>		
	</div>
	
</body>
</html>