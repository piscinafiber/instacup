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
		function lista_feed_comentario()
		{	
				var xmlhttp;
				if (window.XMLHttpRequest)
				{// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				}
				else
				{// code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.open("POST","lista_feed_comentario.php",true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
				codigo = document.formtorcer.cod_jogo.value;
				xmlhttp.send("cod_jogo="+codigo);
				
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						document.getElementById("feed_comentario").innerHTML=xmlhttp.responseText;
					}
				}
		}
        </script>
	</head>
<body background="../../../imagens/campo.jpg" > 

        <div id="cabecalho"></div>
		<div id="content" style="overflow:none;"><center>

				<form name="formtorcer" method="post" action="index.php" enctype="multipart/form-data">
				<?php				
					include("banco.php");
					$bd = new Banco();			
					
					$codigo_placar=$_GET['codigo_placar'];
					
					echo "<input type='hidden' name='cod_jogo' value='".$_GET['codigo_placar']."'>";
					$sql= "select * from jogos where codigo=".$codigo_placar;						
					$resultado = mysql_query($sql);
					$obj = mysql_fetch_array($resultado);
					
					$sql2= "select * from selecao where codigo=".$obj['time1'];
					$resultado2 = mysql_query($sql2);
		
					$sql3= "select * from selecao where codigo=".$obj['time2'];
					$resultado3 = mysql_query($sql3);
					echo "</form>";
					echo "<div id='Titulo' ><center><h1>Jogo</h1></div>
					<div id='abaixoTitulo'></div>
					
						<TABLE width ='700px' height='270px' style='border:2px solid; color:#fff; border-color:#f1f6e3; float:center; margin-top:20px'>";
						while ($obj2 = mysql_fetch_array($resultado2))
						{		
							echo "<tr>";
								echo "<td><div id='fotoplacar1'><p align = 'Justify'><img src=".$obj2['foto']."  height= '200px'/></A></div></td>";
								echo "<td style='text-align:center; background-color:#none'><center><div id='textoplacar' style='margin-top:80px'><h1>".$obj['gol_time1']."x".$obj['gol_time2']."</h1></div></td>";
						}
						while ($obj3 = mysql_fetch_array($resultado3))
						{					
						echo "<td><div id='fotoplacar2'><p align = 'Justify'><img src=".$obj3['foto']." height= '200px'/></A></div></td>";
							echo "</tr>";	
						}	
						echo "</table> ";
				?>
				<div style="margin-top:10px;">
				<div id="feed_comentario"  width="500px" height="300px" style="position:relative;  top:20px; width:100%; height:190; z-index:1; overflow: auto; margin-top:10px; overflow:auto; background-color:#fff;" >
				
				</div><br>
		</div>	</div>
	<script>
		setInterval(function(){lista_feed_comentario()},1000);
	</script>
</body>
</html>