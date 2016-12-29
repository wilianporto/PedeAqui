<?php

$link = mysqli_connect('localhost', 'root', '', 'pedeaqui');

if (!$link) {
    die('Não foi possível conectar: ' . mysqli_error());
}

$cod_cat_vendedor = $_POST['cod_cat_vendedor'];

$query = "DELETE FROM categoria_vendedor WHERE cod_cat_vendedor = '$cod_cat_vendedor'";

$insere = mysqli_query($link, $query);

if($insere){
    echo 'Excluido com sucesso';
}else{
    mysqli_error($link);
}

