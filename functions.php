<?php

//========autenticação de usuários========
function autenticar($email, $senha) {
    global $users;
    foreach ($users as $user) {
        if ($user["email"] === $email && $user["senha"] === $senha) {
            return true;
        }
        else {
            echo "usuario não encontrado\n";
            return false;

        }
    }
    return null;
}

//========listar veiculos========

function listarcarro($vehicles){
foreach ($vehicles as $v) {
    //formatação de valores ienes e real
    $ienesFormatado = "¥ " . number_format($v['preco_ienes'], 0, "", ".");
    $realFormatado = "R$ " . number_format($v['fipe'], 2, ",", ".");
    //calculo para a taxa de importação
    $taxaFormatada = ($v['taxa_importacao'] * 100) . "%";

    echo "----------------------------";
    echo "Carro: {}";
}
};
