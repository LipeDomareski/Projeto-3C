<?php

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
        echo "Digite um ID válido!\n";
        return;
    }

    foreach ($vehicles as &$v) {
        if ($opcao == $v["id"]) {
            echo "\n🔧 --- ATUALIZANDO: {$v['marca']} {$v['modelo']} --- 🔧\n";
            echo "(Pressione ENTER sem digitar nada para manter o valor atual)\n\n";

            echo "Modelo atual: " . $v["modelo"] . "\n";
            $newModelo = readline("Mudar modelo: ");
            $v["modelo"] = (trim($newModelo) !== "") ? $newModelo : $v["modelo"];

            echo "Ano atual: " . $v["ano"] . "\n";
            $newAno = readline("Mudar ano: ");
            $v["ano"] = (trim($newAno) !== "") ? (int)$newAno : $v["ano"];

            echo "Marca atual: " . $v["marca"] . "\n";
            $newMarca = readline("Mudar marca: ");
            $v["marca"] = (trim($newMarca) !== "") ? $newMarca : $v["marca"];

            echo "Ienes atual: " . $v["preco_ienes"] . "\n";
            $newIenes = readline("Mudar valor em Ienes: ");
            $v["preco_ienes"] = (trim($newIenes) !== "") ? (float)$newIenes : $v["preco_ienes"];

            echo "Taxa atual: " . $v["taxa_importacao"] . "\n";
            $newTaxa = readline("Mudar taxa: ");
            $v["taxa_importacao"] = (trim($newTaxa) !== "") ? (float)$newTaxa : $v["taxa_importacao"];

            echo "FIPE atual: " . $v["fipe"] . "\n";
            $newFipe = readline("Mudar FIPE: ");
            $v["fipe"] = (trim($newFipe) !== "") ? (float)$newFipe : $v["fipe"];

            echo "Estoque atual: " . $v["estoque"] . "\n";
            $newEstoque = readline("Mudar estoque: ");
            $v["estoque"] = (trim($newEstoque) !== "") ? (int)$newEstoque : $v["estoque"];

            echo "Carroceria atual: " . $v["carroceria"] . "\n";
            $newCarroceria = readline("Mudar carroceria: ");
            $v["carroceria"] = (trim($newCarroceria) !== "") ? $newCarroceria : $v["carroceria"];

            echo "Chassi atual: " . $v["chassi"] . "\n";
            $newChassi = readline("Mudar chassi: ");
            $v["chassi"] = (trim($newChassi) !== "") ? $newChassi : $v["chassi"];

            echo "Potência Original atual: " . $v["potencia_original"] . " cv\n";
            $newPotenciaOrig = readline("Mudar potência original: ");
            $v["potencia_original"] = (trim($newPotenciaOrig) !== "") ? (int)$newPotenciaOrig : $v["potencia_original"];

            echo "Potência Atual: " . $v["potencia_atual"] . " cv\n";
            $newPotenciaAtual = readline("Mudar potência atual: ");
            $v["potencia_atual"] = (trim($newPotenciaAtual) !== "") ? (int)$newPotenciaAtual : $v["potencia_atual"];

            // idea: Não mexemos em 'pecas_instaladas' aqui, pois elas serão alteradas na oficina!

            echo "\n🟢 Veículo atualizado com sucesso!\n";
            return;
        }
    }

    echo "Veículo não encontrado!\n";
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
        echo "6. - Buscar Peça por Categoria\n";
        echo "7. - Buscar Peça por Compatibilidade\n";
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
                buscarPecaId($parts);
                break;

            case "6":
                buscarCategoria($parts);
                break;

            case "7":
                buscarCompatibilidade($parts);
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

//============== Atualizar Peças ==================
function atualizarPeca(&$parts) {
    $opcao = readline("Para atualizar a peça desejada digite o ID: ");
    
    if (trim($opcao) == "") {
        echo "Digite um ID válido!\n";
        return;
    }

    foreach ($parts as &$p) {
        if ($opcao == $p["id"]) {
            echo "\n🔧 --- ATUALIZANDO PEÇA: {$p['nome']} --- 🔧\n";
            echo "(Pressione ENTER sem digitar nada para manter o valor atual)\n\n";

            echo "Nome atual: " . $p["nome"] . "\n";
            $newNome = readline("Mudar nome: ");
            $p["nome"] = (trim($newNome) !== "") ? $newNome : $p["nome"];

            echo "Categoria atual: " . $p["categoria"] . "\n";
            $newCategoria = readline("Mudar categoria: ");
            $p["categoria"] = (trim($newCategoria) !== "") ? $newCategoria : $p["categoria"];

            echo "Preço em Ienes atual: ¥" . number_format($p["valor_ienes"], 0, "", ".") . "\n";
            $newValor = readline("Mudar valor em Ienes: ");
            $p["valor_ienes"] = (trim($newValor) !== "") ? (float)$newValor : $p["valor_ienes"];

            echo "Taxa atual: " . ($p["taxa_importacao"] * 100) . "%\n";
            $newTaxa = readline("Mudar taxa (Ex: 0.40): ");
            $p["taxa_importacao"] = (trim($newTaxa) !== "") ? (float)$newTaxa : $p["taxa_importacao"];

            echo "Ganho de potência atual: " . $p["ganho_potencia"] . " cv\n";
            $newPotencia = readline("Mudar ganho de potência: ");
            $p["ganho_potencia"] = (trim($newPotencia) !== "") ? (int)$newPotencia : $p["ganho_potencia"];

            echo "Compatibilidade atual: " . $p["compatibilidade_chassi"] . "\n";
            $newCompatibilidade = readline("Mudar compatibilidade: ");
            $p["compatibilidade_chassi"] = (trim($newCompatibilidade) !== "") ? $newCompatibilidade : $p["compatibilidade_chassi"];

            echo "Estoque atual: " . $p["estoque"] . "\n";
            $newEstoque = readline("Mudar estoque: ");
            $p["estoque"] = (trim($newEstoque) !== "") ? (int)$newEstoque : $p["estoque"];

            echo "\n🟢 Peça atualizada com sucesso!\n";
            return;
        }
    }

    echo "Peça não encontrada!\n";
}

//============ Remover Peça do Mercado ============
function removerPeca(&$parts) {
    $busca = (int)readline("Digite o ID da peça para remover: ");

    if ($busca <= 0) {
        echo "❌ ID inválido!\n";
        return;
    }
    
    foreach ($parts as $indice => $p) {
        if ($busca == $p["id"]) {
            unset($parts[$indice]);
            $parts = array_values($parts); // Reorganiza os índices do array
            echo "🗑️ Peça removida do mercado com sucesso!\n";
            return;
        }
    }

    echo "❌ ID não encontrado!\n";
}

//============ Buscar Peça por ID =================
function buscarPecaId($parts) {
    $busca = trim(readline("Digite o ID da peça que deseja pesquisar: "));

    if ($busca == "") {
        echo "Digite um ID válido!\n";
        return;
    }

    foreach ($parts as $p) {
        if ($busca == $p["id"]) {
            $taxaCambio = 28;
            $precoReal = $p['valor_ienes'] / $taxaCambio;
            $custoImportacao = $precoReal + ($precoReal * $p['taxa_importacao']);

            echo "\n=========================================\n";
            echo "🔍       DETALHES DA PEÇA JDM            \n";
            echo "=========================================\n";
            echo "ID da Peça:     " . $p["id"] . "\n";
            echo "Nome:           " . $p["nome"] . "\n";
            echo "Categoria:      " . $p["categoria"] . "\n";
            echo "Compatibilidade:" . $p["compatibilidade_chassi"] . "\n";
            echo "Estoque Loja:   " . $p["estoque"] . " un.\n";
            echo "-----------------------------------------\n";
            echo "Ganho Real:     +" . $p["ganho_potencia"] . " cv 🔥\n";
            echo "-----------------------------------------\n";
            echo "Preço no Japão: ¥" . number_format($p['valor_ienes'], 0, "", ".") . "\n";
            echo "Taxa Import. :  " . ($p['taxa_importacao'] * 100) . "%\n";
            echo "Custo Estimado: R$ " . number_format($custoImportacao, 2, ",", ".") . " (c/ taxas)\n";
            echo "=========================================\n";
            return;
        }
    }

    echo "Peça com ID '$busca' não foi encontrada!\n";
}

//============ Busca Por categoria ================
function buscarCategoria($parts) {
    $busca = trim(readline("Digite a categoria da peça que deseja pesquisar: "));

    if ($busca == "") {
        echo "Digite uma categoria válida!\n";
        return;
    }

    foreach ($parts as $p) {
        if ($busca == $p["categoria"]) {
            $taxaCambio = 28;
            $precoReal = $p['valor_ienes'] / $taxaCambio;
            $custoImportacao = $precoReal + ($precoReal * $p['taxa_importacao']);

            echo "\n=========================================\n";
            echo "ID da Peça:     " . $p["id"] . "\n";
            echo "Nome:           " . $p["nome"] . "\n";
            echo "Categoria:      " . $p["categoria"] . "\n";
            echo "Compatibilidade:" . $p["compatibilidade_chassi"] . "\n";
            echo "Estoque Loja:   " . $p["estoque"] . " un.\n";
            echo "-----------------------------------------\n";
            echo "Ganho Real:     +" . $p["ganho_potencia"] . " cv\n";
            echo "-----------------------------------------\n";
            echo "Preço no Japão: ¥" . number_format($p['valor_ienes'], 0, "", ".") . "\n";
            echo "Taxa Import. :  " . ($p['taxa_importacao'] * 100) . "%\n";
            echo "Custo Estimado: R$ " . number_format($custoImportacao, 2, ",", ".") . " (c/ taxas)\n";
            echo "=========================================\n";
            return;
        }
    }

    echo "Peça com ID '$busca' não foi encontrada!\n";
}

//============ Buscar Por Compatibilidade =========
function buscarCompatibilidade($parts) {
    $busca = trim(readline("Digite a Plataforma para verificar peças compativeis: "));

    if ($busca == "") {
        echo "Digite uma Categoria válida!\n";
        return;
    }

    foreach ($parts as $p) {
        if ($busca == $p["compatibilidade_chassi"]) {
            $taxaCambio = 28;
            $precoReal = $p['valor_ienes'] / $taxaCambio;
            $custoImportacao = $precoReal + ($precoReal * $p['taxa_importacao']);
            
            echo "\n=========================================\n";
            echo "ID da Peça:     " . $p["id"] . "\n";
            echo "Nome:           " . $p["nome"] . "\n";
            echo "Categoria:      " . $p["categoria"] . "\n";
            echo "Compatibilidade:" . $p["compatibilidade_chassi"] . "\n";
            echo "Estoque Loja:   " . $p["estoque"] . " un.\n";
            echo "-----------------------------------------\n";
            echo "Ganho Real:     +" . $p["ganho_potencia"] . " cv 🔥\n";
            echo "-----------------------------------------\n";
            echo "Preço no Japão: ¥" . number_format($p['valor_ienes'], 0, "", ".") . "\n";
            echo "Taxa Import. :  " . ($p['taxa_importacao'] * 100) . "%\n";
            echo "Custo Estimado: R$ " . number_format($custoImportacao, 2, ",", ".") . " (c/ taxas)\n";
            echo "=========================================\n";
            return;
        }
    }

    echo "Peças compativeis com o '$busca' não foram encontradas!\n";
}


//=========================================== Usuarios/Pilotos ===============================================

//========== autenticação de usuários ========
function autenticar($email, $senha) {
    global $users, $usuarioId; // 🟢 Puxa o banco e a sessão global do index.php

    foreach ($users as $u) {
        // CORRIGIDO: Agora usa $email e $senha, que vêm dos parênteses da função!
        if ($u['email'] == $email && $u['senha'] == $senha) {
            $usuarioId = $u['id']; // 🟢 Guarda o ID do usuário que logou de verdade!
            echo "🟢 Login feito com sucesso!\n";
            return true;
        }
    }
    echo "❌ E-mail ou senha incorretos.\n";
    return false;
}

//========== painel Usuarios =================
function painelUsuarios(&$user){
     while (true) {
        echo "\n=========================================\n";
        echo "      👥  Painel de Usuarios 👥    \n";
        echo "=========================================\n";
        echo "1. - Visualizar Usuarios Ativos\n";
        echo "2. - Adicionar Usuarios\n";
        echo "3. - Atualizar Usuarios\n";
        echo "4. - Remover Usuarios\n";
        echo "5. - Buscar Usuarios pelo ID\n";
        echo "6. - Buscar Usuarios por Nivel\n";
        echo "0. - Voltar para o Menu!\n";
        echo "=========================================\n";
        
        $escolha = trim(readline("Selecione uma opção: "));

        switch ($escolha) {
            case "1":
                listarUsuarios($users);
                break;

            case "2":
                adicionarUsuario($users);
                break;

            case "3":
                break;

            case "4":
                break;

            case "5":
                break;

            case "6":
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

//========== listar Usuarios =================
function listarUsuarios(&$users){
    global $users;
    foreach ($users as $u) {
        $saldoFormatado = "R$ " . number_format($u['carteira_reais'], 2, ",", ".");

        echo "\n----------------------------\n";
        echo "ID:      " . $u['id'] . "\n";
        echo "Nome:    " . $u['nome'] . "\n";
        echo "Email:   " . $u['email'] . "\n";
        echo "Senha:   " . $u['senha'] . "\n"; 
        echo "Saldo:   " . $saldoFormatado . "\n";
        echo "Nível:   " . $u['nivel_piloto'] . " (XP: " . $u['xp'] . ")\n";

        if (empty($u['garagem'])) {
            echo "Garagem: Vazia (Nenhum carro importado)\n";
        } else {
            echo "Garagem: " . implode(", ", $u['garagem']) . "\n"; 
        }
    }
    echo "----------------------------\n";
}

//========== Adicionar Usuario ===============
function adicionarUsuario (&$users){
    global $users;
    if (empty($users)){
        $addId = 1;
    }
    else{
    $addId = end($users)["id"] +1;
    }
    echo "\n=========================================\n";
    echo "          👤 Adicionar Usuario!            ";
    echo "\n=========================================\n";
    $nome = readline("Adicione o Nome de Usuario: ");
    $email = readline("Adicione o Endereço de E-mail: ");
    $senha = readline("Digite a Senha de Acesso: ");
        
    //dados adicionados por padrão!
    $carteira_reais = 90000.00;
    $nivel = 1;
    $xp = 0;
    $garagem = [];
    $pecas = [];

    $campos = [$nome, $email, $senha];

    foreach ($campos as $c){

        if (trim($c) == ""){
            echo "preencha todos os campos!\n";
            return;
    }

    }
        $users[] = [
        "id" => $addId,
        "nome" => $nome,
        "email" => $email,
        "senha" => $senha,
        "carteira_reais" => $carteira_reais,
        "nivel_piloto" => $nivel,
        "xp" => $xp,
        "garagem" => $garagem
        ];

    echo "🟢 usuario $nome adicionado com sucesso!\n";
    // print_r ($users);

}

