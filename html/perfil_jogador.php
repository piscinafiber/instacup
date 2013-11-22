<?php Session_Start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
		<meta charset="ISO-8859-1" />
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
		include("banco.php");
		$bd = new Banco();
		
		$sql= "select jogador.nome,jogador.foto,jogador.idade,jogador.posicao,selecao.foto AS fotoselecao, jogador.localdenasc, jogador.Pe, jogador.`Clube Atual` from jogador join selecao on jogador.codigo_selecao = selecao.codigo where jogador.codigo=".$_GET['cod'] ;	
		
		$resultado = mysql_query($sql);
		$obj = mysql_fetch_array($resultado);				
			echo "<tr>";
				echo"<div id='Titulo' ><center><h1><b>".$obj['nome']."</h1></b></div><div id='abaixoTitulo'></div></center></center>";
				echo "<div id='fotojogador' style='margin-left:20px; ' width='60px'><img src='".$obj['foto']."'/></div>";
				echo "<div style='margin-left:600px; margin-top:50px;' width='60px' ><img src='".$obj['fotoselecao']."' width='60px'/></div>";				
				echo "<div id='textojogador' style='margin-left:30px; margin-top:-80px; text-align:left' width='60px'>";
				
				echo "<div style='' width='60px'><b>Posi&ccedil;&atilde;o:</b> ".$obj['posicao']."</div>";
				echo "<div style='' width='60px'><b>Idade:</b> ".$obj['idade']."</div>";
				echo "<div style='' width='60px'><b>Local de nascimento:</b> ".$obj['localdenasc']."</div>";
				echo "<div style='' width='60px'><b>Melhor perna:</b> ".$obj['Pe']."</div>";
				echo "<div style='' width='60px'><b>Clube atual:</b> ".$obj['Clube Atual']."</div>";
				echo "</div>";
				
			echo "</tr>";	
		}
		else
		{	
			echo "fudeu";
		}
		?>
</table>
<br>
<a href='lista_jogador.php?selecao=<?php echo $_GET['codigo_selecao'] ?>'><div id='btn-voltar-lista-jogador' width='35' height='35px' style="margin-left: 320px;margin-right: 300px; margin-top:180px">Voltar</div></a>
</body>
</html>		