<?php

$users = [
    [ 
        "id" => 1, 
        "nome" => "admin", 
        "email" => "admin@gmail.com", 
        "senha" => "admin123",
        "carteira_reais" => 500000.00,
        "nivel_piloto" => 10,
        "xp" => 5000,
        "garagem" => [],
        "pecas" => []
    ],
    [ 
        "id" => 2, 
        "nome" => "adm", 
        "email" => "adm", 
        "senha" => "1234",
        "carteira_reais" => 150000.00,
        "nivel_piloto" => 1,
        "xp" => 0,
        "garagem" => [],
        "pecas" => []
    ],
    [ 
        "id" => 3, 
        "nome" => "lipe", 
        "email" => "lipe", 
        "senha" => "lipe",
        "carteira_reais" => 85000.00,
        "nivel_piloto" => 1,
        "xp" => 150,
        "garagem" => ["Civic Type R (EK9)"],
        "pecas" => ["Kit Turbo Garrett Intercooled", "Escapamento Inox GReddy Evolution GT", "Filtro de Ar Esportivo K&N (Intake)" ]
    ]
];

//php usuarios.php