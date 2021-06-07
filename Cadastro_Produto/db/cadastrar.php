<div class="titulo">Cadastro Produto</div>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<?php

    require_once './calc/calc.php';
    $dados = [];
    $cubico = null;
    $custo = null;
    $valorCubico = null;
    

if (count($_POST) > 0) {
    $erros = [];
    $dados = $_POST;

    
    //aqui um input simples se está presente ou não
    if (trim($dados['nome']) === "") { //filter seria algo que quero valido sobre o input
        $erros["nome"] = 'Nome obrigatorio!';
    }

    if (!filter_var($dados['comprimento'], FILTER_VALIDATE_FLOAT) && $dados['comprimento'] == 0 ) {
        $erros["comprimento"] = 'Comprimento obrigatorio!';
    }

    if (!filter_var($dados['largura'], FILTER_VALIDATE_FLOAT) && $dados['largura'] == 0) {
        $erros["largura"] = 'Largura obrigatorio!';
    }

    if (!filter_var($dados['espessura'], FILTER_VALIDATE_FLOAT) && $dados['espessura'] == 0) {
        $erros["espessura"] = 'Espessura obrigatorio!';
    }

    if (!filter_var($dados['custo'], FILTER_VALIDATE_FLOAT) && $dados['custo'] == 0) {
        $erros["custo"] = 'Espessura obrigatorio!';
    }

    if (!filter_var($dados['espessura'], FILTER_VALIDATE_FLOAT) && $dados['espessura'] == 0) {
        $erros["espessura"] = 'Espessura obrigatorio!';
    }

    if($dados['tipo_custo'] == "Selecione"){
        $erros['tipo_custo'] = "Selecione tipo de custo";
    }
    
    if (count($erros) == 0) {
        
        $cubico = calcCubico($dados['comprimento'],$dados['largura'],$dados['espessura']);

        if($dados['tipo_custo'] =='Peca'){
          $valorCubico = valorCubicoPeca($cubico,$dados['custo']);
        }

        if($dados['tipo_custo'] ==='mt²'){
         $valorCubico = valorCubicoMt($dados['comprimento'],$dados['largura'],$dados['espessura'],$dados['custo']);
        }

        if($dados['tipo_custo'] ==='mt³'){
            $valorCubico = $dados['custo'];
        }

        $lucro = lucroPorcentagem($dados['lucro']);
    }
    
    if (count($erros) == 0) {

        require_once 'conexao.php';
        $conexao = novaConexao();

        $sql = "INSERT INTO produto
        (nome, largura, comprimento, espessura, cubico, custoCubico, lucro, tipo)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";


        $stmt = $conexao->prepare($sql);

        $params = [
            $dados['nome'],
            $dados['largura'],
            $dados['comprimento'],
            $dados['espessura'],
            $cubico,
            $valorCubico,
            $lucro,
            $dados['tipo_custo']

        ];
    
        $stmt->bind_param("sdddddds", ...$params);
        echo "Cadastro Realizado";
        if ($stmt->execute()) {
            unset($dados);
        } else {
            echo $stmt->error;
        }
    }
}
?>





<form action="#" method="POST">

    <div class="form-row">
        <!--Classe bootstrap, compos na mesma linha, 12 colunas -->
        <div class="form-group col-md-12">
            <!--define tamnho grupo input-->
            <label for="nome">Nome</label>
            <input type="text" class='form-control <?= $erros['nome'] ? 'is-invalid' : "" ?>' id="nome" name="nome" placeholder="Nome" value="<?= $dados['nome'] ?>">
            <div class="invalid-feedback">
                <?= $erros['nome'] ?>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4 ">
            <label for="comprimento">Comprimento</label>
            <input type="float" class='form-control <?= $erros['comprimento'] ? 'is-invalid' : "" ?>' id="comprimento" name="comprimento" placeholder="mt" value="<?= $dados['comprimento'] ?>">
            <div class="invalid-feedback">
                <?= $erros['comprimento'] ?>
            </div>
        </div>

        <div class="form-group col-md-4 ">
            <label for="largura">Largura</label>
            <input type="float" class='form-control <?= $erros['largura'] ? 'is-invalid' : "" ?>' id="largura" name="largura" placeholder="cm" value="<?= $dados['largura'] ?>">
            <div class="invalid-feedback">
                <?= $erros['largura'] ?>
            </div>
        </div>

        <div class="form-group col-md-4 ">
            <label for="espessura">Espessura</label>
            <input type="float" class='form-control <?= $erros['espessura'] ? 'is-invalid' : "" ?>' id="espessura" name="espessura" placeholder="cm" value="<?= $dados['espessura'] ?>">
            <div class="invalid-feedback">
                <?= $erros['espessura'] ?>
            </div>
        </div>
    </div>

    <div class="form-row">

     <div class="form-group col-md-6 ">
            <label for="custo">Custo</label>
            <input type="float" class='form-control <?= $erros['custo'] ? 'is-invalid' : "" ?>' id="custo" name="custo" placeholder="Custo" value="<?= $dados['custo'] ?>">
            <div class="invalid-feedback">
                <?= $erros['custo'] ?>
            </div>
        </div>
        <div class="form-group col-md-2 ">
            <label for="tipo_custo">Tipo de custo</label>
            <select  name="tipo_custo" class='form-control <?= $erros['tipo_custo'] ?'is-invalid' : "" ?>' id="tipo_custo" value="">  
                <option value="Selecione"><?= $dados['tipo_custo'] ?"{$dados['tipo_custo']}" : "Selecione"?></option>
                <option value="Peca">Peca</option>
                <option value="mt²">mt²</option>
                <option value="mt³">mt³</option>
            </select>
            <div class="invalid-feedback">
                <?= $erros['tipo_custo'] ?>
            </div>
        </div>
        <div class="form-group col-md-4 ">
            <label for="lucro">Lucro</label>
            <input type="float" class='form-control <?= $erros['lucro'] ? 'is-invalid' : "" ?>' id="lucro" name="lucro" placeholder="%" value="<?= $dados['lucro'] ?>">
            <div class="invalid-feedback">
                <?= $erros['lucro'] ?>
            </div>
        </div>
       
    </div>

    <button class='btn btn-primary'>Enviar</button>
</form>

<style>
 .btn-primary{
    background-color:#1f1f1f;  
    }
</style>