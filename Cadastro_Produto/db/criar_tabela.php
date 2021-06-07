<div class="titulo">Criando tabela</div>

<?php

require_once 'conexao.php';

$sql = "CREATE TABLE IF NOT EXISTS produto(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100) NOT NULL,
largura FLOAT NOT NULL,
comprimento FLOAT NOT NULL,
espessura FLOAT NOT NULL,
cubico FLOAT NOT NULL,
custoCubico FLOAT,
lucro FLOAT
)";

$conexao = novaConexao();
$resultado = $conexao->query($sql);

if($resultado) {
    echo 'sucesso ;)';

}else {'ERRO '. $conexao->error;}

$conexao->close();



?>