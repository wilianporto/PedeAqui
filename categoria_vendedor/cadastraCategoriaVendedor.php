<?php

$link = mysqli_connect('localhost', 'root', '', 'pedeaqui');

if (!$link) {
    die('Não foi possível conectar: ' . mysqli_error());
}

$nome = $_POST['nNome'];
$descricao = $_POST['nDescri'];

$query = "INSERT INTO categoria_vendedor ( categoria_vendedor, descricao ) VALUES ('$nome', '$descricao')";

$insere = mysqli_query($link, $query);

if($insere){
    echo 'Cadastrado com sucesso';
}else if(mysqli_errno($link) == 1062){
    echo 'Nome ja cadastrado';
}else{
    mysqli_error($link);
}

