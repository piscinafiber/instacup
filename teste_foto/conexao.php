<?
   
$database = "localhost"; // SERVIDOR E PORTA UTILIZADA   
$dbname  = "teste_foto"; // BASE DE DADOS 
$usuario   = "root"; // USUÁRIO DO MYSQL
$dbsenha  = ""; // SENHA DO MYSQL

$conexao=mysql_connect ($database, $usuario, $dbsenha);
if($conexao){
      if (mysql_select_db($dbname, $conexao)){ print "";
      }else{ print "Não foi possível selecionar o Banco de Dados"; }
}else{ print "Erro ao conectar o MySQL"; }

?>