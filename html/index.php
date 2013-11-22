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
		<link rel="stylesheet" href="./css/bootstrap.css">

     	<script type="text/javascript" src="jquery-1.7.1.js"></script>
     	<script type="text/javascript" src="./js/bootstrap.js"></script>
     	<script type="text/javascript" src="./js/jquery.form.js"></script>
		
	    <script type="text/javascript">
			
			$( document ).ready( function(){
				
				$( "#cabecalho" ).load( "cabecalho.php" );
				$( "#rodape" ).load( "rodape.html" );

				$('#btnEnviar').click(function(){
					$('#formUpload').ajaxForm({
						uploadProgress: function(event, position, total, percentComplete) {
							$('progress').attr('value',percentComplete);
							$('#porcentagem').html(percentComplete+'%');
						},
						success: function(data) {
							$('progress').attr('value','100');
							$('#porcentagem').html('100%');
							if (data.status == 'ok') {
								$('input[name=base64_foto]').val(data.img);
								$('input[name=base64_tipo]').val(data.type);
								$("#resposta").show();
								$("#resposta").css('background','url(data:'+data.type+';base64,'+data.img+')');
								$("#resposta").css('background-repeat','no-repeat');
								$("#resposta").css('margin-left','180px');
								$("#resposta").css('position','relative');
								$("#resposta").css('float','left');
								$("#resposta").css('margin-bottom','10px');
								$("#resposta").css('width','600px');
								$("#resposta").css('height',data.height);
								$("#excluir_img").show();
								$('#porcentagem').hide();
								$('progress').hide();
								var comment = document.formtorcer.comentario.value; 
								$("#formUpload").find('textarea').val(comment);

							}
						},
						error : function(){
							$('#resposta').html('Erro ao enviar requisição!!!');
						},
						dataType: 'json',
						url: 'enviar_arquivo.php',
						resetForm: true
					}).submit();
				});
				
				$("#excluir_img").click(function(event){
					event.preventDefault();
					$("#resposta").hide();
					$("#resposta").css('background','none');
					$('input[name=base64_foto]').val('');
					$('input[name=base64_tipo]').val('');
				})

				window.setInterval(function(){
					lista_feeds();
				},5000);

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
				foto = document.formtorcer.base64_foto.value;
				tipo = document.formtorcer.base64_tipo.value;
				var_post = "comentario="+comment+"&data_feed="+data_comment+"&codigo_usuario="+usuario+"&selecao_usuario="+selecao+"&nome_usuario="+nome+"&foto="+foto+"&tipo="+tipo;
				xmlhttp.send(var_post);
				
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						lista_feeds();
						document.formtorcer.comentario.value="";
						document.formtorcer.countdown.value=75;
						$("#resposta").hide();
						$("#resposta").css('background','none');
						$('input[name=base64_foto]').val('');
						$('input[name=base64_tipo]').val('');
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

		function initDivUpload(event) {
			event.preventDefault();
			$("#arquivo").click();
			$('#porcentagem').show();
			$('progress').show();
			$('progress').attr('value','0');
			$('#porcentagem').html('0%');
			// $("#")

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
				<div style="width:92%; height:45px;margin-left:4%; padding-top:10px;">				
				<textarea name="comentario" id="comentario" style="resize:none; border-color:#7e9c2f; margin-bottom:3px" onKeyDown="limitText(this.form.comentario,this.form.countdown,75);" 
				onKeyUp="limitText(this.form.comentario,this.form.countdown,75);" ></textarea><br>
				
				<input readonly type="text" name="countdown" size="1" value="75" style="resize:none; border:none;color:#7e9c2f;">caracteres restantes.

				<progress style="display:none" value="0" max="100"></progress><span id="porcentagem" style="display:none">0%</span>
				
				<input type="hidden" name="base64_foto" size="1" />
				<input type="hidden" name="base64_tipo" size="1" />
				
				<div id="resposta" style="display:none;"><button style="display:none; color:#f00 !important; font-size:35px; margin-left:375px; float:left; position:relative" id="excluir_img" class="close">&times;</button></div>
				
				<button type="button" name="acao" onClick="insere_feed()" id="btn-torcer" class="btn btn-success" style=""><i class="icon-thumbs-up icon-white"></i> Torcer</button>
				<button type="button" onclick="initDivUpload(event)" id="btn-photo" class="btn btn-warning">&nbsp;<i class="icon-camera icon-white"></i>&nbsp;Lance</button>
				<!-- <a href="#" onclick="initDivUpload(event)"><img src="./img/camera-icon.png" alt="Enviar imagem" width="28" id="btn-photo" style=""></a> -->
				<br>
				</div>
				<br>
			</form>
			</div>

			<div id="feed" style=" overflow:auto; position:relative; float:left" ></div><br>
		
	</div>
	<script>
		lista_feeds();
	</script>
</body>
</html>
<div class="hide">
	<form name="formUpload" id="formUpload" method="post">
		<label class="hide">Selecione o arquivo: <input type="file" name="arquivo" id="arquivo" size="45" onchange="$('#btnEnviar').click()" /></label>
		<br />
		<input type="button" id="btnEnviar" value="Enviar Arquivo" class="hide" />
		<br>
	</form>
</div>