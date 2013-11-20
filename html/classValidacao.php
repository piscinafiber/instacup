<?php
SESSION_START();

class Validacao{

public $login;
public $senha;
public $confsen;
public $dados;
public $resource;

public function __construct($l="",$s="")
{
	$this->login=$l;
	$this->senha=$s;

}
public function NivelAcesso($log,$sen)
{
	$sql = "SELECT nivel_acesso FROM usuario WHERE login ='".$log."' AND senha = '".$sen."'";
	$query = mysql_query($sql);
	
	if($sql == 1)
	{
		$msg = 'admin';
	}
	else if($sql == 0)
	{
		$msg = 'usuario';
	}
	return $msg;
	
}

function validaUsuario() 
{
	$senha = $_POST['senha'];
	$login = $_POST['login'];
	$sql = "SELECT COUNT(*) FROM usuario WHERE login ='".$login."' AND senha = '".$senha."'";
	$query = mysql_query($sql);

    if ($query)
	{
        $row = mysql_fetch_row($query);
    }
	else
	{
        // A consulta foi mal sucedida, retorna false
        return false;
    }

    // Se houver apenas um usuário, retorna true
    return ($row[0] == 1) ? true : false;
	
}
function validaAdmin() 
{
	$senha = $_POST['senha'];
	$login = $_POST['login'];
	$sql = "SELECT COUNT(*) FROM administrador WHERE login ='".$login."' AND senha = '".$senha."'";
	$query = mysql_query($sql);

    if ($query)
	{
        $row = mysql_fetch_row($query);
    }
	else
	{
        // A consulta foi mal sucedida, retorna false
        return false;
    }

    // Se houver apenas um usuário, retorna true
    return ($row[0] == 1) ? true : false;
	
}
function validaSenha()
{

	if($confsen==$this->sen)
	{
		return true;
	}
	else
	{	
		return false;
	}
	
	
}

}
?>

























