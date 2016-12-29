<?php

$link = mysqli_connect('localhost', 'root', '', 'pedeaqui');

if (!$link) {
    die('Não foi possível conectar: ' . mysqli_error());
}


$query = "SELECT * FROM categoria_produto";

$banco = mysqli_query($link, $query);

if ($banco) {
    echo "<table class='container centered striped responsive-table'>
            <tr>
            <th>Código</th>
            <th>Nome da Categoria</th>
            <th>Descrição</th>
            <th>Ação</th>
            </tr>";
    while ($row = mysqli_fetch_array($banco)) {
        echo "<tr>";
        echo "<td>" . $row['cod_categoria_prod'] . "</td>";
        echo "<td>" . $row['categoria_produto'] . "</td>";
        echo "<td>" . $row['descricao'] . "</td>";
        echo "<td><a class=\"waves-effect red darken-1 btn\" onclick=\"exclui('" . $row['cod_categoria_prod'] . "')\">Exclui</a>&nbsp;&nbsp;&nbsp;";
        echo "<a class=\"waves-effect blue lighten-1 btn modal-trigger\" onclick=\"modalAltera('" . $row['cod_categoria_prod'] . "', '" . $row['categoria_produto']. "','" . $row['descricao'] . "')\" href=\"#modal1\">Altera</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo mysqli_error($link);
}
