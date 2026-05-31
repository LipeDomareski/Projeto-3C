# Projeto-3C

ideas

1.no menu de listar adicionar um campo para adicionar o carrinho talvez

2.no menu na opção listar adicionar uma opção que possa mostrar mais informações tecnicas e um pouco da história do veiculo pelo id do veiculo.

3.criar uma função em que quando chamada a função de buscar id de veiculos com o valor em ienes ela já converta em reais e ja calcule a taxa de importação

🇯🇵 Menu 1: Catálogo de Leilão (USS Tokyo / CAA Tokyo)

No Japão, a maioria dos JDMs é comprada em leilões automotivos.

    Sistema de "Notas de Leilão" (Auction Sheet): Os carros no Japão recebem notas de 1 a 5 (ou 'R' para batidos) baseado no estado de conservação.

    Você pode listar carros com suas respectivas notas. Exemplo: Nissan Skyline GT-R R34 - Nota 4.5 (Excelente estado).

🚢 Menu 2: Calculadora de Frete Marítimo (FOB vs CIF)

O transporte de navio do porto de Yokohama até o Brasil (geralmente Porto de Santos ou Paranaguá) tem custos fixos altos.

    Crie uma função onde o usuário escolhe o tipo de transporte: Container Fechado (mais caro, protege mais o carro) ou Roll-on/Roll-off (navio cargueiro de carros, mais barato). O sistema soma isso ao custo final em Real.

🇧🇷 Menu 3: Verificador da "Regra dos 30 Anos" (Brasil)

Essa é a regra de ouro para importação de veículos usados no Brasil: o carro precisa ter pelo menos 30 anos de fabricação para ser legalmente importado como peça de coleção.

    Crie uma função onde o usuário digita o ano do carro (ex: 1998) e o sistema calcula automaticamente se o carro já pode ser importado legalmente ou quantos anos faltam para ele "liberar".

4. Novas Funcionalidades: Módulo de Importação de Peças

Para o seu menu de peças, você pode criar uma função menuImportacaoPecas() e trabalhar com os seguintes conceitos:
A. Calculadora de Frete por Peso (O terror do bolso)

Diferente dos carros (que vêm de navio), peças costumam vir de avião (via DHL, FedEx ou EMS). O frete é calculado estritamente pelo peso bruto ou peso cubado da peça.

    Idéia de código: Crie uma tabela (ou objeto) de frete por quilo.

    Exemplo: Se a peça pesa até 2kg (um pomo de câmbio, um farol pisca), o frete é X. Se for pesada (um aerofólio de fibra, discos de freio de 15kg), o frete explode.

B. O "Imposto das Blusinhas" (Regras de Importação de Pacotes)

No Brasil, pacotes aéreos têm regras de taxação diferentes de containers marítimos.

    Você pode simular a regra de taxação atual para importação de pessoas físicas: abaixo de um valor específico de dólares/ienes pode ter uma taxa (como o Remessa Conforme), e acima desse valor entra o imposto padrão de importação de 60% + ICMS.

C. Menu de Categorias de Peças (Simulação de Loja)

Permita que o usuário navegue por categorias de peças JDM clássicas:

    Performance: Turbinas, Escapamento Titanium, Filtros HKS.

    Estética/Exterior: Rodas Volk TE37, Aerofólios, Bodykits.

    Manutenção: Juntas de motor (para o famoso motor 2JZ ou RB26), pastilhas de freio.

4. Idéias de "Gamificação" e Detalhes JDM para o Sistema

Para deixar o sistema de terminal incrivelmente divertido de usar, você pode colocar regras reais do submundo dos carros japoneses:
A. O "Verificador de Autenticidade" (Original vs Réplica)

No mercado JDM, peças falsificadas (réplicas) são um grande problema.

    Crie uma função onde o usuário escolhe comprar uma peça OEM/JDM Legítima (cara, mas valoriza o carro) ou uma Réplica/Paralela (barata, mas diminui a nota de leilão ou o valor do carro).

B. Simulador de "Projeto de Restauração"

Que tal o usuário poder "montar" o carro dele?

    Ele entra no menu de carros e compra um Nissan Silvia S13 - Nota 3.0 (precisando de reparos).

    O sistema salva o estado desse carro.

    Ele vai no menu de peças e compra as peças necessárias para arrumar o carro.

    O sistema calcula o custo total (Carro + Peças + Fretes + Impostos) e mostra o valor final do projeto.

1. O Módulo de Peças "Yahoo! Auctions" (Sistema de Lances)

No Japão, as melhores peças (raras ou usadas) são compradas no Yahoo! Auctions Japan (o "Mercado Livre" deles).

    Ideia de Código: Crie uma função onde o usuário não compra a peça pelo preço fixo, mas entra em um sistema de Leilão Relâmpago.

    O terminal mostra uma peça (ex: Volante Nardi Original de Época - Lance Atual: ¥20.000). O usuário digita o lance dele. O computador gera um lance aleatório de um "japonês rival". Se o usuário der o maior lance antes do tempo (ou das rodadas) acabar, ele ganha a peça.

4. Modo Carreira: "De Júnior a Shogun da Importação"

Adicione um sistema de pontuação ou dinheiro virtual para o usuário começar do zero.

    O usuário começa com R$ 20.000 virtuais. Ele não tem dinheiro para um Supra.

    Ele precisa começar importando peças pequenas (como manoplas de câmbio ou calhas de chuva de Kei Cars) e revendendo no Brasil com lucro.

    Conforme ele junta dinheiro e ganha "Reputação", o sistema libera o menu de importação de carros inteiros e leilões de luxo.

IDEA FAVORITA

1. O "Test Drive" / Simulador de Arrancada (Mini-game de Texto)

Depois que o usuário importa o carro e compra as peças para montá-lo, ele precisa ver o resultado do projeto!

    Ideia de Código: Crie um mini-game de texto de arrancada (Quarter Mile / 402 metros) ou descida de montanha (Touge, bem estilo Initial D).

    O sistema calcula o tempo do carro baseado nos upgrades que o usuário comprou no menu de peças.

    Exemplo no terminal:
    Plaintext

[3... 2... 1... GO!]
🏎️ Seu Civic EG6 com motor B16 original está na pista...
⏱️ Tempo final: 15.6 segundos.
💡 Dica: Vá ao menu de peças e compre um Kit Turbo para baixar esse tempo!

## 2. Tabelas Visuais no Terminal (ASCII Tables)

Conforme seu catálogo de carros e peças cresce, mostrar texto puro fica confuso. Uma ótima prática de programação para terminal é organizar os dados em tabelas desenhadas com caracteres (caracteres ASCII).

- Em vez de apenas listar as peças uma embaixo da outra, você pode criar uma função para formatar o texto, deixando seu terminal com cara de sistema profissional dos anos 90.
- _Exemplo visual:_

  ```text
  +-------------------------------------+-----------+------------+
  | PEÇA JDM                            | PESO (KG) | PREÇO (¥)  |
  +-------------------------------------+-----------+------------+
  | 01. Turbina Garrett G25             |   7.5     | ¥ 180.000  |
  | 02. Rodas Volk TE37 (Jogo)          |  36.0     | ¥ 240.000  |
  | 03. Comando de Válvulas Toda Racing |   4.2     | ¥  85.000  |
  +-------------------------------------+-----------+------------+



  3. O Mecânico "Seu Tanaka" (Sistema de Eventos Aleatórios)
  ```

Para deixar o simulador dinâmico, você pode criar um sistema onde, a cada vez que o usuário navega nos menus, existe uma pequena chance de acontecer um evento aleatório baseado na sorte.

    Ideia de Código: Use uma função matemática de aleatoriedade (Math.random() ou equivalente na sua linguagem).

    Exemplos de eventos:

        "🚨 A Receita Federal taxou seu pacote de peças abaixo do valor! Você economizou R$ 500."

        "🇯🇵 O leilão em Tóquio cancelou o lote do Supra por problemas na documentação."

        "🔧 Seu Tanaka (o mecânico especialista) inspecionou seu motor RB26 e encontrou um vazamento. O conserto vai custar ¥45.000."

4. Exportar "Relatório de Importação" em Arquivo .txt

Imagine que o usuário passou um tempão escolhendo o carro, calculando o frete do navio, convertendo a moeda e somando os impostos. Seria muito legal se ele pudesse salvar esse orçamento.

    Ideia de Código: Crie uma opção no menu chamada "Exportar Orçamento Completo".

    Quando selecionada, o seu código usa as funções de manipulação de arquivos da linguagem (como o módulo fs no Node.js, ou FileWriter em Java) e gera um arquivo chamado orcamento_importacao.txt na mesma pasta do projeto, com o resumo de tudo bem bonito para o usuário ler fora do terminal.
