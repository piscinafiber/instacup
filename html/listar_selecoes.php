<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
		 <meta charset="utf-8" />
		<link rel="stylesheet" href="./css/animate.css"> <!-- Optional -->
		<link rel="stylesheet" href="./css/liquid-slider.css">
		<meta http-equiv="Content-Type" content="text/xhtml; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="style.css"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="text/javascript" src="jquery-1.4.2.min.js"></script>
		<title>InstaCup - Seleções</title>
        <script type="text/javascript">
			
			$( document ).ready( function(){
				
				$( "#cabecalho" ).load( "cabecalho.php" );
				$( "#rodape" ).load( "rodape.html" );
			});
			$(function(){
			 $('#slider-id').liquidSlider();
			});
		
        </script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="./js/jquery.easing.1.3.js"></script>
		<script src="./js/jquery.touchSwipe.min.js"></script>
		<script src="./js/jquery.liquid-slider.min.js"></script>
		<script>
		</script>
	</head>
<body background="../../../imagens/campo.jpg" > 

        <div id="cabecalho"></div>
		
		<div id="content"><center>
			 <div id="Titulo" ><center><h1>Seleções</h1></div> 
			 <div id="abaixoTitulo"></div>
			 <table  width="700px">
			 <tr height="5px"/>
			 <tr height="30px"/>
			 <td>
			 
				<?php
				include("banco.php");
				$bd = new Banco();
				$sql2= "select codigo, foto, fototime, nome from selecao";	
				$resultado2 = mysql_query($sql2);
				echo "<tr height='10px'/>";

				echo "</table>";
				echo "<center>";
				echo "<div class='container'>";				
				echo "  <div class= 'top-buttons' style=' margin-left:-62px; width:870px;'/>"	;
				echo "  <div class='liquid-slider'  id='main-slider' style=' margin-left:87px; width:685px; heigth:450px;'/>";
				
				while ($obj2 = mysql_fetch_array($resultado2))						
				{	
				 echo "
				 
					<div>
					  <h4 class='title' style='display:none;' ><img src='".$obj2['foto']."' height='60px'/><br>".$obj2['nome']."</h4>								  
					  <div >
					  <a href='selecao.php?selecao=".$obj2['codigo']."'><img src= ".$obj2['fototime']." width='200px' /></a>
					</div>
					</div>";
				}				
				?>	

				</div>
			</td>
			
			
		</div>	
		
	</div>

<br/>
 <script src="./examples/assets/prism.js"></script>
  <script src="./js/jquery.easing.1.3.js"></script>
  <script src="./js/jquery.touchSwipe.min.js"></script>
  <script src="./js/jquery.liquid-slider.min.js"></script>  
  <script>
    $('#main-slider').liquidSlider();
  </script>

</body>
</html>