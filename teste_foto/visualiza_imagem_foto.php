<?
include('banco.php'); 

$id = $_GET['id'];

// Executa a query, trazendo os dados do banco
$query = "SELECT * FROM fotos where id = $id";
$resultado = mysql_query($query);

$tipo = mysql_result($resultado, 0, "tipo"); 
$foto = mysql_result($resultado, 0, "foto"); 
header("Content-type: $tipo"); 
print $foto;
?>