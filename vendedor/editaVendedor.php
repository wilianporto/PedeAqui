<?php

$link = mysqli_connect('localhost', 'root', '', 'pedeaqui');

if (!$link) {
    die('Não foi possível conectar: ' . mysqli_error());
}

$nome = $_POST['nNome'];
$descricao = $_POST['nDescri'];
$query = "UPDATE vendedor SET descricao = '$descricao' WHERE categoria_vendedor = '$nome'";

$insere = mysqli_query($link, $query);

if($insere){
    echo 'Editado com sucesso';
}else{
    mysqli_error($link);
}

