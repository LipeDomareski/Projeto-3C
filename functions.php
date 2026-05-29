<?php

//========autenticação de usuários========
function autenticar($email, $senha) {
    global $users;
    foreach ($users as $user) {
        if ($user["email"] === $email && $user["senha"] === $senha) {
            return true;
        }
        }
        echo "usuario não encontrado\n";
        return false;
}

//========listar veiculos========

function listarcarro($vehicles){
foreach ($vehicles as $v) {
    //formatação de valores ienes e real
    $ienesFormatado = "¥ " . number_format($v['preco_ienes'], 0, "", ".");
    $realFormatado = "R$ " . number_format($v['fipe'], 2, ",", ".");
    //calculo para a taxa de importação
    $taxaFormatada = ($v['taxa_importacao'] * 100) . "%";

    echo "\n----------------------------\n";
    echo "ID de veiculo: " . $v['id'] . "\n";
    echo "Carro: " . $v['modelo'] . "\n";
    echo "Ano: " . $v['ano'] . "\n";
    echo "Marca: " . $v['marca'] . "\n";
    
    };
};

//========== Busca por ID ==========

function buscarId ($vehicles){

$busca = readline("Digite o ID do veiculo que deseja pesquisar: \n\n");

foreach ($vehicles as $v){
    if ($busca == $v["id"]){
        $ienesFormatado = "¥ " . number_format($v['preco_ienes'], 0, "", ".");
        $realFormatado = "R$ " . number_format($v['fipe'], 2, ",", ".");
        $taxaFormatada = ($v['taxa_importacao'] * 100) . "%";
        echo "\n";
        echo "ID do veiculo: " . $v["id"] . "\n";
        echo "Modelo: " . $v["modelo"] . "\n";
        echo "Ano: " . $v["ano"] . "\n";
        echo "Marca: " . $v["marca"] . "\n";
        echo "Preço em Ienes: " . $ienesFormatado . "\n";
        echo "Taxa de importação: " . $taxaFormatada . "\n";
        echo "FIPE: " . $realFormatado . "\n";
        echo "Estoque: " . $v["estoque"] . "\n";
        echo "Carroceria: " . $v["carroceria"] . "\n";
    }
}
}

//======== Adicionar Veiculos =============

function adicionarVeiculo (&$vehicles){

    if (empty($vehicles)){
        $addId = 1;
    }
    else{
    $addId = end($vehicles)["id"] +1;
    }
    echo "\n=========================================\n";
    $modelo = readline("Adicione o modelo: ");
    $ano = readline("Adicione o ano: ");
    $marca = readline("Adicione a marca do modelo: ");
    $ienes = readline("Adicione valor em Ienes: ");
    $taxa = readline("Adicione taxa de importação: ");
    $fipe = readline("Adicione o valor da FIPE: ");
    $estoque = readline("Adicione a quantidade no estoque: ");
    $carroceria = readline("Adicione o modelo de carroceria: ");

    $vehicles [] = [
    "id" => $addId,
    "modelo" => $modelo,
    "ano" => $ano,
    "marca" => $marca,
    "ienes" => $ienes,
    "taxa" => $taxa,
    "fipe" => $fipe,
    "estoque" => $estoque,
    "carroceria" => $carroceria
    ];

    echo "Veiculo adicionado com sucesso!";

}

//============= Atualizar veiculo ==============

function atualizarVeiculo(&$vehicles){

    $opcao = readline("Para atualizar o Veiculo desejado digite o ID: ");

    foreach ($vehicles as &$v){

        if($opcao == $v["id"]){
            echo "Modelo atual: " . $v["modelo"] . "\n";
            $v["modelo"] = readline("Mudar modelo: ");
            echo "Ano atual :" . $v["ano"] . "\n";
            $v["ano"] = readline("Mudar ano: ");
            echo "Marca atual: " . $v["marca"] . "\n";
            $v["marca"] = readline("Mudar marca: ");
            echo "Ienes atual: " . $v["preco_ienes"] . "\n";
            $v["preco_ienes"] = readline("Mudar valo em Ienes: ");
            echo "Taxa atual: " . $v["taxa_importacao"] . "\n";
            $v["taxa_importacao"] = readline("Mudar taxa: ");
            echo "FIPE atual: " . $v["fipe"] . "\n";
            $v["fipe"] = readline("Mudar FIPE: ");
            echo "Estoque atual: " . $v["estoque"] . "\n";
            $v["estoque"] = readline("Mudar estoque: ");
            echo "Carroecria atual:" . $v["fipe"] . "\n";
            $v["carroceria"] = readline("Mudar carroceria: ");

            echo "Veiculo atualiazdo com sucesso!\n";

            return;
        }
    }
    echo"Veiculo não encontrado";
}