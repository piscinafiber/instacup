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
		<title>Instacup - Partidas</title>
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
			<div id="Titulo" ><center><h1>Partidas</h1></center>
			</div>
			<div id="abaixoTitulo"></div></center>
			<br>
			<?php
				mysql_connect("localhost", "tipboxar_arena", "@123xyz@");
				mysql_select_db("tipboxar_instacup");
				

				$sql= "select jogos.codigo, jogos.estadio, jogos.data,jogos.hora, jogos.time1, jogos.time2, sel1.nome as time1, sel2.nome as time2, sel1.foto as fotosel1, ";
				$sql= $sql."sel2.foto as fotosel2, jogos.gol_time1, jogos.gol_time2 from jogos, selecao as sel1, selecao as sel2 where ";
				$sql= $sql."jogos.time1=sel1.codigo and jogos.time2=sel2.codigo order by data desc";
				$resultado = mysql_query($sql);
				
		
				
				while ($obj = mysql_fetch_array($resultado))
					{					
						echo "<a href='placar.php?codigo_placar=".$obj['codigo']."&?selecao1=".$obj['time1']."'><TABLE width ='615px'  style='border:2px solid;  color:#B2C482; border-color:#f1f6e3; background-color:#none; margin-left:110px; text-align:center;'>";	
							echo "<tr height='10px'></tr>";		
							echo "<tr>";
							$data=$obj['data'];
							$data = implode("/",array_reverse(explode("-",$data)));

								echo "<td colspan=9 style='text-align:center;'>".$data."</td>";
							echo "</tr>";
							echo "<tr height='0px'>";	
								echo "<td colspan='8'><center><div id='abaixonomejogador'></div></td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td width='30px'>&nbsp</td>";	
								echo "<td width='100px'><div style='margin-top:10px'><img src=".$obj['fotosel1']." height='55px' /></div></td>";
								echo "<td  width='90px'>".$obj['time1']."</td>";				
								echo "<td width='180px'>&nbsp</td>";									
								echo "<td  width='90px' style='text-align:right'>".$obj['time2']."</td>";								
								echo "<td ><img src=".$obj['fotosel2']." height='55px' style='float:right;'/></td>";
								echo "<td width='30px'>&nbsp</td>";	
								
							echo "</tr>";
								echo "<tr><center>";
								echo "<td colspan=9 style='text-align:center; font-size:25px'>".$obj['gol_time1']."X".$obj['gol_time2']."</td></div>";								
							echo "</tr>";
								echo "<tr height='10px'></tr>";						
						echo "</TABLE ></a>";	
						echo " <br>";							
					
					}
			?>	
				<br>
			
			
		</div>
</body>
</html>