<?php

$link = mysqli_connect('localhost', 'root', '', 'pedeaqui');

if (!$link) {
    die('Não foi possível conectar: ' . mysqli_error());
}


$query = "SELECT * FROM produto";

$banco = mysqli_query($link, $query);

if ($banco) {
    echo "<table class='container centered striped responsive-table'>
            <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Marca</th>
            <th>Vendedor</th>
            <th>Estoque</th>
            <th>Valor</th>
            </tr>";
    while ($row = mysqli_fetch_array($banco)) {
        echo "<tr>";
        echo "<td>" . $row['cod_produto'] . "</td>";
        echo "<td>" . $row['descricao_produto'] . "</td>";
        echo "<td>" . $row['marca'] . "</td>";
        echo "<td>" . $row['cod_vendedor'] . "</td>";
        echo "<td>" . $row['estoque'] . "</td>";
        echo "<td>" . $row['valor_produto'] . "</td>";
        echo "<td><a class=\"waves-effect red darken-1 btn\" onclick=\"exclui('" . $row['cod_produto'] . "')\">Exclui</a>&nbsp;&nbsp;&nbsp;";
    //    echo "<a class=\"waves-effect blue lighten-1 btn modal-trigger\" onclick=\"modalAltera('" . $row['cod_produto'] . "', '" . $row['categoria_produto']. "','" . $row['descricao'] . "')\" href=\"#modal1\">Altera</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo mysqli_error($link);
}
