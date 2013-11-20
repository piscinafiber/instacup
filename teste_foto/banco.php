<?php
	$host = "localhost";
	$user = "tipboxar_arena";
	$password = "@123xyz@";
	$database = "tipboxar_instacup";

	if(mysql_connect($host, $user, $password))
	{
		if(mysql_select_db($database))
			$status = false;
		else
			$status = false;
	}
	else
		$status = false;
?>