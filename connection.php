<?php

$link = mysqli_connect('localhost', 'root', '', 'pedeaqui');
if (!$link) {
    die('Não foi possível conectar: ' . mysqli_error());
}
echo 'Conexão bem sucedida';
mysql_close($link);
?>