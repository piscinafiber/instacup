<?php Session_Start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		 <meta charset="utf-8" />
		<link rel="stylesheet" href="./css/animate.css"> <!-- Optional -->
		<link rel="stylesheet" href="./css/liquid-slider.css">
		<meta http-equiv="Content-Type" content="text/xhtml; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="style.css"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="text/javascript" src="jquery-1.4.2.min.js"></script>
		<link href="css/screen.css" rel="stylesheet" type="text/css" media="screen" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/easySlider1.7.js"></script>
		<title>Instacup - ADM</title>
        <script type="text/javascript">
			
			$( document ).ready( function(){
				
				$( "#cabecalho" ).load( "cabecalhoadm.html" );
				$( "#rodape" ).load( "rodape.html" );
			});
			$(document).ready(function(){	
			$("#slider").easySlider({
				auto: true, 
				continuous: true
			});
		});	
		
        </script>
	</head>
<body background="../../../imagens/campo.jpg" > 

        <div id="cabecalho"></div>
		<div id="content">
			<TABLE width = 750px style="margin-left:50px; margin-top:50px">
                          <TR height=30px>
							<td colspan="7"><center><img src="../icones/logo.jpg" width="100px"  style="border-top-right-radius: 25px; border-bottom-left-radius: 25px; float:center "/></td>
							</TR>
						  <TR height=30px>
                          </TR>
                          <TR>
                               <TD width = 83px>
                              <TD width = 150px>                                  
								<CENTER>  
                                <a href="cad_jogo.php">  <IMG src="jogo.jpg" width="200" height="150" >  
                                <BR><br>
								<div class="nome-estadio">								
								<center>Cadastrar Jogos</div>    </A>                              
                              </TD>
                              <TD width = 80px></TD>
                                 <TD width = 200px>
                                  
                                  <CENTER>  
                                      <a href="cadJogador.php"><IMG src="jogador.jpg" width="200" height="150" >  
                                      </A><BR><br>
									<div class="nome-estadio">									  
                                  <center> Cadastrar Jogador <BR></div>
                              </TD>
                              <TD width = 80px></TD>
                                 <TD width = 200px>
                                  
                                  <CENTER>  
                                     <a href="cadSelecao.php"><IMG src="selecao.jpg" width="200" height="150" >  
                                      </A><BR><br>
									<div class="nome-estadio">
                                  <center> Cadastrar Sele&ccedil;&atilde;o <BR></div>
                              </TD>
                              <TD width = 75px></TD>
                           </TR>
        
						    <TR height=16px>
                          </TR>
                          <TR>
                               <TD width = 83px>
                              <TD width = 200px>
                                  
                                  <CENTER>  
                                      <a href="cadAdmin.php"><IMG src="Administrador.png" width="200" height="150" >  
                                      </A><BR><br>
									<div class="nome-estadio">									  
                                  <center> Novo Administrador <BR></div>
                                  
                              </TD>
                              <TD width = 80px></TD>
                                 <TD width = 200px>
                                  
                                  <CENTER>  
                                      <a href="CadTabelaAdmin.php"><IMG src="tabela.jpg" width="200" height="150" >  
                                      </A><BR><br>
									<div class="nome-estadio">									  
                                  <center> Administrar Tabela <BR></div>
                              </TD>
                              <TD width = 80px></TD>
                                 <TD width = 200px>
                                  
                                  <CENTER>  
                                      <a href="lista_jogos_admin.php"><IMG src="placar.png" width="200" height="150" >  
                                      </A><br><br>
									<div class="nome-estadio">									  
                                  <center> Administrar Placar <BR></div>
                              </TD>
                              <TD width = 75px></TD>
                           </TR>
                           <TR height=20px>
                           </TR>
                         
						    
                              
						   </table>

		</div>
			
</body>
</html>