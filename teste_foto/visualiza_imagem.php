<html><head>
<title>.:: WebMaster.PT :: Visualizando as imagens cadastradas no BD MySQL</title>
</head><body>
<h2>Visualizando As Imagens Cadastradas No BD MySQL</h2>

<?
// Inclui o arquivo de conexão
include('banco.php'); 

//EXECUTA A QUERY 
$query = "SELECT * FROM fotos";
$resultado = mysql_query($query);

if($resultado){

while ($campo = mysql_fetch_array($resultado)){
  $id   = $campo['0']; 
  $foto   = $campo['1'];
  $tipo   = $campo['2'];

echo "<img src='visualiza_imagem_foto.php?id=$id' border='1'><br><br>";
}  // Fecha if($resultado){
} // Fecha while ($campo = mysql_fetch_array($resultado)){
?>