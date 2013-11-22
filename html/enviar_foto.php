<?php
/* Importa o arquivo onde a função de upload está implementada */
require_once('resizeImage.php');

/* Captura o arquivo selecionado */
$arquivo = $_FILES["arquivo"]["tmp_name"];
$tamanho = $_FILES["arquivo"]["size"];
$tipo    = $_FILES["arquivo"]["type"];

$fp = fopen($arquivo, "rb");
$conteudo = fread($fp, $tamanho);
fclose($fp); 

// $tipos = array('jpg', 'png', 'gif', 'bmp');
$objResize = new resizeImage();
$conteudo = $objResize->resize($arquivo,$tipo,100,100);
$data_retorno = array('status'=>'ok','img'=>base64_encode($conteudo['img']),'type'=>"$tipo",'height'=>$conteudo['height']);
echo json_encode($data_retorno);