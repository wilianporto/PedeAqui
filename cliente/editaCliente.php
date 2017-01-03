<?php

$link = mysqli_connect('localhost', 'root', '', 'pedeaqui');

if (!$link) {
    die('Não foi possível conectar: ' . mysqli_error());
}

$nome = $_POST['nNome'];
$descricao = $_POST['nDescri'];
$cod_cat_vendedor = $_POST['cod_cat_vendedor'];
$query = "UPDATE categoria_vendedor SET categoria_vendedor = '$nome', descricao = '$descricao'
          WHERE cod_cat_vendedor = '$cod_cat_vendedor'";

$insere = mysqli_query($link, $query);

if($insere){
    echo 'Editado com sucesso';
}else{
    mysqli_error($link);
}

