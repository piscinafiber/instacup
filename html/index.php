<?php 
Session_Start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
		<title>Instacup</title>
		<meta charset="ISO-8859-1" />
		<link rel="stylesheet" href="./css/animate.css"> <!-- Optional -->
		<link rel="stylesheet" href="./css/liquid-slider.css">
		<link rel="stylesheet" type="text/css" href="style.css"/>
     	<script type="text/javascript" src="jquery-1.7.1.js"></script>
		
	    <script type="text/javascript">
			
			$( document ).ready( function(){
				
				$( "#cabecalho" ).load( "cabecalho.html" );
				$( "#rodape" ).load( "rodape.html" );
			});
				$(document).ready(function()
		{

			$("#Postagem").click(function(){
				$(".showpostagem").show();
				$(".showpostagem").css("background-color","#f1f6e3");
				$("#Postagem").css("height","62px");
			});
			});
			$(function() {
				// $( "#check" ).button();
				// $( "#format" ).buttonset();
			});
		
	
	
		function insere_feed()
		{	
				var xmlhttp;
				if (window.XMLHttpRequest)
				{// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				}
				else
				{// code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.open("POST","grava_feeds.php",true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
				data_comment=new Date();
				comment = document.formtorcer.comentario.value;
				usuario = document.formtorcer.cod_user.value;
				selecao = document.formtorcer.cod_sel.value;
				nome = document.formtorcer.nome.value;
				var_post = "comentario="+comment+"&data_feed="+data_comment+"&codigo_usuario="+usuario+"&selecao_usuario="+selecao+"&nome_usuario="+nome;
				xmlhttp.send(var_post);
				
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						lista_feeds();
						document.formtorcer.comentario.value="";
						document.formtorcer.countdown.value=75;
					}
				}
		}
		function lista_feeds()
		{	
				var xmlhttp;
				if (window.XMLHttpRequest)
				{// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp=new XMLHttpRequest();
				}
				else
				{// code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.open("POST","lista_feed.php",true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
				selecao = document.formtorcer.cod_sel.value;
				xmlhttp.send("selecao="+selecao);
				
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						document.getElementById("feed").innerHTML=xmlhttp.responseText;
					}
				}
		}
	  </script>
	  <script language="javascript" type="text/javascript">
		function limitText(limitField, limitCount, limitNum) {
			if (limitField.value.length > limitNum) {
				limitField.value = limitField.value.substring(0, limitNum);
			} else {
				limitCount.value = limitNum - limitField.value.length;
			}
		}
		</script>
	 
	  <style>
		#format { margin-top: 2em; }
	  </style>
	</head>
    <div id="cabecalho" style="overflow:none;"></div>
	<div id="content">
		<div id="formulario-index">
			<form name="formtorcer" method="post" action="index.php" enctype="multipart/form-data">
				<input type="hidden" name="cod_user" value="<? echo $_SESSION['UsuarioCodigo']; ?>">
				<input type="hidden" name="cod_sel" value="<? echo $_SESSION['UsuarioSelecao']; ?>">
				<input type="hidden" name="nome" value="<? echo $_SESSION['UsuarioNome']; ?>">
				<div style="width:90%; height:45px;margin-left:4%; padding-top:10px;">				
				<textarea name="comentario" id="comentario" style="resize:none; border-color:#7e9c2f" onKeyDown="limitText(this.form.comentario,this.form.countdown,75);" 
				onKeyUp="limitText(this.form.comentario,this.form.countdown,75);" ></textarea><br>
				
				<input readonly type="text" name="countdown" size="1" value="75" style="resize:none; border:none;color:#7e9c2f; background-color:#f1f6e3;">caracteres restantes.<input type="button" name="acao" value="Torcer" onClick="insere_feed()" style="float: right;"/><br>
				</div>
				<br>
			</form>
			</div>
			<div id="feed" style="margin-top:10px; overflow:auto;" ></div><br>
		
	</div>		
	<script>
		lista_feeds();
	</script>
</body>
</html>