<?php

// Requisição de arquivos
require_once "vehicles.php";
require_once "users.php";
require_once "functions.php";
require_once "parts.php";

echo "
----------------------------------------------------------------
| seja bem-vindo ao sistema de importaçôes de veículos JDM! 🎌 |
----------------------------------------------------------------
\n";
echo "Faça login para continuar.\n";

while(true){
    $email = readline("Email: ");
    $senha = readline("Senha: ");   

    $usuario = autenticar($email, $senha);

    if($usuario == true){

        while(true){

            echo "\n======= MENU PRINCIPAL =======\n";
            echo "1 - 🔰 Catálogo de Veículos\n";
            echo "2 - 🔧 Peças\n";
            echo "3 - 👥 Piloto\n";
            echo "0 - 🇯🇵 Sair\n";
            echo "==============================\n";

            // Removi o . "\n" do final do readline para evitar bugs de espaçamento no switch
            $opcao = trim(readline("Digite a opção desejada: ")); 

            switch ($opcao) {
                case "1":
                    echo "\nRede de veiculos\n";
                    veiculos($vehicles); 
                    break;

                case "2":
                    echo "\n📦 Rede de Peças\n";
                    pecas($parts);
                    break;

                case "3":
                    
                    readline("\nPressione ENTER para voltar...");
                    break;

                case "0":
                    echo "\n🇯🇵 Saindo do programa... Sayōnara!\n";
                    exit;
              
                default:
                    echo "\nOpção inválida. Tente novamente.\n";
                    readline("\nPressione ENTER para continuar...");
                    break;
            }
        }
    } else {
        echo "Credenciais inválidas! Tente novamente.\n\n";
    }
}