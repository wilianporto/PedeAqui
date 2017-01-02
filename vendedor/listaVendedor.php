<?php

$link = mysqli_connect('localhost', 'root', '', 'pedeaqui');

if (!$link) {
    die('Não foi possível conectar: ' . mysqli_error());
}
$query = "SELECT v.cod_vendedor, v.nome_vendedor, v.cnpj_cpf, v.cod_telefone, v.situacao,v.cod_endereco, v.cod_cat_vendedor,
                 c.categoria_vendedor, c.descricao,
                 t.telefone, 
                 e.rua, e.numero, e.cidade, e.estado
          FROM vendedor v, 
               categoria_vendedor c, 
               telefone t, 
               endereco e 
          WHERE v.cod_cat_vendedor = c.cod_cat_vendedor and 
                v.cod_telefone = t.cod_telefone and
                v.cod_endereco = e.cod_endereco";

$banco = mysqli_query($link, $query);

if ($banco) {
    echo "<table class='highlight centered responsive-table'>
            <tr>
            <th>Código</th>
            <th>Nome do vendedor</th>
            <th>Categoria</th>
            <th>Telefone</th>
            <th>Situação</th>
            <th>Cidade/Estado</th>
            <th></th>
            </tr>";
    while ($row = mysqli_fetch_array($banco)) {
        echo "<tr>";
        echo "<td>" . $row['cod_vendedor']       . "</td>";
        echo "<td>" . $row['nome_vendedor']      . "</td>";
        echo "<td>" . $row['categoria_vendedor'] . "</td>";
        echo "<td>" . $row['telefone']           . "</td>";
        if ($row['situacao'] == 1){
            echo "<td>Ativo</td>";
        }else{
            echo "<td>Inativo</td>";
        }
        echo "<td>" . $row['cidade']. "-" . $row['estado'] . "</td>";
        echo "<td><a class=\"waves-effect red darken-1 btn\" onclick=\"exclui('" . $row['cod_vendedor'] . "')\">Exclui</a>&nbsp;&nbsp;&nbsp;";
        echo "<a class=\"waves-effect blue lighten-1 btn modal-trigger\" onclick=\"modalAltera('" . $row['cod_vendedor'] . "','" . $row['cod_telefone'] . "','" . $row['cod_cat_vendedor'] . "','" . $row['cod_endereco'] . "','" . $row['nome_vendedor'] . "','" . $row['descricao'] . "','" . $row['categoria_vendedor'] . "','" . $row['telefone'] . "','" . $row['situacao'] . "','" . $row['cidade'] . "','" . $row['estado'] . "')\" href=\"#modal1\">Altera</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo mysqli_error($link);
}
