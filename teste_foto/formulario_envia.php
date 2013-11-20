<?
include('banco.php');

//RECEBE DADOS DO FORMULÁRIO 
$Foto = $_FILES["txtFoto"]["tmp_name"]; 
$Tipo = $_FILES["txtFoto"]["type"]; 
http://www.webmaster.pt/mysql-parte-4-exclusao-dados-702.html
// Trata a Imagem
$pont = fopen($Foto, "rb"); 
$dados = fread($pont,filesize($Foto));
fclose($pont);
$dados = $dados; 

//INSERE NA BASE DE DADOS
$query = "INSERT INTO fotos (foto, tipo) VALUES('$dados', '$Tipo')";
$resultado = mysql_query($query);

if ($resultado){
?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> 
	alert ("cadastro efetuado com sucesso");
	window.location.href="formulario.html";
</SCRIPT>
<?
}// Fecha if ($resultado){
?>