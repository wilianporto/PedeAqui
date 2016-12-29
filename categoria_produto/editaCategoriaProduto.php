<?php

$link = mysqli_connect('localhost', 'root', '', 'pedeaqui');

if (!$link) {
    die('Não foi possível conectar: ' . mysqli_error());
}

$nome      = $_POST['nNome'];
$descricao = $_POST['nDescri'];
$cod_categoria_prod  = $_POST['cod_categoria_prod'];
$query = "UPDATE categoria_produto SET categoria_produto = '$nome', descricao = '$descricao'
          WHERE cod_categoria_prod = '$cod_categoria_prod'";

$insere = mysqli_query($link, $query);

if($insere){
    echo 'Editado com sucesso';
}else{
    mysqli_error($link);
}

