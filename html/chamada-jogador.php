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
		 <div id="Titulo" ><center><h1>Escolha a seleção</h1></div> 
		  <div id="abaixoTitulo"></div>
		   <table  width="500px" style="border: 2px solid; color:f1f6e3">
			 
				<?php
				include("banco.php");
				$bd = new Banco();
				$sql= "select nome,codigo, foto from selecao";	
				$resultado = mysql_query($sql);
				$i=1;
				while ($obj = mysql_fetch_array($resultado))						
				{						
					if($i<=3)
						{
							
							echo "<td >";
							echo "<a href='lista_jogador.php?selecao=".$obj['codigo']."'><div id='esolha-selecao' height='200px'><center><img src=".$obj['foto']." height='80px' style='margin-top:35px; margin-bottom:35px'/><h2><center>".$obj['nome']."</center></h2></div><div></div></a>";
							echo "</td>";		
						}
				
						else
						{
							$i=0;
							echo "<tr height='10px'></tr>";
							
						}					
						$i++;	
						
				}
					echo "<tr height='10px'></tr>";
				?>
				</div><br><br>
				</p>
				
			</div>
						
	</div>

</div>
		
	</div><br/>
</body>
</html>