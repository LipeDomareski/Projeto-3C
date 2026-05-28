<?php
//requisição de arquivos
require_once "vehicles.php";
require_once "users.php";
require_once "functions.php";

//primeiro echo
echo "
 ---------------------------------------------------------
|seja bem-vindo ao sistema de importaçôes de veículos JDM!|
 ---------------------------------------------------------
\n";
echo "Faça login para continuar.\n";

//validação de usuario
while(true){

    $email = readline("email: ");
    $senha = readline("senha: ");   

    $usuario = autenticar($email, $senha);

if($usuario == true){

        //loop para menu interativo
    while(true){

        echo "\n======= MENU =======\n";
        echo "1 - Listar veículos\n";
        echo "2 - Buscar veículo por ID\n";
        echo "3 - Adicionar veículo\n";
        echo "4 - Atualizar veículo\n";
        echo "5 - Excluir veículo\n";
        echo "0 - Sair\n";
            
        $opcao = readline("Digite a opção desejada: ");

        switch ($opcao) {
    case "1":
        echo "\nLista de Veículos:\n";
        break;

    case "2":
        echo "\nBuscar veículo por ID:\n";
        break;

    case "3":
        echo "\nAdicionar veículo:\n";
        break;

    case "4":
        echo "\nAtualizar veículo:\n";
        break;

    case "5":
        echo "\nExcluir veículo:\n";   
        break;

    case "0":
        echo "\nSaindo do programa...\n";
        break 2; // Nota: Se estiver dentro de um laço (como while), esse break vai parar o switch. Para parar o laço também, usa-se 'break 2;'.
            
    default:
        echo "\nOpção inválida. Tente novamente.\n";
        break;
}

    };

}

//if para caso o loop do menu for 0 ele para o programa
if(!$usuario){
    break;
}
elseif($opcao == "0"){
    break;
}

};
// php index.php