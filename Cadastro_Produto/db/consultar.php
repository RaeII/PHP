<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="titulo">Registros</div>

<?php

require_once "conexao.php";

$sql = "SELECT id, nome, largura, comprimento, espessura,cubico,custoCubico,lucro FROM produto";

$conexao = novaConexao();
$resultado = $conexao->query($sql);

$registros = [];

if ($resultado->num_rows > 0) { //se o numeros de linhas for mais que 0
    while ($row = $resultado->fetch_assoc()) { //vai fazer while para cada linha, assossiado a cada chave, fazendo um array de cada linha.
        $registros[] = $row;
    }
} elseif ($conexao->error) {
    echo "Erro: " . $conexao->error;
}

$conexao->close();;

$tipo = $registros[0]['tipo'];



?>

<table class='table table-hover table-striped table-bordered'>
    <thead>
        <th>id</th>
        <th>Nome</th>
        <th>Valor pç</th>
        <th>Valor mt²</th>
        <th>Valor mt³</th>
    </thead>
    <tbody>
        <?php foreach ($registros as $registro) : ?>
            <?php
           
                $largura = $registro['largura'] / 100;

                $valorCubico = $registro['custoCubico'] * $registro['lucro'];
                $valorPc = $valorCubico * $registro['cubico'];
                $valorMt2 = (1 / $registro['comprimento']) / $largura * $valorPc;

            ?>
            <tr>
                <td><?= $registro['id'] ?></td>
                <td><?= $registro['nome'] . " " . $registro['largura'] . "cm x " . $registro['espessura'] . "cm x " . $registro['comprimento'] . "mt" ?></td>
                <td><?= $valorPc ?></td>
                <td><?= $valorMt2 ?></td>
                <td><?= $valorCubico ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<style>
    table * {
        font-size: 1.5rem;
    }
</style>