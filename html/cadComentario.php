<?php
//certo
Session_start();
include("banco.php");
include("classComentario.php");

$bd =  new Banco();
$coment = new Comentario("",$_SESSION['UsuarioCodigo'],$_POST['comentario'],'1');
$resultado = $coment->insere();

$msg = $coment->executaLista();
echo '<form method="post" action ="cadComentario.php"">
<table border="1">
<tr>
<th>Usuario</th>
<th>Comentário</th>
<th>Golaço</th>
<th></th>
</tr>';

while($dados = $coment->listaDados()){
echo '<tr>';
echo '<td>'.$dados['codigo_usuario'].'</td>';
echo '<td>'.$dados['texto_comentario'].'</td>';
echo '<td>'.$dados['opcao_golaco'].'</td>';
echo '</tr>';
}
echo '</form>';
echo '</table>';


?>
