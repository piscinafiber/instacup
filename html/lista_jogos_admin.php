<?php
mysql_connect("localhost", "tipboxar_arena", "@123xyz@");
mysql_select_db("tipboxar_instacup");
include("classJogos.php");
$jogos = new Jogos();
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
		<title>Instacup - ADM</title>
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
		<div id="content">
		<?php
if(isset($_POST['acao'])){
$cod = $_POST['cod'];
$sucesso = 0;
foreach($cod AS $valor){
if($jogos->exclui($valor))
$sucesso++;
}
if($sucesso > 0)
echo "$sucesso Jogo(s) excluido(s) com sucesso!";
else
echo "Falha ao excluir.";
}

$resultado = $jogos->executaLista();
echo '<form method="post" action ="listaJogos.php"">
<table border="1">
<tr>
<th></th>
<th>Código</th>
<th>Estadio</th>
<th>Local</th>
<th>Data</th>
<th>Hora</th>
<th>Time 1</th>
<th>Time 2</th>
<th>Gols time 1</th>
<th>Gols time 2</th>
<th></th>
</tr>';

while($dados = $jogos->listaDados()){
echo '<tr>';
echo '<td><input type="checkbox" name="cod[]" value="'.$dados['codigo'].'">';
echo '<td>'.$dados['codigo'].'</td>';
echo '<td>'.$dados['estadio'].'</td>';
echo '<td>'.$dados['local'].'</td>';
echo '<td>'.$dados['data'].'</td>';
echo '<td>'.$dados['hora'].'</td>';
echo '<td>'.$dados['time1'].'</td>';
echo '<td>'.$dados['time2'].'</td>';
echo '<td>'.$dados['gol_time1'].'</td>';
echo '<td>'.$dados['gol_time2'].'</td>';
echo '<td><a href="edita_jogo_admin.php?cod='.$dados['codigo'].'">EDITAR</a></td>';
echo '</tr>';
}
echo '</form>';
echo '</table>';
echo '<br><input type="submit" name="acao" value="Excluir">';
?>
</div>
	
</body>
</html>