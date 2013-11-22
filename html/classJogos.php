<?php
class Jogos{
public $codigo;
public $estadio;
public $local;
public $data;
public $hora;
public $time1;
public $time2;
public $gol1;
public $gol2;
public $dados;
public $resource;

public function __construct($c="", $e="", $l="", $d="", $h="", $t1="", $t2="",$g1="",$g2=""){
	if($c != "" && $e == "" && $l == "" && $d == "" && $h =="" && $t1 =="" && $t2 =="" && $g1 =="" && $g2 ==""){
	$sql = "SELECT * FROM jogos WHERE codigo='$c'";
	$resultado = mysql_query($sql);
	list($this->codigo,$this->estadio,$this->local,$this->data,$this->hora,$this->time1,$this->time2,$this->gol1,$this->gol2)=mysql_fetch_row($resultado);
}
else
{
$this->codigo = $c;
$this->estadio = $e;
$this->local = $l;
$this->data = $d;
$this->hora = $h;
$this->time1 = $t1;
$this->time2 = $t2;
$this->gol1 = $g1;
$this->gol2 = $g2;

}
}
public function atualiza(){
$sql = "UPDATE jogos SET estadio='".$this->estadio."', local='".$this->local."', data='".$this->data."',hora='".$this->hora."'
,time1='".$this->time1."',time2='".$this->time2."', gol_time1=.'".$this->gol1."', gol_time2='".$this->gol2."' WHERE codigo = '".$this->codigo."'";
$resultado = mysql_query($sql);
return $resultado;
}
public function atualizagol($g1,$g2)
{
	$sql = "UPDATE jogos SET gol_time1='".$g1."',gol_time2='".$g2."' WHERE codigo = '".$this->codigo."'";
$resultado = mysql_query($sql);
return $resultado;
}
public function insere(){
$sql = "INSERT INTO jogos(estadio, local, data, hora, time1, time2,gol_time1,gol_time2) 
		VALUES ('".$this->estadio."','".$this->local."','".$this->data."','".$this->hora."','".$this->time1."','".$this->time2."','0','0')";
$resultado = mysql_query($sql);
return $resultado;
}

public function executaLista(){
$sql = "SELECT jogos.*, selecao1.nome selecao1_nome, selecao2.nome selecao2_nome FROM jogos ";
$sql .= 'JOIN selecao selecao1 on selecao1.codigo = jogos.time1 ';
$sql .= 'JOIN selecao selecao2 on selecao2.codigo = jogos.time2 ';
$this->resource = mysql_query($sql);

return $this->resource;
}

public function listaDados(){
$this->dados = mysql_fetch_array($this->resource);
return $this->dados;
}
public function exclui($codigo){
$sql = "DELETE FROM jogos WHERE codigo='$codigo'";
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