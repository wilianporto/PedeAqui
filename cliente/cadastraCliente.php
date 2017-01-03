<?php

$link = mysqli_connect('localhost', 'root', '', 'pedeaqui');

if (!$link) {
    die('Não foi possível conectar: ' . mysqli_error());
}

$nome = $_POST['nome'];
$documento = $_POST['doc'];
$fone = $_POST['fone'];
$rua = $_POST['rua']; 
$numero = $_POST['numero'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado']; 
$senha = $_POST['senha'];
$login = $_POST['login'];
$tipo = 0;

$query = "INSERT INTO telefone ( telefone ) VALUES ('$fone')";
$insere = mysqli_query($link, $query);

if ($insere) {
    $cod_retorno_tel = mysqli_insert_id($link);
} else {
    echo "   cadastro telefone   ";
    echo mysqli_error($link);
}

$query = "INSERT INTO endereco ( rua, numero, cidade, estado ) VALUES ('$rua', '$numero', '$cidade', '$estado')";
$insere = mysqli_query($link, $query);

if ($insere) {
    $cod_retorno_end = mysqli_insert_id($link);
} else {
    echo "  cadastro endereco  ";
    echo mysqli_error($link);
}

$query = "INSERT INTO cliente ( cod_endereco, nome_cliente, cnpj_cpf, cod_telefone, tipo, login, senha) 
          VALUES ('$cod_retorno_end', '$nome', '$documento', '$cod_retorno_tel', '$tipo', '$login', '$senha')";

$insere = mysqli_query($link, $query);

if ($insere) {
    echo 'Cadatrado com Sucesso';
} else {
    echo "  cadastro cliente  ";
    echo mysqli_error($link);
}