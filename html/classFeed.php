<?php
class Feed
{
	public $codigo;
	public $codigo_user;
	public $cometario;
	public $data_feed;
	public $dados;
	public $resource;

	public function __construct($c="", $cu="",$com="", $dt="")
	{
		if($c!="" && $cu=="" && $com=="" && $dt=="")
		{
			$sql = "SELECT * FROM feeds WHERE codigo='$c'";
			$resultado = mysql_query($sql);
			list($this->codigo,$this->codigo_user,$this->cometario,$this->data_feed)=mysql_fetch_row($resultado);
		}
			else
		{
			$this->codigo=$c;
			$this->codigo_user=$cu;
			$this->cometario=$com;
			$this->data_feed=$dt;
		}	
	}
	public function insere(){
	$sql = "INSERT INTO feeds(codigo,comentario , cod_usuario ,data_feed) 
			VALUES (null,'".$this->codigo_user."','".$this->cometario."','".$this->data_feed."')";
	$resultado = mysql_query($sql);
	return $resultado;
	}
}
?>