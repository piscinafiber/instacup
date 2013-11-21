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
				
				$( "#cabecalho" ).load( "cabecalho.html" );
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
								$("#formUpload").find('input[name=base64_foto]').val(data.img);
								$("#formUpload").find('input[name=base64_tipo]').val(data.type);
								$("#resposta").css('background','url(data:'+data.type+';base64,'+data.img+')');
								$("#resposta").css('width','400px');
								$("#resposta").css('height',data.height);
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

				$('#myModal').modal('hidden',function(){
					$("#resposta").removeAttr('style');
				})


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
				foto = document.formUpload.base64_foto.value;
				tipo = document.formUpload.base64_tipo.value;
				var_post = "comentario="+comment+"&data_feed="+data_comment+"&codigo_usuario="+usuario+"&selecao_usuario="+selecao+"&nome_usuario="+nome+"&foto="+foto+"&tipo="+tipo;
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


		function modalUpload(event) {
			event.preventDefault();
			var comment = document.formtorcer.comentario.value; 
			$("#formUpload").find('textarea').val(comment);
			$("#modal").modal('show');
			$("#arquivo").click();
			$('#porcentagem').show();
			$('progress').show();
			$('progress').attr('value','0');
			$('#porcentagem').html('0%');


			// alert('modal - ' +  comment );
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
				
				<input readonly type="text" name="countdown" size="1" value="75" style="resize:none; border:none;color:#7e9c2f; background-color:#f1f6e3;">caracteres restantes.<input type="button" name="acao" value="Torcer" onClick="insere_feed()" id="btn-torcer" class="btn btn-success" style=""/><a href="#" onclick="modalUpload(event)"><img src="./img/camera-icon.png" alt="Enviar imagem" width="28" id="btn-photo" style=""></a><br>
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
<div id="modal" class="modal hide fade">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3>Foto</h3>
	</div>
	<div class="modal-body">
	<form name="formUpload" id="formUpload" method="post">
    	<textarea name="comentario" id="comentario" style="resize:none; border-color:#7e9c2f" onKeyDown="limitText(this.form.comentario,this.form.countdown_modal,75);" 
				onKeyUp="limitText(this.form.comentario,this.form.countdown_modal,75);" ></textarea>
		<br>
		<input readonly type="text" name="countdown_modal" size="1" value="75" style="resize:none; border:none;color:#7e9c2f; background-color:#f1f6e3;">caracteres restantes.
		<input type="hidden" name="base64_foto" size="1" />
		<input type="hidden" name="base64_tipo" size="1" />
		<br>
		<br>

	    <label class="hide">Selecione o arquivo: <input type="file" name="arquivo" id="arquivo" size="45" onchange="$('#btnEnviar').click()" /></label>
        <br />
        <progress value="0" max="100"></progress><span id="porcentagem">0%</span>
        <br />
        <input type="button" id="btnEnviar" value="Enviar Arquivo" class="hide" />
		<br>
	    <div id="resposta">
        </div>
	</form>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal" style="color:#000 !important">Fechar</a>
		<a href="#" class="btn btn-success" onClick="insere_feed()">Torcer</a>
	</div>
</div>