<?php
// banco_de_dados.php

// 1. O Catálogo de Carros do Japão (Sua "Loja" / Banco de dados fixo)
$vehicles = [
    [
        "id" => 1,
        "modelo" => "Civic Type R (EK9)",
        "ano" => 1999,
        "marca" => "Honda",
        "preco_ienes" => 3500000,
        "taxa_importacao" => 0.60,
        "fipe" => 200000.00,
        "estoque" => 2,
        "carroceria" => "Hatchback",
        "chassi" => "EK9",
        "potencia_original" => 185,
        "potencia_atual" => 185,
        "pecas_instaladas" => []
    ],
    [
        "id" => 2,
        "modelo" => "Lancer Evolution VI Tommi Makinen",
        "ano" => 2000,
        "marca" => "Mitsubishi",
        "preco_ienes" => 7000000,
        "taxa_importacao" => 0.65,
        "fipe" => 410000.00,
        "estoque" => 1,
        "carroceria" => "Sedan / Rally",
        "chassi" => "CP9A",
        "potencia_original" => 280,
        "potencia_atual" => 280,
        "pecas_instaladas" => []
    ],
    [
        "id" => 3,
        "modelo" => "Sprinter Trueno (AE86)",
        "ano" => 1986,
        "marca" => "Toyota",
        "preco_ienes" => 3200000,
        "taxa_importacao" => 0.60,
        "fipe" => 185000.00,
        "estoque" => 1,
        "carroceria" => "Hatchback / Drift",
        "chassi" => "AE86",
        "potencia_original" => 130,
        "potencia_atual" => 130,
        "pecas_instaladas" => []
    ],
    [
        "id" => 4,
        "modelo" => "Chaser Tourer V (JZX100)",
        "ano" => 1998,
        "marca" => "Toyota",
        "preco_ienes" => 4000000,
        "taxa_importacao" => 0.60,
        "fipe" => 230000.00,
        "estoque" => 3,
        "carroceria" => "Sedan / Drift",
        "chassi" => "JZX100",
        "potencia_original" => 280,
        "potencia_atual" => 280,
        "pecas_instaladas" => []
    ],
    [
        "id" => 5,
        "modelo" => "Impreza WRX STI",
        "ano" => 2004,
        "marca" => "Subaru",
        "preco_ienes" => 2500000,
        "taxa_importacao" => 0.55,
        "fipe" => 140000.00,
        "estoque" => 2,
        "carroceria" => "Sedan / Rally",
        "chassi" => "GDB",
        "potencia_original" => 265,
        "potencia_atual" => 265,
        "pecas_instaladas" => []
    ]
];

// // 2. O Estado do Jogador (As tabelas que começam vazias e mudam durante o jogo)
// $minhaGaragem = [];   // Guarda os carros que o usuário comprar
// $meuEstoquePecas = []; // Guarda as peças que ele importar antes de instalar no carro
// $saldoJogador = 500000.00; // Saldo inicial em Reais para começar o jogo