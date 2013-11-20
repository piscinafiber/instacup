<?php
class Comentario{
public $codigo;
public $codigo_user;
public $codigo_selec;
public $texto;
public $golaco;
public $nome;
public $foto;
public $dados;
public $resource;

public function __construct($c="", $cu="",$cs="", $t="", $g="", $n="", $f=""){
if($c != "" && $cu == "" && $cs == "" && $t == "" && $g == "" && $n=="" && $f==""){
$sql = "SELECT * FROM comentario WHERE codigo='$c'";
$resultado = mysql_query($sql);
list($this->codigo,$this->codigo_user,$this->codigo_selec,$this->texto,$this->golaco,$this->nome, $this->foto)=mysql_fetch_row($resultado);
}
else{
$this->codigo = $c;
$this->codigo_user = $cu;
$this->codigo_selec = $cs;
$this->texto = $t;
$this->golaco = $g;
$this->nome = $n;
$this->foto = $f;


}
}

public function insere(){
$sql = "INSERT INTO comentario(codigo_usuario,codigo_selecao , texto_comentario, opcao_golaco,nome, image) 
		VALUES ('".$this->codigo_user."','".$this->codigo_selec."','".$this->texto."','".$this->golaco."','".$this->nome."','".$this->foto."')";
$resultado = mysql_query($sql);
return $resultado;
}

public function atualiza(){
$sql = "UPDATE comentario SET codigo_usuario='".$this->codigo_user."',codigo_selecao ='".$this->codigo_selec."' texto_comentario='".$this->texto."', opcao_golaco='".$this->golaco."', nome='".$this->nome."', image='".$this->foto."' WHERE codigo = '".$this->codigo."'";
$resultado = mysql_query($sql);
return $resultado;
}
public function executaLista(){
$sql = "SELECT * FROM comentario Order by Codigo Desc";
$this->resource = mysql_query($sql);

return $this->resource;
}

public function listaDados(){
$this->dados = mysql_fetch_array($this->resource);
return $this->dados;
}

public function exclui($codigo){
$sql = "DELETE FROM comentario WHERE codigo='$codigo'";
$resultado = mysql_query($sql);

return($resultado);
}
public function listarUsuario(){
$sql = "SELECT usuario.nome FROM usuario inner join comentario on usuario.codigo=comentario.codigo_usuario 
				where codigo_usuario=3";
				$result = mysql_query($sql);

return($result);
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
