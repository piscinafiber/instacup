<?php
class Tabela{
public $codigo;
public $time;
public $vitoria;
public $empate;
public $derrota;
public $saldo_gols;
public $pontos;
public $dados;
public $resource;

public function __construct($c="", $t="", $v="", $e="", $d="", $sg="", $p=""){
if($c != "" && $t == "" && $v == "" && $e == "" && $d == "" && $sg == "" && $p == ""){
$sql = "SELECT * FROM tabelas WHERE codigo='$c'";
$resultado = mysql_query($sql);
list($this->codigo,$this->time,$this->vitoria,$this->empate,$this->derrota,$this->saldo_gols,$this->pontos)=mysql_fetch_row($resultado);
}
else{
$this->codigo = $c;
$this->time = $t;
$this->vitoria = $v;
$this->empate = $e;
$this->derrota = $d;
$this->saldo_gols = $sg;
$this->pontos = $p;
}
}

public function insere(){
$sql = "INSERT INTO tabelas(codigo,time,vitorias,empates,derrotas,saldo_de_gols,pontos) 
		VALUES ('".$this->codigo."','".$this->time."','".$this->vitoria."','".$this->empate."','".$this->derrota."','".
		$this->saldo_gols."','".$this->pontos."')";
$resultado = mysql_query($sql);
return $resultado;
}

public function atualiza(){
$sql = "UPDATE tabelas SET codigo='".$this->codigo."', time='".$this->time."', vitorias='".$this->vitoria."', empates='".$this->empate."'
,derrotas='".$this->derrota."',saldo_de_gols='".$this->saldo_gols."',pontos='".$this->pontos."' WHERE codigo = '".$this->codigo."'";
$resultado = mysql_query($sql);
return $resultado;
}

public function executaLista(){
$sql = "SELECT * FROM tabelas";
$this->resource = mysql_query($sql);

return $this->resource;
}

public function listaDados(){
$this->dados = mysql_fetch_array($this->resource);
return $this->dados;
}

public function exclui($codigo){
$sql = "DELETE FROM tabelas WHERE codigo='$codigo'";
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