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
		<title>Instacup - Maracanã</title>
        <script type="text/javascript">
			
			$( document ).ready( function(){
				
				$( "#cabecalho" ).load( "cabecalho.php" );
				$( "#rodape" ).load( "rodape.html" );
			});
		
        </script>
	</head>
<body background="../../../imagens/campo.jpg" > 

        <div id="cabecalho"></div>
		<div id="content"><center>
			
				<?php
				include("banco.php");
				$bd = new Banco();
				$sql= "select * from jogador where codigo_selecao=".$_GET["selecao"]." order by posicao";	
				$resultado = mysql_query($sql);
				
				$sql2= "select * from selecao where codigo=".$_GET["selecao"];
				$resultado2 = mysql_query($sql2);
				$obj2 = mysql_fetch_array($resultado2);
				
				echo "<div id='Titulo' ><center><img src= ".$obj2['foto']." height='120px' /><br/><h1>".$obj2['nome']."</h1></div><br><br><br><br><br><br><br><br>";
				echo "<div id='abaixoTitulo'></div> <br><br>";
				echo "<div id='foto_selecao'><img src= ".$obj2['fototime']." width='350px' style='border-radius:5px; margin-top:0px'' /></div>";			
				echo "<table>";
				echo "<tr><td colspan='12'><div id='texto_selecao'><p><h2>".utf8_encode($obj2['descricao'])."<br/><br/></tr>";
				echo "<tr>";
				$i=1;
				while ($obj = mysql_fetch_array($resultado))						
				{	
					if($i<=11)
						{
							echo "<td  style='padding-right: 10px;'>";
							echo "<div id='foto_selecao'><img src='".$obj['foto']."' width='50px' /></a>";
							echo "</td>";

					
						}					
					else
						{
							$i=0;
							echo "<tr height='15px'><td colspan='12'></td></tr>";
						}					
						$i++;				
				}
				echo "</tr>";
				echo "<tr height='40px'></tr>";
				echo "</table>";
				?>	
				</div><br><br>
				</p>
				
			</div>
						
	</div>

</div>
		
	</div><br/>
</body>
</html>