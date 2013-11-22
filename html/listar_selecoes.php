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
		
        </script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script>
		</script>
	</head>
<body background="../../../imagens/campo.jpg" > 

        <div id="cabecalho"></div>
		
		<div id="content">
			<center>
			 <div id="Titulo" ><center><h1>Seleções</h1></div> 
			 <div id="abaixoTitulo"></div>
			
			 
				<?php
					include("banco.php");
					$bd = new Banco();
					$sql2= "select codigo, foto, fototime, nome from selecao";	
					$resultado2 = mysql_query($sql2);
					$selecao = array();
					$i = 0;
					while ($obj2 = mysql_fetch_array($resultado2)) {
						$selecao [$i] = $obj2;
						$i++;
					}
				?>

				<center>
					<br/><br/>
				<div id="carousel" class="flexslider">
				  <ul class="slides">
				  	<?php foreach ($selecao as $key => $obj2) {
				    echo "<li>				      
				      <img src='".$obj2['foto']."'/>".$obj2['nome']."
				    </li>";
					}?>
				  </ul>
				</div>
				<div id="slider" class="flexslider">
				  <ul class="slides">
				  	<?php foreach ($selecao as $key => $obj2) {
				    echo "<li>
				      <a href='selecao.php?selecao=".$obj2['codigo']."'><img src= ".$obj2['fototime']." /></a>
				    </li>";
					}?>
				  </ul>
				</div>

				</div>
			
			
		</div>	
		
	</div>

<br/>
  <link rel="stylesheet" type="text/css" href="./css/flexslider.css"/>
  <script src="./examples/assets/prism.js"></script>
  <script src="./js/jquery.easing.1.3.js"></script>
  <script src="./js/jquery.touchSwipe.min.js"></script>
  <script src="./js/jquery.flexslider-min.js"></script>  
  <script>
    $(window).load(function() {
		  // The slider being synced must be initialized first
		  $('#carousel').flexslider({
		    animation: "slide",
		    controlNav: false,
		    animationLoop: false,
		    slideshow: false,
		    itemWidth: 150,
		    itemMargin: 5,
		    asNavFor: '#slider'
		  });
		 
		  $('#slider').flexslider({
		    animation: "slide",
		    controlNav: false,
		    directionNav: false,
		    animationLoop: false,
		    slideshow: false,
		    sync: "#carousel"
		  });
		});
  </script>

</body>
</html>