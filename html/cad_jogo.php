<?php
//certo
mysql_connect("localhost", "tipboxar_arena", "@123xyz@");
mysql_select_db("tipboxar_instacup");
include("classJogos.php");

if(isset($_POST['acao']))
{
$data=$_POST['data'];
$data = implode("",array_reverse(explode("/",$data)));
$jogos = new Jogos("",$_POST['estadio'],$_POST['local'],$data,$_POST['hora'],$_POST['time1'],$_POST['time2']);
$resultado = $jogos->insere();
if($resultado)
$msg = "Jogo cadastrado com sucesso.";
else
$msg = "Falha ao cadastrar jogo.";
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
		
        </script>
	</head>
<body background="../../../imagens/campo.jpg" > 

        <div id="cabecalho"></div>
		<div id="content"><center><br>
			<?php
				mysql_connect("localhost", "tipboxar_arena", "@123xyz@");
				mysql_select_db("tipboxar_instacup");
				
				$sql="SELECT * FROM selecao";
				$resultado = mysql_query($sql);				
				$sql3="SELECT * FROM selecao";
				$resultado3 = mysql_query($sql3);
				$sql2="SELECT * FROM Estadio ";
				$resultado2 = mysql_query($sql2);				
				


				echo"	<div  style=' background-color:#f1f6e3;color:#7e9c2f; width:330px; height:520px;' ><br> <h1><IMG src='jogo.jpg' width='200'  style='border-radius:90px'><br>Jogos</h1><br><div  style=' background-color:#fff; width:330px; height:2px;'></div><br>";
				
					echo"<form method='post' width='400px' height='500px' action='cad_jogo.php'>";
							echo "<label> Estadio: </label>";					
							echo "<select name='estadio'>";	
						while ($obj2 = mysql_fetch_array($resultado2))
							{						
								echo "<option value='".$obj2['codigo']."'>".$obj2['nome'];
							}
							echo "</select ><br><br>";
							echo "<label> Local: </label> <input type='text' name='local' /><br><br>
								<label> Data: </label> <input type='text' name='data' /><br><br>
								<label> Hora: </label> <input type='text' name='hora' /><br><br>
								<label> Time 1: </label>";
								echo"	<select name='time1'>";	
						while ($obj = mysql_fetch_array($resultado))
							{						
								echo "<option value='".$obj['codigo']."'>".$obj['nome'];					
							}
							echo "</select ><br>";
							echo "<label> Time 2: </label>";
							echo "<select name='time2'>";
						while ($obj3 = mysql_fetch_array($resultado3))
							{					
								echo "<option value='".$obj3['codigo']."'>".$obj3['nome'];
							}
							echo "</select ><br><br></h2>";
							echo "<input type='submit' name='acao' value='Enviar' />
								 <input type='reset' value='Apagar Campos'>
				</form>	
			</div>";					
			?>	
		</div>
			
			
<?php
if(isset($msg))
echo $msg;
?>
</body>
</html>