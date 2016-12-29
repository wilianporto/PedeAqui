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
$cat_vend = $_POST['categ'];
$senha = $_POST['senha'];
$login = $_POST['login'];

$situacao = $_POST['txtSituacao'] === 'true' ? 1 : 0;
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

$query = "INSERT INTO vendedor ( nome_vendedor, cod_endereco, cnpj_cpf, situacao, cod_telefone, cod_cat_vendedor, login, senha) 
          VALUES ('$nome', '$cod_retorno_end', '$documento', '$situacao', '$cod_retorno_tel', '$cat_vend', '$login', '$senha')";

$insere = mysqli_query($link, $query);

if ($insere) {
    echo 'Cadatrado com Sucesso';
} else {
    echo "  cadastro vendedor  ";
    echo mysqli_error($link);
}