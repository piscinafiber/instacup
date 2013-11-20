<?php
class Admin{
public $codigo;
public $nome;
public $sobrenome;
public $senha;
public $login;
public $dados;
public $resource;

public function __construct($c="", $n="", $s="", $senha="",$l="")
{
	if($c != "" && $n == "" && $s == "" && $senha == "" && $l ==""){
	$sql = "SELECT * FROM administrador WHERE codigo='$c'";
	$resultado = mysql_query($sql);
	list($this->codigo,$this->nome,$this->sobrenome,$this->senha)=mysql_fetch_row($resultado);
}
else
{
	$this->codigo = $c;
	$this->nome = $n;
	$this->sobrenome = $s;
	$this->senha = $senha;
	$this->login= $l;
	
}
}

public function insere(){
$sql = "INSERT INTO administrador(nome, sobrenome, senha,Nivel_Acesso,login) 
		VALUES ('".$this->nome."','".$this->sobrenome."','".$this->senha."','0','".$this->login."')";
$resultado = mysql_query($sql);
return $resultado;
}

public function atualiza(){
$sql = "UPDATE administrador SET nome='".$this->nome."', sobrenome='".$this->sobrenome."', senha='".$this->senha."',login='".$this->login."' WHERE codigo = '".$this->codigo."'";
$resultado = mysql_query($sql);
return $resultado;
}

public function executaLista(){
$sql = "SELECT * FROM usuario where nivel_acesso=0";
$this->resource = mysql_query($sql);

return $this->resource;
}

public function listaDados(){
$this->dados = mysql_fetch_array($this->resource);
return $this->dados;
}

public function exclui($codigo){
$sql = "DELETE FROM usuario WHERE codigo='$codigo'";
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