<div class="titulo">Criando Banco</div>

<?php

require_once "conexao.php";

$conexao = novaConexao(null);

$sql = 'CREATE DATABASE IF NOT EXISTS curso_php';

$resultado = $conexao->query($sql);

if($resultado) {
    echo 'sucesso ;)';

}else {'ERRO '. $conexao->error;}

$conexao->close();



?>