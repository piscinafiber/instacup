<?php
class Selecao{
public $codigo;
public $sigla;
public $chave;
public $nome;
public $continente;
public $dado;
public $resource;

public function __construct($c="", $s="", $chav="", $n="", $cont=""){

if($c != "" && $s == "" && $chav == "" && $n == "" && $cont =="")
{
	$sql = "SELECT * FROM selecao WHERE codigo='$c'";
	$resultado = mysql_query($sql);
	list($this->codigo,$this->sigla,$this->chave,$this->nome,$this->continente)=mysql_fetch_row($resultado);
}
else
{
$this->codigo = $c;
$this->sigla = $s;
$this->chave = $chav;
$this->nome = $n;
$this->continente = $cont;
}
}
public function insere(){
$sql = "INSERT INTO selecao(sigla, chave, nome, continente) VALUES ('".$this->sigla."','".$this->chave."','".$this->nome."','".$this->continente."')";
$resultado = mysql_query($sql);
return $resultado;
}
public function ListaJogadorSelecao($codigo_selecao){
$sql = "SELECT nome FROM selecao where codigo=".$codigo_selecao."";;
$this->resource = mysql_query($sql);

return $this->resource;
}

public function ListaNomeSelecao(){
$sql = "SELECT nome FROM selecao";;
$this->resource = mysql_query($sql);

return $this->resource;
}
public function executaLista(){
$sql = "SELECT * FROM selecao";
$this->resource = mysql_query($sql);

return $this->resource;
}
public function atualiza(){
$sql = "UPDATE selecao SET sigla='".$this->sigla."', chave='".$this->chave."', nome='".$this->nome."',continente='".$this->continente."' WHERE codigo = '".$this->codigo."'";
$resultado = mysql_query($sql);
return $resultado;
}

public function listaDados(){
$this->dado = mysql_fetch_array($this->resource);
return $this->dado;
}
public function exclui($codigo){
$sql = "DELETE FROM selecao WHERE codigo='$codigo'";
$resultado = mysql_query($sql);

return($resultado);
}
public function montaCombo($nome, $rs, $valor, $descricao){
   	echo("<select name='$nome' class='combo'>");
	echo("<option value=''>--Selecione--</option>");
	while ($obj = mysql_fetch_object($rs)){			
		echo("<option value='".$obj->$valor."' > ". $obj->$descricao." </option>");
	}
	echo("</select>");
}
}
?>