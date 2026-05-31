<?php
// parts.php

// Mercado de Peças JDM - Upgrades de Performance
$parts = [
    [
        "id" => 101,
        "nome" => "Filtro de Ar Esportivo K&N (Intake)",
        "categoria" => "Admissão",
        "valor_ienes" => 35000,
        "taxa_importacao" => 0.40,
        "ganho_potencia" => 8, // +8 cv
        "compatibilidade_chassi" => "TODOS", // Serve em qualquer carro
        "estoque" => 5
    ],
    [
        "id" => 102,
        "nome" => "Escapamento Inox GReddy Evolution GT",
        "categoria" => "Exaustão",
        "valor_ienes" => 120000,
        "taxa_importacao" => 0.50,
        "ganho_potencia" => 15, // +15 cv
        "compatibilidade_chassi" => "EK9", // Exclusivo para o Civic
        "estoque" => 2
    ],
    [
        "id" => 103,
        "nome" => "Kit Turbo Garrett Intercooled",
        "categoria" => "Indução",
        "valor_ienes" => 450000,
        "taxa_importacao" => 0.60,
        "ganho_potencia" => 90, // +90 cv (Upgrade massivo!)
        "compatibilidade_chassi" => "AE86", // Para tunar o motor 4A-GE do Trueno
        "estoque" => 1
    ],
    [
        "id" => 104,
        "nome" => "Comando de Válvulas JUN Auto High-Cam",
        "categoria" => "Motor",
        "valor_ienes" => 180000,
        "taxa_importacao" => 0.45,
        "ganho_potencia" => 25, // +25 cv
        "compatibilidade_chassi" => "EK9", // Para fazer o VTEC gritar mais alto
        "estoque" => 2
    ],
    [
        "id" => 105,
        "nome" => "Reprogramação de ECU Apexi Power FC",
        "categoria" => "Eletrônica",
        "valor_ienes" => 95000,
        "taxa_importacao" => 0.20, // Eletrônicos podem ter taxas menores na sua regra
        "ganho_potencia" => 20, // +20 cv
        "compatibilidade_chassi" => "TODOS",
        "estoque" => 4
    ],
    [
        "id" => 106,
        "nome" => "Turbina Roletada HKS GTIII-RS",
        "categoria" => "Indução",
        "valor_ienes" => 320000,
        "taxa_importacao" => 0.55,
        "ganho_potencia" => 65, // +65 cv
        "compatibilidade_chassi" => "CP9A", // Exclusivo para o Lancer Evolution VI
        "estoque" => 1
    ]
];