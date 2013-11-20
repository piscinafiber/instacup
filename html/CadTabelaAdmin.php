<?php
Session_Start();
mysql_connect("localhost", "tipboxar_arena", "@123xyz@");
mysql_select_db("tipboxar_instacup");
include("classTabela.php");

if(isset($_POST['acao']))
{
$jogador = new Jogador("",$_POST['time1'],$_POST['V1'],$_POST['E1'],$_POST['D1'],$_POST['SG1'],$_POST['Total1']);
$resultado = $jogador->insere();
if($resultado)
$msg = "Novo tabela cadastrada com sucesso.";
else
$msg = "Falha ao cadastrar tabela.";
}
?>
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
		<title>Instacup - Fonte Nova</title>
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
		<div id="content"><center><br><br><br>
			<form method="post" action="CadTabelaAdmin.php">
				<table border=1px>
  <tr>
    <td>Codigo</td>
    <td>Brasão</td>
	<td>Time</td>
	<td>SG</td>
	<td>V</td>
	<td>E</td>
	<td>D</td>
	<td>Total</td>
			
  </tr>
  <tr>
    <td><input name="codigo" style="width:80px;"></td>
    <td><input type="file" name="image"><input type="submit" value="upload"></td>
	<td><input name="Time1" style="width:80px;"></td>
	<td><input name="SG1" style="width:80px;"></td>
	<td><input name="V1" style="width:80px;"></td>
	<td><input name="E1" style="width:80px;"></td>
	<td><input name="D1" style="width:80px;"></td>
	<td><input name="Total1" style="width:80px;"></td>
	<td><input type="submit" name="acao" value="cadastrar" style="width:80px;"></td>
  </tr>
      <tr>
    <td><input name="codigo" style="width:80px;"></td>
    <td><input type="file" name="image"><input type="submit" value="upload"></td>
	<td><input name="Time1" style="width:80px;"></td>
	<td><input name="SG1" style="width:80px;"></td>
	<td><input name="V1" style="width:80px;"></td>
	<td><input name="E1" style="width:80px;"></td>
	<td><input name="D1" style="width:80px;"></td>
	<td><input name="Total1" style="width:80px;"></td>
  </tr>  <tr>
    <td><input name="codigo" style="width:80px;"></td>
    <td><input type="file" name="image"><input type="submit" value="upload"></td>
	<td><input name="Time1" style="width:80px;"></td>
	<td><input name="SG1" style="width:80px;"></td>
	<td><input name="V1" style="width:80px;"></td>
	<td><input name="E1" style="width:80px;"></td>
	<td><input name="D1" style="width:80px;"></td>
	<td><input name="Total1" style="width:80px;"></td>
  </tr>  <tr>
    <td><input name="codigo" style="width:80px;"></td>
    <td><input type="file" name="image"><input type="submit" value="upload"></td>
	<td><input name="Time1" style="width:80px;"></td>
	<td><input name="SG1" style="width:80px;"></td>
	<td><input name="V1" style="width:80px;"></td>
	<td><input name="E1" style="width:80px;"></td>
	<td><input name="D1" style="width:80px;"></td>
	<td><input name="Total1" style="width:80px;"></td>
  </tr>  <tr>
    <td><input name="codigo" style="width:80px;"></td>
    <td><input type="file" name="image"><input type="submit" value="upload"></td>
	<td><input name="Time1" style="width:80px;"></td>
	<td><input name="SG1" style="width:80px;"></td>
	<td><input name="V1" style="width:80px;"></td>
	<td><input name="E1" style="width:80px;"></td>
	<td><input name="D1" style="width:80px;"></td>
	<td><input name="Total1" style="width:80px;"></td>
  </tr>  <tr>
    <td><input name="codigo" style="width:80px;"></td>
    <td><input type="file" name="image"><input type="submit" value="upload"></td>
	<td><input name="Time1" style="width:80px;"></td>
	<td><input name="SG1" style="width:80px;"></td>
	<td><input name="V1" style="width:80px;"></td>
	<td><input name="E1" style="width:80px;"></td>
	<td><input name="D1" style="width:80px;"></td>
	<td><input name="Total1" style="width:80px;"></td>
  </tr>  <tr>
    <td><input name="codigo" style="width:80px;"></td>
    <td><input type="file" name="image"><input type="submit" value="upload"></td>
	<td><input name="Time1" style="width:80px;"></td>
	<td><input name="SG1" style="width:80px;"></td>
	<td><input name="V1" style="width:80px;"></td>
	<td><input name="E1" style="width:80px;"></td>
	<td><input name="D1" style="width:80px;"></td>
	<td><input name="Total1" style="width:80px;"></td>
  </tr>
  

  </table>
 
				</form>		 
			
			
	<?php
if(isset($msg))
echo $msg;
?>
</body>
</html>