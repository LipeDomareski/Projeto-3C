<?php

require_once "dyna.php";
require_once "cars.php";
// require_once "users.php";
// require_once "vehicles";

function painelGaragem (){
    // Usando global para alinhar com o resto do sistema
    global $users, $usuarioId;

    if ($usuarioId === null) {
        echo "\nErro: Você precisa fazer login antes de acessar a garagem!\n";
        return;
    }

    while (true) {
        echo "\n=========================================\n";
        echo "      -  Painel da Garagem -    \n";
        echo "=========================================\n";
        echo "1. - Seus Veiculos\n";
        echo "2. - Suas Peças\n";
        echo "3. - Tunagem\n";
        echo "4. - Dynamometro\n";
        echo "0. - Voltar\n";
        echo "=========================================\n";
        
        $escolha = trim(readline("Selecione uma opção: "));

        switch ($escolha) {
            case "1":
                seusVeiculos();
                break;

            case "2":
                suasPecas();
                break;

            case "3":
                tunagem();
                break;

            case "4":
                echo "\n[Em desenvolvimento] Passando o monstro no Dino...\n";
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

//========== Seus Veiculos ==========
function seusVeiculos (){
    global $usuarioId, $users;
    
    $userAtual = null;
    foreach ($users as $u) {
        if ($u['id'] == $usuarioId) {
            $userAtual = $u;
            break;
        }
    }

    if (!$userAtual) {
        echo "Erro: Usuário não encontrado.\n";
        return;
    }

    echo "\n==================================================\n";
    echo "    🚗  GARAGEM DE " . ($userAtual['nome']) . "  🚗\n";
    echo "==================================================\n";
    echo " Saldo Atual: R$ " . number_format($userAtual['carteira_reais'], 2, ",", ".") . "\n";
    echo "---------------------------------------------------\n";

    if (empty($userAtual['garagem'])) {
        echo "Sua garagem está vazia!\n";
        echo " Vá até o mercado de importação e compre seu primeiro Veiculo!\n";
        echo "==================================================\n";
        return;
    }

    foreach ($userAtual['garagem'] as $index => $carro) {
        if (is_array ($carro)){
            echo "[" . ($index + 1) . "] 🏎️  " . $carro['modelo'] . " | Potência: " . $carro['potencia_atual'] . " cv\n";
        }else {
        echo "[" . ($index + 1) . "] 🏎️  " . $carro . "\n";}
    }
    echo "==================================================\n";
}

//========== listar Peças ===========
function suasPecas (){
    global $usuarioId, $users;
    
    $userAtual = null;
    foreach ($users as $u) {
        if ($u['id'] == $usuarioId) {
            $userAtual = $u;
            break;
        }
    }

    if (!$userAtual) {
        echo "Usuário não encontrado.\n";
        return;
    }

    echo "\n==================================================\n";
    echo "    🔧  PEÇAS DE " .($userAtual['nome']) . "  🔧\n";
    echo "==================================================\n";
    echo " Saldo Atual: R$ " . number_format($userAtual['carteira_reais'], 2, ",", ".") . "\n";
    echo "---------------------------------------------------\n";

    if (empty($userAtual['pecas'])) {
        echo "Sua caixa de ferramentas está vazia!\n";
        echo " Vá até o mercado de peças e compre upgrades para seu JDM.\n";
        echo "==================================================\n";
        return;
    }

    foreach ($userAtual['pecas'] as $index => $peca) {
        echo "[" . ($index + 1) . "] 📦  " . $peca . "\n";
    }
    echo "==================================================\n";
}

//========== tunagem ================
function tunagem() {
    global $usuarioId, $users;

    $userIndex = null;
    foreach ($users as $index => $u) {
        if ($u['id'] == $usuarioId) {
            $userIndex = $index;
            break;
        }
    }

    echo "\n=========================================\n";
    echo "       🔧 OFICINA DE TUNAGEM JDM 🔧      \n";
    echo "=========================================\n";

    if (empty($users[$userIndex]['garagem'])) {
        echo "Você não tem nenhum carro na garagem para tunar!\n";
        return;
    }
    if (empty($users[$userIndex]['pecas'])) {
        echo "Você não tem peças no seu baú!\n";
        return;
    }

    echo "Selecione o veículo que deseja modificar:\n";
    foreach ($users[$userIndex]['garagem'] as $index => $carro) {

        $nomeCarro = is_array($carro) ? $carro['modelo'] : $carro;
        echo "[" . ($index + 1) . "] - " . $nomeCarro . "\n";
    }
    $escolhaCarro = (int)readline("Digite o número do carro: ") - 1;


    if (!is_array($users[$userIndex]['garagem'][$escolhaCarro])) {
        $users[$userIndex]['garagem'][$escolhaCarro] = [
            "modelo" => $users[$userIndex]['garagem'][$escolhaCarro],
            "potencia_atual" => 185,
            "pecas_instaladas" => []
        ];
    }

    echo "\nSelecione a peça do seu baú para instalar:\n";
    foreach ($users[$userIndex]['pecas'] as $index => $peca) {
        echo "[" . ($index + 1) . "] - " . $peca . "\n";
    }
    $escolhaPeca = (int)readline("Digite o número da peça: ") - 1;

    $pecaNome = $users[$userIndex]['pecas'][$escolhaPeca];

    $users[$userIndex]['garagem'][$escolhaCarro]['pecas_instaladas'][] = $pecaNome;
    
    $users[$userIndex]['garagem'][$escolhaCarro]['potencia_atual'] += 50;

    unset($users[$userIndex]['pecas'][$escolhaPeca]);

    $users[$userIndex]['pecas'] = array_values($users[$userIndex]['pecas']);

    echo "\n🔥 Peça instalada com sucesso direto no seu JDM! 🔥\n";
}