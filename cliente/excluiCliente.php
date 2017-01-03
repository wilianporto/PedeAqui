<?php

$link = mysqli_connect('localhost', 'root', '', 'pedeaqui');

if (!$link) {
    die('Não foi possível conectar: ' . mysqli_error());
}



$insere = mysqli_query($link, $query);

if($insere){
    echo 'Excluido com sucesso';
}else{
    mysqli_error($link);
}

