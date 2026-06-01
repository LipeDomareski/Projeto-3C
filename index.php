<?php

// Requisição de arquivos
require_once "vehicles.php";
require_once "users.php";
require_once "functions.php";
require_once "parts.php";
require_once "garage.php";

$usuarioId = null;

echo "
----------------------------------------------------------------
| seja bem-vindo ao sistema de importaçôes de veículos JDM! 🎌 |
----------------------------------------------------------------
\n";
echo "Faça login para continuar.\n";

while(true){

    echo "\n========== 🔐 TELA DE LOGIN ==========\n";
    $emailDigitado = readline("E-mail: ");
    $senhaDigitada = readline("Senha: ");
    $usuario = autenticar($emailDigitado, $senhaDigitada);

    if($usuario == true){

        while(true){

            echo "\n======= MENU PRINCIPAL =======\n";
            echo "1 - 🔰 Catálogo de Veículos\n";
            echo "2 - 🔧 Peças\n";
            echo "3 - 👥 Piloto\n";
            echo "4 - Garagem\n";
            echo "0 - 🎌 Sair\n";
            echo "==============================\n";

            // Removi o . "\n" do final do readline para evitar bugs de espaçamento no switch
            $opcao = trim(readline("Digite a opção desejada: ")); 

            switch ($opcao) {
                case "1":
                    echo "\n🔰 Rede de veiculos\n";
                    veiculos($vehicles); 
                    break;

                case "2":
                    echo "\n📦 Rede de Peças\n";
                    pecas($parts);
                    break;

                case "3":
                    echo "\n👥 Rede de Usuarios\n";
                    painelUsuarios($users);
                    break;

                case "4":
                    echo "\nGaragem\n";
                    painelGaragem($users);
                    break;

                case "5";
                    readline("\nPressione ENTER para voltar...");
                    break;

                case "0":
                    echo "\n 🎌 Saindo do programa... Sayōnara!\n";
                    exit;
              
                default:
                    echo "\nOpção inválida. Tente novamente.\n";
                    readline("\nPressione ENTER para continuar...");
                    break;
            }
        }
    } else {
        echo "Login inválido!\n\n";
    }
}