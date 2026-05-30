<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="./assets/img/logo-icone.png">
<title>SIGMAR - Dashboard de Manutenção Preventiva</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

<head>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "surface-dim": "#d9dadb",
                        "on-secondary-fixed": "#001b3c",
                        "on-primary-fixed": "#001b3c",
                        "primary-fixed": "#d5e3ff",
                        "secondary": "#005eb3",
                        "surface-container-highest": "#e1e3e4",
                        "on-error": "#ffffff",
                        "on-tertiary-fixed": "#181c1e",
                        "primary": "#001836",
                        "background": "#f8f9fa",
                        "error": "#ba1a1a",
                        "secondary-fixed-dim": "#a7c8ff",
                        "tertiary-fixed": "#e0e3e6",
                        "on-tertiary-container": "#929598",
                        "inverse-primary": "#a7c8ff",
                        "on-surface-variant": "#43474f",
                        "primary-container": "#002d5b",
                        "on-secondary-fixed-variant": "#004689",
                        "on-primary-container": "#7696ca",
                        "tertiary-fixed-dim": "#c4c7ca",
                        "tertiary": "#15191c",
                        "surface-tint": "#3e5f90",
                        "on-error-container": "#93000a",
                        "surface-bright": "#f8f9fa",
                        "secondary-container": "#3391ff",
                        "surface-container-high": "#e7e8e9",
                        "on-background": "#191c1d",
                        "surface-container-low": "#f3f4f5",
                        "on-primary": "#ffffff",
                        "on-secondary-container": "#002a55",
                        "surface-container": "#edeeef",
                        "surface": "#f8f9fa",
                        "secondary-fixed": "#d5e3ff",
                        "on-tertiary": "#ffffff",
                        "on-primary-fixed-variant": "#254776",
                        "outline": "#737780",
                        "surface-container-lowest": "#ffffff",
                        "on-surface": "#191c1d",
                        "error-container": "#ffdad6",
                        "inverse-on-surface": "#f0f1f2",
                        "tertiary-container": "#2a2e30",
                        "outline-variant": "#c3c6d0",
                        "surface-variant": "#e1e3e4",
                        "on-tertiary-fixed-variant": "#43474a",
                        "primary-fixed-dim": "#a7c8ff",
                        "on-secondary": "#ffffff",
                        "inverse-surface": "#2e3132"
                    },
                    borderRadius: {
                        DEFAULT: "0.25rem",
                        lg: "0.5rem",
                        xl: "0.75rem",
                        full: "9999px"
                    },
                    spacing: {
                        "sidebar-width": "260px",
                        "container-padding": "24px",
                        "base": "8px",
                        "gutter": "16px",
                        "card-gap": "20px"
                    },
                    fontFamily: {
                        "metric-value": ["Inter"],
                        "body-main": ["Inter"],
                        "h1-display": ["Inter"],
                        "caption": ["Inter"],
                        "label-sm": ["Inter"],
                        "h2-subtitle": ["Inter"]
                    },
                    fontSize: {
                        "metric-value": ["28px", { lineHeight: "1.1", fontWeight: "700" }],
                        "body-main": ["16px", { lineHeight: "1.5", fontWeight: "400" }],
                        "h1-display": ["32px", { lineHeight: "1.2", letterSpacing: "-0.02em", fontWeight: "700" }],
                        "caption": ["13px", { lineHeight: "1.4", fontWeight: "400" }],
                        "label-sm": ["12px", { lineHeight: "1.2", fontWeight: "600" }],
                        "h2-subtitle": ["18px", { lineHeight: "1.4", fontWeight: "500" }]
                    }
                }
            }
        }
    </script>

    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            line-height: 1;
        }
        .placeholder-grid {
            background-image: linear-gradient(to bottom, #e1e3e4 1px, transparent 1px);
            background-size: 100% 40px;
        }
    </style>
</head>

<body class="bg-background text-on-background font-body-main antialiased min-h-screen flex flex-col lg:flex-row">
    <!-- ==============================
         NAVBAR LATERAL
    ============================== -->
    <aside class="w-full lg:w-[260px] bg-primary lg:h-screen lg:sticky top-0 flex flex-col py-4 lg:py-8 flex-shrink-0">

        <!-- Logo da empresa -->
        <div class="px-6 mb-12">
            <div class="flex flex-col items-center">
                <img
                    src="./assets/img/logo-sigmar.png"
                    alt="Logo SIGMAR"
                    class="w-36 h-auto mb-2"
                />
            </div>
        </div>

        <!-- Links de navegação principal -->
        <nav class="flex-1 px-3 space-y-2">

            <!-- Link: Dashboard -->
            <a href="index.php?acao=dashboard"
               class="bg-secondary text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">home</span>
                <span class="font-medium text-sm">Dashboard</span>
            </a>

            <!-- Link ativo: Máquinas -->
            <a href="index.php?acao=maquinas"
               class="text-white/70 hover:bg-white/10 hover:text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all">
                <span class="material-symbols-outlined">settings_input_component</span>
                <span class="font-medium text-sm">Máquinas</span>
            </a>

            <!-- Link: Manutenções -->
            <a href="index.php?acao=manutencoes"
               class="text-white/70 hover:bg-white/10 hover:text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all">
                <span class="material-symbols-outlined">description</span>
                <span class="font-medium text-sm">Manutenções</span>
            </a>

            <!-- Link: Funcionários -->
            <a href="index.php?acao=funcionarios"
               class="text-white/70 hover:bg-white/10 hover:text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all">
                <span class="material-symbols-outlined">group</span>
                <span class="font-medium text-sm">Funcionários</span>
            </a>

        </nav>

        <!-- Botão de logout no rodapé da sidebar -->
        <div class="mt-auto px-3 border-t border-white/10 pt-4">
            <a href="index.php?acao=logout"
               class="text-white/70 hover:text-white px-4 py-3 flex items-center gap-4 transition-all">
                <span class="material-symbols-outlined">logout</span>
                <span class="font-medium text-sm">Sair</span>
            </a>
        </div>

    </aside>
    <!-- Fim: Navbar Lateral -->

    <!-- ==============================
         BARRA SUPERIOR
    ============================== -->
    <div class="flex-1 flex flex-col min-w-0 bg-white">

        <!-- ==============================
             CONTEÚDO PRINCIPAL
        ============================== -->
        
        <main class="flex-1 p-4 md:p-8 space-y-8 overflow-y-auto">

            <!-- Título da Página -->
            <div class="space-y-1">
                <h2 class="text-2xl font-bold text-primary">Dashboard</h2>
                <p class="text-on-surface-variant text-sm">Painel de Administrador</p>
            </div>

            <!-- ==============================
                 LINHA DO MEIO — Gráfico + Notificações
            ============================== -->
            <div class="grid grid-cols-1 gap-6"> <!-- responsividade -->

                <!-- ==============================
                    GRÁFICOS
                ============================== -->
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">

                    <!-- =====================================
                        GRÁFICO 1 — STATUS DAS MÁQUINAS
                    ====================================== -->
                    <?php
                    require_once __DIR__ . '/../../../models/Maquina.php';

                    /** @var Maquina $maquinas */

                        $operacional = 0;
                        $alerta = 0;
                        $critico = 0;

                        foreach($maquinas as $maquina)
                        {
                            $status = strtolower(trim($maquina->getStatus()));

                            switch($status)
                            {
                                case 'operacional':
                                case 'operando':
                                    $operacional++;
                                    break;

                                case 'alerta':
                                    $alerta++;
                                    break;

                                case 'critico':
                                case 'crítico':
                                    $critico++;
                                    break;
                            }
                        }

                        // =========================
                        // MAIOR VALOR
                        // =========================

                        $maior = max($operacional, $alerta, $critico);

                        // evita divisão por zero
                        if($maior <= 0)
                        {
                            $maior = 1;
                        }

                        // =========================
                        // ALTURAS DAS BARRAS
                        // altura máxima = 160
                        // =========================

                        $alturaOperacional = ($operacional / $maior) * 160;
                        $alturaAlerta      = ($alerta / $maior) * 160;
                        $alturaCritico     = ($critico / $maior) * 160;

                        // =========================
                        // POSIÇÃO Y
                        // base do gráfico = 240
                        // =========================

                        $yOperacional = 240 - $alturaOperacional;
                        $yAlerta      = 240 - $alturaAlerta;
                        $yCritico     = 240 - $alturaCritico;

                    ?>

                    <div class="w-full bg-white border border-outline-variant/50 rounded-xl p-4 md:p-6">

                        <!-- Cabeçalho -->
                        <div class="flex items-center justify-between mb-6">

                            <div>
                                <h3 class="font-bold text-primary text-lg">
                                    Status das Máquinas
                                </h3>

                                <p class="text-sm text-on-surface-variant">
                                    Quantidade de equipamentos por estado
                                </p>
                            </div>

                        </div>

                        <!-- Gráfico -->
                        <div class="w-full h-[320px]">

                            <svg
                                class="w-full h-full"
                                viewBox="0 0 500 300"
                                preserveAspectRatio="xMidYMid meet"
                            >

                                <!-- Eixos -->
                                <line x1="60" y1="40" x2="60" y2="240" stroke="#c3c6d0"/>
                                <line x1="60" y1="240" x2="460" y2="240" stroke="#c3c6d0"/>

                                <!-- Grade -->
                                <line x1="60" y1="80"  x2="460" y2="80"  stroke="#f0f1f2"/>
                                <line x1="60" y1="120" x2="460" y2="120" stroke="#f0f1f2"/>
                                <line x1="60" y1="160" x2="460" y2="160" stroke="#f0f1f2"/>
                                <line x1="60" y1="200" x2="460" y2="200" stroke="#f0f1f2"/>

                                <!-- =========================
                                    OPERACIONAL
                                ========================== -->

                                <rect
                                    x="90"
                                    y="<?= $yOperacional ?>"
                                    width="70"
                                    height="<?= $alturaOperacional ?>"
                                    rx="8"
                                    fill="#16a34a"
                                ></rect>

                                <!-- =========================
                                    ALERTA
                                ========================== -->

                                <rect
                                    x="210"
                                    y="<?= $yAlerta ?>"
                                    width="70"
                                    height="<?= $alturaAlerta ?>"
                                    rx="8"
                                    fill="#eab308"
                                ></rect>

                                <!-- =========================
                                    CRÍTICO
                                ========================== -->

                                <rect
                                    x="330"
                                    y="<?= $yCritico ?>"
                                    width="70"
                                    height="<?= $alturaCritico ?>"
                                    rx="8"
                                    fill="#dc2626"
                                ></rect>

                                <!-- Valores -->

                                <text
                                    x="125"
                                    y="<?= $yOperacional - 10 ?>"
                                    text-anchor="middle"
                                    font-size="14"
                                    fill="#191c1d"
                                    font-weight="bold"
                                >
                                    <?= $operacional ?>
                                </text>

                                <text
                                    x="245"
                                    y="<?= $yAlerta - 10 ?>"
                                    text-anchor="middle"
                                    font-size="14"
                                    fill="#191c1d"
                                    font-weight="bold"
                                >
                                    <?= $alerta ?>
                                </text>

                                <text
                                    x="365"
                                    y="<?= $yCritico - 10 ?>"
                                    text-anchor="middle"
                                    font-size="14"
                                    fill="#191c1d"
                                    font-weight="bold"
                                >
                                    <?= $critico ?>
                                </text>

                                <!-- Labels -->

                                <text
                                    x="125"
                                    y="265"
                                    text-anchor="middle"
                                    font-size="13"
                                    fill="#737780"
                                >
                                    Operacional
                                </text>

                                <text
                                    x="245"
                                    y="265"
                                    text-anchor="middle"
                                    font-size="13"
                                    fill="#737780"
                                >
                                    Alerta
                                </text>

                                <text
                                    x="365"
                                    y="265"
                                    text-anchor="middle"
                                    font-size="13"
                                    fill="#737780"
                                >
                                    Crítico
                                </text>

                            </svg>

                        </div>

                    </div>

                    <!-- =====================================
                        GRÁFICO 2 — MANUTENÇÕES
                    ====================================== -->
                    <?php
                    /** @var array $grafico */

                    $datas = [];
                    $totais = [];

                    foreach($grafico as $item)
                    {
                        $datas[] =
                            date(
                                "d/m",
                                strtotime($item['dia'])
                            );

                        $totais[] =
                            (int)$item['total'];
                    }

                    $max = max($totais ?: [1]);

                    $quantidade = count($totais);

                    $espacamento =
                        $quantidade > 1
                        ? 660 / ($quantidade - 1)
                        : 1;

                    $pontos = [];

                    foreach($totais as $i => $valor)
                    {
                        $x =
                            20 +
                            ($i * $espacamento);

                        $y =
                            200 -
                            (
                                ($valor / $max)
                                * 150
                            );

                        $pontos[] = "$x,$y";
                    }

                    $caminho =
                        count($pontos)
                        ? "M" . implode(" L ", $pontos)
                        : "";

                    ?>

                    <div class="w-full bg-white border border-outline-variant/50 rounded-xl p-4 md:p-6">

                        <!-- Cabeçalho -->

                        <div class="flex justify-between items-center mb-6">

                            <div>

                                <h3 class="font-bold text-primary text-lg">

                                    Manutenções concluídas por dia

                                </h3>

                                <p class="text-sm text-on-surface-variant">

                                    Últimos 7 dias

                                </p>

                            </div>

                        </div>


                        <!-- legenda -->

                        <div class="flex gap-6 mb-6">

                            <div class="flex items-center gap-2">

                                <div class="w-3 h-3 rounded-full bg-green-600"></div>

                                <span class="text-sm text-on-surface-variant">

                                    Concluídas

                                </span>

                            </div>

                        </div>


                        <!-- gráfico -->

                        <div class="h-[320px] w-full">

                            <svg
                                class="w-full h-full"
                                viewBox="0 0 800 260"
                                preserveAspectRatio="xMidYMid meet"
                            >

                                <!-- grade -->

                                <?php for($i=0;$i<=5;$i++): ?>

                                    <line
                                        stroke="#f0f1f2"
                                        stroke-width="1"
                                        x1="0"
                                        x2="800"
                                        y1="<?= $i*40 ?>"
                                        y2="<?= $i*40 ?>"
                                    />

                                <?php endfor; ?>


                                <!-- linha -->

                                <?php if($caminho): ?>

                                    <path
                                        d="<?= $caminho ?>"
                                        fill="none"
                                        stroke="#16a34a"
                                        stroke-width="4"
                                        stroke-linecap="round"
                                    />

                                <?php endif; ?>


                                <!-- pontos -->

                                <?php foreach($pontos as $i => $coord): ?>

                                    <?php

                                    list($x,$y)=explode(",",$coord);

                                    $valor =
                                        $totais[$i];

                                    ?>

                                    <!-- valor -->

                                    <text
                                        x="<?= $x ?>"
                                        y="<?= $y - 12 ?>"
                                        text-anchor="middle"
                                        font-size="12"
                                        font-weight="bold"
                                        fill="#16a34a"
                                    >

                                        <?= $valor ?>

                                    </text>


                                    <!-- círculo -->

                                    <circle
                                        cx="<?= $x ?>"
                                        cy="<?= $y ?>"
                                        r="5"
                                        fill="#16a34a"
                                    />

                                <?php endforeach; ?>


                                <!-- datas -->

                                <?php foreach($datas as $i=>$data): ?>

                                    <?php

                                    $x =
                                        20 +
                                        ($i*$espacamento);

                                    ?>

                                    <text
                                        fill="#737780"
                                        font-size="11"
                                        text-anchor="middle"
                                        x="<?= $x ?>"
                                        y="245"
                                    >

                                        <?= $data ?>

                                    </text>

                                <?php endforeach; ?>

                            </svg>

                        </div>

                    </div>
                </div>
            <!-- ==============================
                 LINHA INFERIOR: Equipamentos e Manutenções
            ============================== -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 pb-8">

                <!-- ---- Card: Equipamentos Registrados ---- -->
                <div class="bg-white border border-outline-variant/50 rounded-xl flex flex-col" style="height: 400px;">
                    <div class="p-6 flex flex-col h-full">

                        <h3 class="font-bold text-primary mb-4">Equipamentos Registrados</h3>

                        <!-- Cabeçalho da tabela (fixo, não rola) -->
                        <div class="flex-shrink-0 grid grid-cols-2 text-[11px] text-outline uppercase tracking-wider border-b border-outline-variant/30 pb-2 mb-1">
                            <span class="font-semibold">Equipamento</span>
                            <span class="font-semibold text-right">Status</span>
                        </div>

                        <!-- Lista de equipamentos com scroll e hover clicável -->
                        <div class="flex-1 overflow-y-auto min-h-0 space-y-1">

                            <div class="flex-1 overflow-y-auto min-h-0 space-y-1">

                                <?php if(empty($maquinas)): ?>

                                    <div class="flex items-center justify-center h-full py-10">
                                        <p class="text-sm text-outline">
                                            Nenhuma máquina cadastrada.
                                        </p>
                                    </div>

                                <?php else: ?>

                                    <?php foreach($maquinas as $maquina): ?>

                                        <?php
                                            $status = $maquina->getStatus();

                                            $classeStatus = match($status) {
                                                'operando' => 'bg-green-100 text-green-700',
                                                'alerta' => 'bg-yellow-100 text-yellow-700',
                                                'critico' => 'bg-red-100 text-red-700',
                                                default => 'bg-gray-100 text-gray-700'
                                            };
                                        ?>

                                        <a href="index.php?acao=detalhes-maquina&id=<?= $maquina->getId(); ?>"
                                        class="flex items-center justify-between p-3 rounded-lg border border-outline-variant/20 hover:bg-surface-container-low transition-colors cursor-pointer">

                                            <div class="min-w-0 flex-1">
                                                <p class="text-sm font-medium text-on-surface">
                                                    <?= htmlspecialchars($maquina->getNome()); ?>
                                                </p>

                                                <p class="text-xs text-outline">
                                                    <?= htmlspecialchars($maquina->getTipo()); ?>
                                                </p>
                                            </div>

                                            <div class="flex items-center gap-2 flex-shrink-0">

                                                <span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase <?= $classeStatus ?>">
                                                    <?= htmlspecialchars($status); ?>
                                                </span>

                                                <span class="material-symbols-outlined text-outline text-[16px]">
                                                    chevron_right
                                                </span>

                                            </div>
                                        </a>

                                    <?php endforeach; ?>

                                <?php endif; ?>

                            </div>
                        </div>
                        <!-- Fim: Lista de equipamentos -->

                        <!-- Rodapé fixo: link para todos os equipamentos -->
                        <div class="mt-4 pt-4 border-t border-outline-variant/30 flex-shrink-0">
                            <a href="index.php?acao=maquinas"
                               class="text-secondary text-xs font-semibold hover:underline flex items-center justify-center gap-1">
                                Ver mais
                                <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
                            </a>
                        </div>

                    </div>
                </div>
                <!-- Fim: Card de Equipamentos -->

                <!-- ---- Card: Manutenções Recentes ---- -->
                <div class="bg-white border border-outline-variant/50 rounded-xl flex flex-col" style="height: 400px;">

                    <div class="p-6 flex flex-col h-full">

                        <h3 class="font-bold text-primary mb-4">Manutenções Recentes</h3>

                        <div class="flex-1 overflow-y-auto min-h-0 space-y-2">

                            <?php
                            /** @var array $manutencoesRecentes */

                            usort($manutencoesRecentes, function($a, $b){

                                $ordemStatus = [
                                    'pendente'=>1,
                                    'em_andamento'=>2,
                                    'concluida'=>3
                                ];

                                return
                                    ($ordemStatus[strtolower(trim($a->getStatus()))] ?? 999)
                                    <=>
                                    ($ordemStatus[strtolower(trim($b->getStatus()))] ?? 999);

                            });

                            ?>

                            <?php if(empty($manutencoesRecentes)): ?>

                                <p class="text-sm text-on-surface-variant">
                                    Nenhuma manutenção recente.
                                </p>

                            <?php else: ?>

                                <?php foreach($manutencoesRecentes as $manutencoes): ?>

                                    <?php
                                        $status = strtolower(trim($manutencoes->getStatus()));

                                        // Define tipo e cor
                                        if ($status === 'pendente') {
                                            $statusLabel = 'Pendente';
                                            $statusClass = 'text-amber-600';
                                            $data = $manutencoes->getDataAgendada();
                                        } 
                                        elseif ($status === 'em_andamento') {
                                            $statusLabel = 'Em Andamento';
                                            $statusClass = 'text-blue-600';
                                            $data = $manutencoes->getDataInicio() ?? $manutencoes->getDataAgendada();
                                        } 
                                        else { // concluida
                                            $statusLabel = 'Concluído';
                                            $statusClass = 'text-green-600';
                                            $data = $manutencoes->getDataConclusao();   
                                        }
                                    ?>

                                    <a href="index.php?acao=detalhes-ordem&id=<?= $manutencoes->getId() ?>"
                                    class="flex justify-between items-center p-3 rounded-lg border border-outline-variant/20 hover:bg-surface-container-low transition-colors">

                                        <div>
                                            <p class="text-sm font-medium text-on-surface">
                                                <?= htmlspecialchars($manutencoes->getTitulo()) ?>
                                            </p>

                                            <p class="text-xs text-outline">
                                                Tec: <?= htmlspecialchars($manutencoes->getNomeTecnico() ?? 'Não atribuído') ?>
                                            </p>
                                        </div>

                                        <div class="text-right">

                                            <p class="text-xs font-medium text-on-surface-variant">
                                                <?= $data ? (new DateTime($data))->format('d/m/Y') : '--' ?>
                                            </p>

                                            <p class="text-[10px] <?= $statusClass ?> font-semibold">
                                                <?= $statusLabel ?>
                                            </p>

                                        </div>

                                    </a>

                                <?php endforeach; ?>

                            <?php endif; ?>

                        </div>

                        <div class="mt-4 pt-4 border-t border-outline-variant/30">

                            <a href="index.php?acao=manutencoes"
                            class="text-secondary text-xs font-semibold hover:underline flex items-center justify-center gap-1">

                                Ver mais
                                <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
                            </a>

                        </div>

                    </div>

                </div>

            </div>
            <!-- Fim: Linha Inferior -->

        </main>
        <!-- Fim: Área Principal (main) -->

    </div>
</body>
</html>