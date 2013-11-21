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
<body background="../../../imagens/campo.jpg" > 

        <div id="cabecalho"></div>
		<div id="content"><center>
			

<TABLE width = "600px" >
	<?
		if(isset($_GET['cod']))
		{
		mysql_connect("localhost", "tipboxar_arena", "@123xyz@");
		mysql_select_db("tipboxar_instacup");
		$sql= "select jogador.nome,jogador.foto,jogador.descricao,jogador.idade,jogador.posicao,selecao.foto AS fotoselecao from jogador join selecao on jogador.codigo_selecao = selecao.codigo where jogador.codigo=".$_GET['cod'] ;	
		$resultado = mysql_query($sql);
		$obj = mysql_fetch_array($resultado);				
			echo "<tr>";
				echo"<div id='Titulo' ><center><h1><b>".$obj['nome']."</h1></b></div><div id='abaixoTitulo'></div></center></center>";
				echo "<div id='fotojogador' style='margin-left:20px; ' width='60px'><img src='".$obj['foto']."'/></div>";
				echo "<div style='margin-left:600px; margin-top:50px;' width='60px' ><img src='".$obj['fotoselecao']."' width='60px'/></div>";				
				echo "<div id='textojogador' style='margin-left:20px; margin-top:-20px;' width='60px'>";
				
				echo "<div style='margin-left:20px; margin-top:-80px;' width='60px'>".$obj['posicao']."</div>";
				echo "<div style='margin-left:20px; margin-top:5px;' width='60px'>".$obj['idade']."</div>";
				echo "</div>";
				
			echo "</tr>";	
		}
		else
		{	
			echo "fudeu";
		}
		?>
</table>
</body>
</html>		