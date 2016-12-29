<?php

$link = mysqli_connect('localhost', 'root', '', 'pedeaqui');

if (!$link) {
    die('Não foi possível conectar: ' . mysqli_error());
}

$cod_vendedor = $_POST['cod_vende'];

$query = "DELETE FROM vendedor WHERE cod_vendedor = '$cod_vendedor'";

$insere = mysqli_query($link, $query);

if($insere){
    echo 'Excluido com sucesso';
}else{
    mysqli_error($link);
}

