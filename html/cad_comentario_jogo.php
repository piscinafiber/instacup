<?php
	if(isset($_POST['acao']))
	{
		include("banco.php");
		$bd = new Banco();
		if($_POST['comentario']!="")
		{
			$sql = "insert into feed_jogo set codigo='null', comentario='".addslashes($_POST['comentario'])."', data_feed='".date('Y-m-d H:i:s')."', codigo_jogo='".$_POST['jogo']."'";
			$resultado = mysql_query($sql);
			
			if($resultado==0)
				{
					$obj['codigo'];
					echo "Falha ao cadastrar comentario.";
				}
		}
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//PT"
	  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		 <meta charset="utf-8" />
		<link rel="stylesheet" href="./css/animate.css"> <!-- Optional -->
		<link rel="stylesheet" href="./css/liquid-slider.css">
		<meta http-equiv="Content-Type" content="text/xhtml; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="style.css"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="text/javascript" src="jquery-1.4.2.min.js"></script>
		<link href="css/screen.css" rel="stylesheet" type="text/css" media="screen" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/easySlider1.7.js"></script>
		<title>Instacup - Cadastro de jogo</title>
        <script type="text/javascript">
			
			$( document ).ready( function(){
				
				$( "#cabecalho" ).load( "cabecalhoadm.html" );
				$( "#rodape" ).load( "rodape.html" );
			});
			$(document).ready(function(){	
			$("#slider").easySlider({
				auto: true, 
				continuous: true
			});
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
		<div id="content"><center><br><br><br>
			<?php
				mysql_connect("localhost", "tipboxar_arena", "@123xyz@");
				mysql_select_db("tipboxar_instacup");
				
				$sql="SELECT * FROM jogos order by data desc";
				$resultado = mysql_query($sql);	
				
				
				$sql2="SELECT * FROM Estadio ";
				$resultado2 = mysql_query($sql2);				
				


				echo"	<div  style=' background-color:#f1f6e3;color:#7e9c2f; width:650px; height:340px;' ><br> <img src='../icones/logo.png' width='90px' style='float:left; padding-left:10px;'/><h1>Cadastro de comentario</h1><br><div  style=' background-color:#fff; width:100%; height:2px;'></div><br>";
				
					echo"<form method='post' width='400px' height='500px' action='cad_comentario_jogo.php'>";
							echo "<textarea name='comentario' id='comentario' style='width: 80%; height: 150px; resize: none; border-color:#7e9c2f'></textarea><br>";
							echo "<div style='float:left; margin-left:60px'>";
							echo "<label> Jogo: </label>";					
							echo "<select name='jogo'>";	

						while ($obj = mysql_fetch_array($resultado))
							{		
								$sql3="SELECT * FROM selecao where codigo=".$obj['time1'];
								$resultado3 = mysql_query($sql3);
								$obj3 = mysql_fetch_array($resultado3);
								
								$sql4="SELECT * FROM selecao where codigo=".$obj['time2'];
								$resultado4 = mysql_query($sql4);
								$obj4 = mysql_fetch_array($resultado4);
								echo "<option value='".$obj['codigo']."'>".$obj3['nome']."___X___".$obj4['nome'];								
							}
							
							echo "</select ></div>";
							echo "<div style='float:right; margin-right:60px'><input type='submit' name='acao' value='Enviar' />
								 <input type='reset' value='Apagar Campos'></div>";
							echo "</tr>";
							echo "</table>";
				echo "</form>	
			</div>";					
			?>	
		</div>
			
			
<?php
if(isset($msg))
echo $msg;
?>
</body>
</html>