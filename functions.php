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
        }
        return false;


 //================================================| VEICULOS |===================================================

//========listar veiculos==========
function listarcarro($vehicles){
    foreach ($vehicles as $v) {
        $ienesFormatado = "¥ " . number_format($v['preco_ienes'], 0, "", ".");
        $realFormatado = "R$ " . number_format($v['fipe'], 2, ",", ".");
        $taxaFormatada = ($v['taxa_importacao'] * 100) . "%";

        echo "\n----------------------------\n";
        echo "ID de veiculo: " . $v['id'] . "\n";
        echo "Carro: " . $v['modelo'] . "\n";
        echo "Ano: " . $v['ano'] . "\n";
        echo "Marca: " . $v['marca'] . "\n";
        
    };
};

//======= Buscar veiculo ===========
function buscarId($vehicles) {
    $busca = trim(readline("Digite o ID do veículo que deseja pesquisar: "));

    if ($busca == "") {
        echo "Digite um ID válido!\n";
        return;
    }

    $encontrado = false;

    foreach ($vehicles as $v) {
        if ($busca == $v["id"]) {
            $encontrado = true;

            $ienesFormatado = "¥ " . number_format($v['preco_ienes'], 0, "", ".");
            $fipeFormatada = "R$ " . number_format($v['fipe'], 2, ",", ".");
            $taxaFormatada = ($v['taxa_importacao'] * 100) . "%";

            $taxaCambio = 28;
            $precoEmReal = $v['preco_ienes'] / $taxaCambio;
            $custoImportacao = $precoEmReal + ($precoEmReal * $v['taxa_importacao']);
            $lucroEstimado = $v['fipe'] - $custoImportacao;

            echo "\n=========================================\n";
            echo "🔍   DETALHES DO VEÍCULO ENCONTRADO      \n";
            echo "=========================================\n";
            echo "ID do veículo: " . $v["id"] . "\n";
            echo "Marca/Modelo:  " . $v["marca"] . " " . $v["modelo"] . "\n";
            echo "Chassi:        " . $v["chassi"] . "\n";
            echo "Ano:           " . $v["ano"] . "\n";
            echo "Carroceria:    " . $v["carroceria"] . "\n";
            echo "Estoque:       " . $v["estoque"] . " un.\n";
            echo "-----------------------------------------\n";
            echo "Potência Orig: " . $v["potencia_original"] . " cv\n";
            echo "Potência Atual:" . $v["potencia_atual"] . " cv\n";
            echo "-----------------------------------------\n";
            echo "Preço no Japão:" . $ienesFormatado . "\n";
            echo "Taxa Import. : " . $taxaFormatada . "\n";
            echo "Custo no BR:   R$ " . number_format($custoImportacao, 2, ",", ".") . " (c/ taxas)\n";
            echo "Valor FIPE:    " . $fipeFormatada . "\n";
            
            if ($lucroEstimado > 0) {
                echo "Lucro Estimado: R$ " . number_format($lucroEstimado, 2, ",", ".") . " 🟢\n";
            } else {
                echo "Prejuízo Est. : R$ " . number_format(($lucroEstimado * -1), 2, ",", ".") . " 🔴\n";
            }
            echo "=========================================\n";
            
            break;
        }
    }

    if (!$encontrado) {
        echo "Veículo com ID '$busca' não foi encontrado no catálogo!\n";
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

    $campos = [$modelo, $ano, $marca, $ienes, $taxa, $fipe, $estoque, $carroceria];

    foreach ($campos as $c){

        if (trim($c) == ""){
            echo "preencha todos os campos!\n";
            return;
    }

    }
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

    echo "Veiculo adicionado com sucesso!\n";

}

//============= Atualizar veiculo ==============
function atualizarVeiculo(&$vehicles) {
    $opcao = readline("Para atualizar o veículo desejado digite o ID: ");
    
    if (trim($opcao) == "") {
        echo "❌ Digite um ID válido!\n";
        return;
    }

    foreach ($vehicles as &$v) {
        if ($opcao == $v["id"]) {
            echo "\n🔧 --- ATUALIZANDO: {$v['marca']} {$v['modelo']} --- 🔧\n";
            echo "(Pressione ENTER sem digitar nada para manter o valor atual)\n\n";

            // 1. Modelo
            echo "Modelo atual: " . $v["modelo"] . "\n";
            $newModelo = readline("Mudar modelo: ");
            $v["modelo"] = (trim($newModelo) !== "") ? $newModelo : $v["modelo"];

            // 2. Ano
            echo "Ano atual: " . $v["ano"] . "\n";
            $newAno = readline("Mudar ano: ");
            $v["ano"] = (trim($newAno) !== "") ? (int)$newAno : $v["ano"];

            // 3. Marca
            echo "Marca atual: " . $v["marca"] . "\n";
            $newMarca = readline("Mudar marca: ");
            $v["marca"] = (trim($newMarca) !== "") ? $newMarca : $v["marca"];

            // 4. Preço Ienes
            echo "Ienes atual: " . $v["preco_ienes"] . "\n";
            $newIenes = readline("Mudar valor em Ienes: ");
            $v["preco_ienes"] = (trim($newIenes) !== "") ? (float)$newIenes : $v["preco_ienes"];

            // 5. Taxa de Importação
            echo "Taxa atual: " . $v["taxa_importacao"] . "\n";
            $newTaxa = readline("Mudar taxa: ");
            $v["taxa_importacao"] = (trim($newTaxa) !== "") ? (float)$newTaxa : $v["taxa_importacao"];

            // 6. FIPE
            echo "FIPE atual: " . $v["fipe"] . "\n";
            $newFipe = readline("Mudar FIPE: ");
            $v["fipe"] = (trim($newFipe) !== "") ? (float)$newFipe : $v["fipe"];

            // 7. Estoque
            echo "Estoque atual: " . $v["estoque"] . "\n";
            $newEstoque = readline("Mudar estoque: ");
            $v["estoque"] = (trim($newEstoque) !== "") ? (int)$newEstoque : $v["estoque"];

            // 8. Carroceria
            echo "Carroceria atual: " . $v["carroceria"] . "\n";
            $newCarroceria = readline("Mudar carroceria: ");
            $v["carroceria"] = (trim($newCarroceria) !== "") ? $newCarroceria : $v["carroceria"];

            // -------------------------------------------------------------
            // NOVOS CAMPOS DO PROJETO JDM
            // -------------------------------------------------------------
            
            // 9. Chassi
            echo "Chassi atual: " . $v["chassi"] . "\n";
            $newChassi = readline("Mudar chassi: ");
            $v["chassi"] = (trim($newChassi) !== "") ? $newChassi : $v["chassi"];

            // 10. Potência Original
            echo "Potência Original atual: " . $v["potencia_original"] . " cv\n";
            $newPotenciaOrig = readline("Mudar potência original: ");
            $v["potencia_original"] = (trim($newPotenciaOrig) !== "") ? (int)$newPotenciaOrig : $v["potencia_original"];

            // 11. Potência Atual
            echo "Potência Atual: " . $v["potencia_atual"] . " cv\n";
            $newPotenciaAtual = readline("Mudar potência atual: ");
            $v["potencia_atual"] = (trim($newPotenciaAtual) !== "") ? (int)$newPotenciaAtual : $v["potencia_atual"];

            // Nota: Não mexemos em 'pecas_instaladas' aqui, pois elas serão alteradas na oficina!

            echo "\n🟢 Veículo atualizado com sucesso!\n";
            return;
        }
    }

    echo "❌ Veículo não encontrado!\n";
}

//============ Excluir veiculo ==============
function excluirVeiculo(&$vehicles){
    
    $busca = (int)readline("Digite o ID do veiculo para excluir: ");

    if (trim($busca) == ""){
        echo "ID incorreto!\n";
        return;
    }
    
    foreach ($vehicles as $indice => $v){

        if($busca == $v["id"]){

        unset($vehicles[$indice]);

        echo "Veiculo removido com sucesso!\n";
        return;

        }

    
    }

    echo "ID não encontrado!\n";
    return;
}

//================== Catalago de veiculos ======================
function catalagoVeiculos($vehicles){
    echo "\n======= 🇯🇵 CATÁLOGO JDM IMPORT - VEHICLES 🇯🇵 =======\n";

    foreach($vehicles as $vehicles){
        
        // while (true){

            $custoBrasil  = custosImportacao($vehicles);
            $lucroEstimado = $vehicles["fipe"] - $custoBrasil;

            echo "---------------------------------------------------------\n";
            echo "ID: [{$vehicles['id']}] - {$vehicles['marca']} {$vehicles['modelo']} ({$vehicles['ano']})\n";
            echo "Carroceria: {$vehicles['carroceria']} | Estoque: {$vehicles['estoque']} un.\n";
            echo "Preço no Japão: ¥" . number_format($vehicles['preco_ienes'], 0, ',', '.') . "\n";
            echo "Custo Estimado p/ Brasil (c/ taxas): R$ " . number_format($custoBrasil, 2, ',', '.') . "\n";
            echo "Valor Médio FIPE: R$ " . number_format($vehicles['fipe'], 2, ',', '.') . "\n";
            
            // Uma lógica visual para o usuário ver se dá lucro importar
            if ($lucroEstimado > 0) {
                echo "📊 Margem Estimada de Lucro: R$ " . number_format($lucroEstimado, 2, ',', '.') . " 🟢\n";
            } else {
                echo "📊 Margem Estimada de Lucro: R$ " . number_format($lucroEstimado, 2, ',', '.') . " 🔴 (Prejuízo)\n";
            }
        }
        echo "---------------------------------------------------------\n";
}

// ===================== taxa de importacao ========================
function custosImportacao($vehicles){

    $taxaCambio = 28; // 1 Real = 28 Ienes
    
    // 1. Converte o preço base para Real
    $precoReal = $vehicles['preco_ienes'] / $taxaCambio;
    
    // 2. Calcula o valor do imposto baseado na taxa do veículo
    $Imposto = $precoReal * $vehicles['taxa_importacao'];
    
    // 3. Custo total (Preço convertido + Imposto)
    return $precoReal + $Imposto;
}

//=============== lucro estimado ======================

function lucroEstimado($vehicles){
    $custoTotal = custosImportacao($vehicles);
    
    // Lucro é o valor que ele vale no Brasil menos o quanto custou para importar
    return $vehicles['fipe'] - $custoTotal;
}

//======= painel veiculos ==============
function veiculos(&$vehicles) {
    while (true) {
        echo "\n=========================================\n";
        echo "    🏎️  GERENCIAMENTO DE VEÍCULOS JDM  🏎️    \n";
        echo "=========================================\n";
        echo "1. - Visualizar Catálogo Completo\n";
        echo "2. - Adicionar Novo Veículo\n";
        echo "3. - Atualizar Dados de um Veículo\n";
        echo "4. - Excluir Veículo do Catálogo\n";
        echo "5. - Buscar Veículo por ID\n";
        echo "0. - Voltar ao Menu Principal\n";
        echo "=========================================\n";
        
        $escolha = trim(readline("Selecione uma opção: "));

        switch ($escolha) {
            case "1":
                catalagoVeiculos($vehicles);
                break;

            case "2":
                adicionarVeiculo($vehicles);
                break;

            case "3":
                atualizarVeiculo($vehicles);
                break;

            case "4":
                excluirVeiculo($vehicles);
                break;

            case "5":
                buscarId($vehicles);
                break;

            case "0":
                echo "\nVoltando...\n";
                return;

            default:
                echo "Opção inválida! Digite um número de 0 a 5.\n";
                break;
        }
        
        readline("\nPressione ENTER para continuar...");
    }
}



//=====================================================| AUTO PEÇAS |===============================================

//============== painel de peças ==================

function pecas(&$parts) {
    while (true) {
        echo "\n=========================================\n";
        echo "    🔧  GERENCIAMENTO DE PEÇAS JDM  🔧    \n";
        echo "=========================================\n";
        echo "1. - Visualizar Mercado de Peças\n";
        echo "2. - Adicionar Nova Peça ao Mercado\n";
        echo "3. - Atualizar Dados de uma Peça\n";
        echo "4. - Remover Peça do Mercado\n";
        echo "5. - Buscar Peça por ID\n";
        echo "0. - Voltar ao Menu Principal\n";
        echo "=========================================\n";
        
        $escolha = trim(readline("Selecione uma opção: "));

        switch ($escolha) {
            case "1":
                listarPecas($parts);
                break;

            case "2":
                adicionarPeca($parts);
                break;

            case "3":
                atualizarPeca($parts);
                break;

            case "4":
                removerPeca($parts);
                break;

            case "5":
                buscarPecaPorId($parts);
                break;

            case "0":
                echo "\nVoltando para o Menu Principal...\n";
                return;

            default:
                echo "Opção inválida!\n";
                break;
        }
        
        readline("\nPressione ENTER para continuar...");
    }
}

//============== Listar peças =====================
function listarPecas($parts){
    foreach ($parts as $p) {

        $ienesFormatado = "¥ " . number_format($p['valor_ienes'], 0, "", ".");

        echo "\n----------------------------\n";
        echo "ID da peça: " . $p['id'] . "\n";
        echo "Peça: " . $p['nome'] . "\n";
        echo "Preço em Ienes: " . $ienesFormatado . "\n";
        echo "Ganho de potencia: " . $p['ganho_potencia'] . "\n";
        echo "Comptibilidade: " . $p['compatibilidade_chassi'] . "\n";
        echo "Quantidade: " . $p['estoque'] . "\n";
        };
};

//============== Adicionar Peça ===================
function adicionarPeca (&$parts){

    if (empty($parts)){
        $addId = 1;
    }
    else{
    $addId = end($parts)["id"] +1;
    }
    echo "\n=========================================\n";
    $nome = readline("Adicione o Nome: ");
    $categoria = readline("Adicione o categoria: ");
    $valor = readline("Adicione o valor da peça: ");
    $taxa = readline("Adicione a taxa de importação: ");
    $potencia = readline("Adicione o acrecimo de potencia: ");
    $compatibilidade = readline("Adicione a compatibilidade: ");
    $estoque = readline("Adicione a quantidade no estoque: ");

    $campos = [$nome, $categoria, $valor, $taxa, $potencia, $compatibilidade, $estoque];

    foreach ($campos as $c){

        if (trim($c) == ""){
            echo "preencha todos os campos!\n";
            return;
    }

    }
        $parts [] = [
        "id" => $addId,
        "nome" => $nome,
        "categoria" => $categoria,
        "valor_ienes" => $valor,
        "taxa_importacao" => $taxa,
        "ganho_potencia" => $potencia,
        "compatibilidade_chassi" => $compatibilidade,
        "estoque" => $estoque
        ];

    echo "Veiculo adicionado com sucesso!\n";

}