<?php
require_once "dyna.php";
require_once "cars.php";
// require_once "users.php";
// require_once "vehicles";

function painelGaragem (&$users){

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

                break;

            case "4":

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
    echo "\n==================================================\n";
    echo "    🚗  GARAGEM DE " . $userAtual['nome'] . "  🚗\n";
    echo "==================================================\n";
    echo " Saldo Atual: R$ " . number_format($userAtual['carteira_reais'], 2, ",", ".") . "\n";
    echo "---------------------------------------------------\n";
        
    if (empty($userAtual['garagem'])) {
        echo "Sua garagem está vazia!\n";
        echo " Vá até o mercado de importação e compre seu primeiro JDM!\n";
        echo "==================================================\n";
        return;
    }

    foreach ($userAtual['garagem'] as $index => $carro) {
        // $index + 1 faz a lista começar em 1, 2, 3... em vez de 0, 1, 2...
        echo "[" . ($index + 1) . "] 🏎️  " . $carro . "\n";
    }
        echo"==================================================\n";


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
    echo "\n==================================================\n";
    echo "    🔧  PEÇAS DE " . $userAtual['nome'] . "  🔧\n";
    echo "==================================================\n";
    echo " Saldo Atual: R$ " . number_format($userAtual['carteira_reais'], 2, ",", ".") . "\n";
    echo "---------------------------------------------------\n";
        
    if (empty($userAtual['garagem'])) {
        echo "Sua garagem está vazia!\n";
        echo " Vá até o mercado de importação e compre seu primeiro JDM!\n";
        echo "==================================================\n";
        return;
    }

    foreach ($userAtual['pecas'] as $index => $pecas) {
        // $index + 1 faz a lista começar em 1, 2, 3... em vez de 0, 1, 2...
        echo "[" . ($index + 1) . "] 📦  " . $pecas . "\n";
    }
        echo"==================================================\n";


    }



