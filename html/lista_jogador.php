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
				
				$( "#cabecalho" ).load( "cabecalho.html" );
				$( "#rodape" ).load( "rodape.html" );
			});
		
        </script>
	</head>
<body>
        <div id="cabecalho"></div>
		<div id="content"><center>
			<div id="Titulo" ><center><h1>Jogadores</h1></center>
			</div>
			<div id="abaixoTitulo"></div></center>
			<br>
			
			<TABLE width ="370px" height="300px" style="border:none; color:#B2C482; background-color:#B2C482; margin-left:110px; ">				
				<?php
				mysql_connect("localhost", "tipboxar_arena", "@123xyz@");
				mysql_select_db("tipboxar_instacup");
				$sql= "select * from jogador where codigo_selecao=".$_GET['selecao'];
				$resultado = mysql_query($sql);
				$sql2= "select * from selecao where codigo=".$_GET['selecao'];	
				$resultado2 = mysql_query($sql2);				
				$obj2 = mysql_fetch_array($resultado2);
				echo"<a href='chamada-jogador.php'><div id=brasao-selecao-tela-lista-jogador><img src=".$obj2['foto']." height='200px' /><center> <h1>".$obj2['nome']."</h1><br><div id='btn-voltar-lista-jogador' width='35' height='35px'>Voltar</div> </a></div>";
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

				</table> 		
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