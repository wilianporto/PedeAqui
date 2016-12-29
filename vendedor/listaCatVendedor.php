<?php

$link = mysqli_connect('localhost', 'root', '', 'pedeaqui');

if (!$link) {
    die('Não foi possível conectar: ' . mysqli_error());
}


$query = "SELECT cod_cat_vendedor, categoria_vendedor FROM categoria_vendedor";

$banco = mysqli_query($link, $query);

if ($banco) {
    echo "<div class='input-field col s12'>
            <select id='categora_vendedor'>
                <option value='' disabled selected>Selecione uma categoria</option>";
    while ($row = mysqli_fetch_array($banco)) {
        echo "<option value='" . $row['cod_cat_vendedor'] . "'>" . $row['categoria_vendedor'] . "</option>";
    }
    echo "</select>";
    echo"<label>Categoria do Vendedor</label>";
    echo "</div>";
} else {
    echo mysqli_error($link);
}
