<?php
class Jogador{
public $codigo;
public $codigo_selecao;
public $nome;
public $idade;
public $posicao;
public $datanasc;
public $nacionalidade;
public $pe;
public $apelido;
public $clubeat;
public $numero;
public $localnsc;
public $foto;
public $dados;
public $resource;

public function __construct($c="", $cs="", $n="", $i="", $p="",$d="", $ln = "",$na="",$pe="",$ap="",$cl="",$nu="",$f=""){
if($c != "" && $cs == "" && $n == "" && $i == ""&& $p == "" && $d == "" && $ln == "" && $na == ""&& $pe == "" && $ap == "" && $cl == "" && $nu == ""&& $f == ""){
$sql = "SELECT * FROM jogador WHERE codigo='$c'";
$resultado = mysql_query($sql);
list($this->codigo,$this->codigo_selecao,$this->nome,$this->idade,$this->posicao,$this->datanasc,$this->nacionalidade,$this->pe,$this->apelido,$this->clubeat,$this->numero,$this->foto)=mysql_fetch_row($resultado);
}
else{
$this->codigo = $c;
$this->codigo_selecao = $cs;
$this->nome = $n;
$this->idade = $i;
$this->posicao = $p;
$this->datanasc = $d;
$this->localnsc = $l;
$this->nacionalidade = $na;
$this->pe = $pe;
$this->apelido = $ap;
$this->clubeat = $cl;
$this->numero = $nu;
$this->foto = $f;
}
}

public function insere(){
$sql = "INSERT INTO jogador(codigo_selecao, nome, idade, posicao,dtnasc,localdenasc,Nacionalidade,Pe,Apelido,Clube Atual,Numero,foto) 
		VALUES ('".$this->codigo_selecao."','".$this->nome."','".$this->idade."','".$this->posicao."','".$this->datanasc."','".$this->localnsc."','".$this->nacionalidade."','".$this->pe."','".$this->apelido."','".$this->clubeat."','".$this->numero."','".$this->foto."')";
$resultado = mysql_query($sql);
return $resultado;
}

public function atualiza(){
$sql = "UPDATE jogador SET codigo_selecao='".$this->codigo_selecao."', nome='".$this->nome."', idade='".$this->idade."', posicao='".$this->posicao."', dtnasc='".$this->datanasc."', localdenasc='".$this->localnsc."', Nacionalidade='".$this->nacionalidade."', Pe='".$this->pe."' Apelido='".$this->apelido."', Clube Atual='".$this->clubeat."', Numero='".$this->numero."', foto='".$this->foto."' WHERE codigo = '".$this->codigo."'";
$resultado = mysql_query($sql);
return $resultado;
}
public function ListaJogador($nome){
$sql ="select jogador.nome,jogador.idade,jogador.posicao,
selecao.nome from jogador 
inner join selecao on jogador.codigo_selecao=selecao.codigo
where jogador.nome ='".$nome."'";
$this->resource = mysql_query($sql);

return $this->resource;
}
public function executaLista(){
$sql = "SELECT * FROM jogador";
$this->resource = mysql_query($sql);

return $this->resource;
}
public function ListaJogadorSel($codigo_selecao){
$sql = "SELECT nome FROM jogador where codigo_selecao=".$codigo_selecao."";;
$this->resource = mysql_query($sql);

return $this->resource;
}
public function listaDados(){
$this->dados = mysql_fetch_array($this->resource);
return $this->dados;
}

public function exclui($codigo){
$sql = "DELETE FROM jogador WHERE codigo='$codigo'";
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