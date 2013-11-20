
<?php
//certo
class Usuario{
public $codigo;
public $login;
public $selecaof;
public $sexo;
public $codigo_user;
public $nome;
public $foto;
public $email;
public $senha;
public $status;
public $nivel;

public $dados;
public $resource;

public function __construct($c="",$l="", $sf="", $s="", $no="",$fo="", $e="", $sen="",$sta="",$n="")
{
	if($c != "" && $l == "" && $sf == "" && $s == "" && $no == "" && $fo == "" && $e == "" && $sen == "" && $sta == "" && $n == "")
{
	$sql = "SELECT * FROM usuario WHERE codigo='$c'";
	$resultado = mysql_query($sql);
	list($this->codigo,$this->login,$this->selecaof,$this->sexo,$this->nome,$this->foto,$this->email,$this->senha,$this->status,$this->nivel)=mysql_fetch_row($resultado);
}
else
{
$this->codigo = $c;
$this->login = $l;
$this->selecaof = $sf;
$this->sexo = $s;
$this->nome = $no;
$this->foto=$fo;
$this->email = $e;
$this->senha = $sen;
$this->status=$sta;
$this->nivel=$n;
}
}

public function insere(){
$sql = "INSERT INTO usuario(login, selecao_favorita, sexo, nome,avatar, email, senha,comentario,nivel_acesso) 
		VALUES ('".$this->login."','".$this->selecaof."','".$this->sexo."','".$this->nome."','".$this->foto."','".$this->email."','".$this->senha."','".$this->status."','1')";
$resultado = mysql_query($sql);
return $resultado;
}
public function inserenovo()
{
	$sql = "INSERT INTO  `usuario` (  `login` ,  `selecao_favorita` ,  `sexo` ,  `nome` ,  `avatar` ,  `email` ,  `senha` ,  `comentario` ,  `nivel_acesso` , `ultimo_acesso` ,  `PrimeiroAcesso` ,  `TempoOnline` ,  `Acesso` ) 
VALUES ('".$this->login."','".$this->selecaof."','".$this->sexo."','".$this->nome."','".$this->foto."','".$this->email."','".$this->senha."','".$this->status."','1',''1222/02/22',  '1222/02/22',  '1222/02/22',  '1222/02/22')";
$resultado = mysql_query($sql);
return $resultado;
}
public function atualiza(){
$sql = "UPDATE usuario SET login='".$this->login."', selecao_favorita='".$this->selecaof."', sexo='".$this->sexo."', nome='".$this->nome."'
,avatar='".$this->avatar."' , email='".$this->email."', senha='".$this->senha."', comentario='".$this->status."' WHERE codigo = '".$this->codigo."'";
$resultado = mysql_query($sql);
return $resultado;
}
public function executaLista(){
$sql = "SELECT * FROM usuario ";
$this->resource = mysql_query($sql);

return $this->resource;
}
public function exibeNome(){
$sql = "SELECT nome.usuario FROM usuario inner join comentario on usuario.codigo=comentario.codigo_usuario ";
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