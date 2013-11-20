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
				
				$( "#cabecalho" ).load( "cabecalho.html" );
				$( "#rodape" ).load( "rodape.html" );
			});
		
        </script>
	</head>
<body background="../../../imagens/campo.jpg" > 

        <div id="cabecalho"></div>
		<div id="content"><center>
			
				<?php
				mysql_connect("localhost", "tipboxar_arena", "@123xyz@");
				mysql_select_db("tipboxar_instacup");
				$sql= "select * from jogador where codigo_selecao=".$_GET["selecao"]." order by posicao";	
				$resultado = mysql_query($sql);
				
				$sql2= "select * from selecao where codigo=".$_GET["selecao"];
				$resultado2 = mysql_query($sql2);
				$obj2 = mysql_fetch_array($resultado2);
				
				echo "<div id='Titulo' ><center><h1>".$obj2['nome']."</h1></div>";
				echo "<div id='abaixoTitulo'></div> <br><br>";
				echo "<div id='foto_selecao' style='margin-left:120px'><img src= ".$obj2['fototime']." width='350px' style='border-radius:5px; margin-left:-370px; margin-top:0px'' /></div><img src= ".$obj2['foto']." height='120px' style='border-radius:5px; margin-left:450px; margin-top:-160px'/>";			
				echo "<table>";
				echo "<tr height='340px'><td colspan='12'><div id='texto_selecao'><p align = 'Justify'><h2>".$obj2['descricao'];
				echo "<tr>";
				echo "<center>";
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