<?php

$link = mysqli_connect('localhost', 'root', '', 'pedeaqui');

if (!$link) {
    die('Não foi possível conectar: ' . mysqli_error());
}

$cod_categoria_prod = $_POST['cod_categoria_prod'];

$query = "DELETE FROM categoria_produto WHERE cod_categoria_prod = '$cod_categoria_prod'";

$insere = mysqli_query($link, $query);

if($insere){
    echo 'Excluido com sucesso';
}else{
    mysqli_error($link);
}

