
<!DOCTYPE html>
<html lang="pt-BR">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SIGMAR - Dashboard do Técnico</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

<head>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "surface-dim":                "#d9dadb",
                        "on-secondary-fixed":         "#001b3c",
                        "on-primary-fixed":           "#001b3c",
                        "primary-fixed":              "#d5e3ff",
                        "secondary":                  "#005eb3",
                        "surface-container-highest":  "#e1e3e4",
                        "on-error":                   "#ffffff",
                        "on-tertiary-fixed":          "#181c1e",
                        "primary":                    "#001836",
                        "background":                 "#f8f9fa",
                        "error":                      "#ba1a1a",
                        "error-red":                  "#ba1a1a",
                        "secondary-fixed-dim":        "#a7c8ff",
                        "tertiary-fixed":             "#e0e3e6",
                        "on-tertiary-container":      "#929598",
                        "inverse-primary":            "#a7c8ff",
                        "on-surface-variant":         "#43474f",
                        "primary-container":          "#002d5b",
                        "on-secondary-fixed-variant": "#004689",
                        "on-primary-container":       "#7696ca",
                        "tertiary-fixed-dim":         "#c4c7ca",
                        "tertiary":                   "#15191c",
                        "surface-tint":               "#3e5f90",
                        "on-error-container":         "#93000a",
                        "surface-bright":             "#f8f9fa",
                        "secondary-container":        "#3391ff",
                        "surface-container-high":     "#e7e8e9",
                        "on-background":              "#191c1d",
                        "surface-container-low":      "#f3f4f5",
                        "on-primary":                 "#ffffff",
                        "on-secondary-container":     "#002a55",
                        "surface-container":          "#edeeef",
                        "surface":                    "#f8f9fa",
                        "secondary-fixed":            "#d5e3ff",
                        "on-tertiary":                "#ffffff",
                        "on-primary-fixed-variant":   "#254776",
                        "outline":                    "#737780",
                        "surface-container-lowest":   "#ffffff",
                        "on-surface":                 "#191c1d",
                        "error-container":            "#ffdad6",
                        "inverse-on-surface":         "#f0f1f2",
                        "tertiary-container":         "#2a2e30",
                        "outline-variant":            "#c3c6d0",
                        "surface-variant":            "#e1e3e4",
                        "on-tertiary-fixed-variant":  "#43474a",
                        "primary-fixed-dim":          "#a7c8ff",
                        "on-secondary":               "#ffffff",
                        "inverse-surface":            "#2e3132",
                        "warning-yellow":             "#a16207",
                        "success-green":              "#15803d"
                    },
                    borderRadius: {
                        DEFAULT: "0.25rem",
                        lg:      "0.5rem",
                        xl:      "0.75rem",
                        full:    "9999px"
                    },
                    spacing: {
                        "sidebar-width":      "260px",
                        "container-padding":  "24px",
                        "card-inner-padding": "24px",
                        "base":              "8px",
                        "gutter":            "16px",
                        "card-gap":          "20px"
                    },
                    fontFamily: {
                        "metric-value":  ["Inter"],
                        "body-main":     ["Inter"],
                        "h1-display":    ["Inter"],
                        "h2-subtitle":   ["Inter"],
                        "h3-card-title": ["Inter"],
                        "caption":       ["Inter"],
                        "label-sm":      ["Inter"]
                    },
                    fontSize: {
                        "metric-value":  ["28px", { lineHeight: "1.1", fontWeight: "700" }],
                        "body-main":     ["16px", { lineHeight: "1.5", fontWeight: "400" }],
                        "h1-display":    ["32px", { lineHeight: "1.2", letterSpacing: "-0.02em", fontWeight: "700" }],
                        "h2-subtitle":   ["18px", { lineHeight: "1.4", fontWeight: "500" }],
                        "h3-card-title": ["16px", { lineHeight: "1.4", fontWeight: "700" }],
                        "caption":       ["13px", { lineHeight: "1.4", fontWeight: "400" }],
                        "label-sm":      ["12px", { lineHeight: "1.2", fontWeight: "600" }]
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

        /* Borda padrão dos cards */
        .card-border {
            border: 1px solid rgba(195, 198, 208, 0.5);
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

            <!-- Link ativo: Dashboard -->
            <a href="index.php?acao=dashboard"
               class="bg-secondary text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">home</span>
                <span class="font-medium text-sm">Dashboard</span>
            </a>

            <!-- Link: Manutenções -->
            <a href="index.php?acao=manutencoes"
               class="text-white/70 hover:bg-white/10 hover:text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all">
                <span class="material-symbols-outlined">description</span>
                <span class="font-medium text-sm">Manutenções</span>
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

    <div class="flex-1 flex flex-col min-w-0 bg-white">

    <!-- ==============================
        CONTEÚDO PRINCIPAL
    ================================ -->

    <main class="flex-1 p-6 lg:p-8 bg-background space-y-6 overflow-auto">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

        <div>
            <h1 class="text-3xl font-bold text-primary">
                Dashboard do Técnico
            </h1>

            <p class="text-on-surface-variant mt-1">
                Acompanhe suas manutenções e atividades recentes.
            </p>
        </div>

        <div class="bg-surface-container-low px-5 py-3 rounded-xl border border-outline-variant/30">
            <p class="text-sm text-on-surface-variant">
                <?= date('d/m/Y') ?>
            </p>
        </div>

    </div>

    <!-- ==============================
        GRID SUPERIOR
    ============================== -->
    <section class="w-full">

        <!-- ==============================
            GRÁFICO
        ============================== -->
        <div class="xl:col-span-2 bg-surface-container-lowest rounded-xl card-border p-card-inner-padding">

            <div class="flex items-center justify-between mb-8">
                <div>
                    <h3 class="font-bold text-xl text-primary">
                        Atividades Realizadas
                    </h3>

                    <p class="text-sm text-on-surface-variant mt-1">
                        Últimos 6 meses
                    </p>
                </div>

                <span class="material-symbols-outlined text-secondary text-3xl">
                    analytics
                </span>
            </div>

            <div class="h-[320px] flex items-end justify-between gap-4 px-2">

                <?php 
                /** @var array $ordens */
                /** @var array $atividadesRecentes */

                    $grafico = $grafico ?? [];
                    $max = !empty($grafico)
                        ? max(array_column($grafico, 'total'))
                        : 1;

                    $max = max($max, 1);
                ?>

                <?php if (!empty($grafico)): ?>

                    <?php foreach($grafico as $item): ?>

                        <?php
                            $altura = ($item['total'] / $max) * 100;
                            $altura = max($altura, 10);
                        ?>

                        <div class="flex-1 h-full flex flex-col items-center justify-end group">

                            <!-- Valor -->
                            <span class="text-sm font-bold text-primary mb-3">
                                <?= $item['total'] ?>
                            </span>

                            <!-- Barra -->
                            <div
                                class="w-full rounded-t-xl bg-secondary/30 hover:bg-secondary transition-all duration-300"
                                style="height: <?= $altura ?>%;"
                            ></div>

                            <!-- Label -->
                            <span class="text-xs font-medium text-on-surface-variant mt-3 uppercase">
                                <?= htmlspecialchars($item['mes_nome']) ?>
                            </span>

                        </div>

                    <?php endforeach; ?>

                <?php else: ?>

                    <div class="w-full h-full flex items-center justify-center">
                        <div class="text-center">

                            <span class="material-symbols-outlined text-6xl text-outline-variant mb-3">
                                bar_chart
                            </span>

                            <p class="text-on-surface-variant">
                                Nenhuma atividade concluída encontrada.
                            </p>

                        </div>
                    </div>

                <?php endif; ?>

            </div>
        </div>

    </section>

    <!-- ==============================
        PRÓXIMAS TAREFAS
    ============================== -->
    <section class="bg-surface-container-lowest rounded-xl card-border p-card-inner-padding">

        <div class="flex items-center justify-between mb-8">

            <div>
                <h3 class="font-bold text-xl text-primary">
                    Próxima Tarefa
                </h3>

                <p class="text-sm text-on-surface-variant mt-1">
                    Ordens pendentes e em andamento
                </p>
            </div>

            <a href="index.php?acao=manutencoes"
            class="text-secondary font-semibold text-sm hover:underline">
                Ver todas
            </a>

        </div>

        <div class="space-y-5">

            <?php if (!empty($ordens)): ?>

<?php
    $ordem = $ordens[0];

    $tipo = strtolower($ordem->getTipo());
    $prioridade = strtolower($ordem->getPrioridade());
    $status = strtolower($ordem->getStatus());

    $corTipo = $tipo === 'corretiva'
        ? 'bg-error-container text-on-error-container'
        : 'bg-secondary-fixed text-on-secondary-fixed-variant';

    $corPrioridade = $prioridade === 'urgente' || $prioridade === 'alta'
        ? 'text-error'
        : ($prioridade === 'media'
            ? 'text-warning-yellow'
            : 'text-secondary');

    $corStatus = match($status) {
        'em_andamento' => 'bg-secondary text-white',
        'pendente' => 'bg-warning-yellow/20 text-warning-yellow',
        'agendada' => 'bg-surface-container-high text-on-surface',
        default => 'bg-surface-container text-on-surface'
    };
?>

    <div class="w-full p-6 rounded-xl border border-outline-variant/30 
                hover:border-primary/40 hover:shadow-md transition-all
                bg-surface-container-lowest">

        <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-6">

            <!-- Informações -->
            <div class="flex-1">

                <div class="flex flex-wrap items-center gap-3 mb-3">

                    <h4 class="text-lg font-bold text-primary">
                        <?= htmlspecialchars($ordem->getTitulo()) ?>
                    </h4>

                    <!-- Tipo -->
                    <span class="px-3 py-1 rounded-full text-[11px] font-bold uppercase <?= $corTipo ?>">
                        <?= ucfirst($tipo) ?>
                    </span>

                    <!-- Prioridade -->
                    <span class="text-sm font-semibold <?= $corPrioridade ?>">
                        ● <?= ucfirst($prioridade) ?>
                    </span>

                    <!-- Status -->
                    <span class="px-3 py-1 rounded-full text-[11px] font-bold uppercase <?= $corStatus ?>">
                        <?= str_replace('_', ' ', ucfirst($status)) ?>
                    </span>

                </div>

                <p class="text-on-surface-variant text-sm leading-relaxed">
                    <?= htmlspecialchars($ordem->getDescricao()) ?>
                </p>

                <?php if ($ordem->getNomeMaquina()): ?>

                    <div class="flex items-center gap-2 mt-4 text-sm text-on-surface-variant">

                        <span class="material-symbols-outlined text-base">
                            precision_manufacturing
                        </span>

                        <span>
                            <?= htmlspecialchars($ordem->getNomeMaquina()) ?>
                        </span>

                    </div>

                <?php endif; ?>

            </div>

            <!-- Botão -->
            <div class="flex-shrink-0">

                <a href="index.php?acao=detalhes-manutencao&id=<?= $ordem->getId() ?>"
                class="inline-flex items-center justify-center px-6 py-3 rounded-xl
                        bg-secondary text-white font-semibold
                        hover:opacity-90 transition-all">

                    Ver Ordem

                </a>

            </div>

        </div>

    </div>


            <?php else: ?>

                <div class="border border-dashed border-outline-variant rounded-xl p-14 text-center">

                    <span class="material-symbols-outlined text-6xl text-success-green mb-4">
                        task_alt
                    </span>

                    <h4 class="text-xl font-bold text-primary mb-2">
                        Nenhuma tarefa pendente
                    </h4>

                    <p class="text-on-surface-variant">
                        Excelente trabalho! Você está em dia.
                    </p>

                </div>

            <?php endif; ?>

        </div>

    </section>

    <!-- ==============================
        ATIVIDADES RECENTES
    ============================== -->
    <section class="bg-surface-container-lowest rounded-xl card-border p-card-inner-padding">

        <div class="flex items-center justify-between mb-8">

            <div>
                <h3 class="font-bold text-xl text-primary">
                    Atividades Recentes
                </h3>

                <p class="text-sm text-on-surface-variant mt-1">
                    Últimas manutenções concluídas
                </p>
            </div>

        </div>

        <div class="space-y-4">

            <?php if (!empty($atividadesRecentes)): ?>

                <?php foreach($atividadesRecentes as $atividade): ?>

                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between
                                gap-4 p-5 rounded-xl border border-outline-variant/20
                                bg-surface-container-low">

                        <div>

                            <div class="flex items-center gap-3 mb-2">

                                <span class="material-symbols-outlined text-success-green">
                                    check_circle
                                </span>

                                <h4 class="font-semibold text-primary">
                                    <?= htmlspecialchars($atividade->getTitulo()) ?>
                                </h4>

                            </div>

                            <p class="text-sm text-on-surface-variant">
                                <?= htmlspecialchars($atividade->getNomeMaquina()) ?>
                            </p>

                        </div>

                        <div class="text-sm text-on-surface-variant">

                            <?= date('d/m/Y H:i', strtotime($atividade->getDataConclusao())) ?>

                        </div>

                    </div>

                <?php endforeach; ?>

            <?php else: ?>

                <div class="text-center py-12">

                    <span class="material-symbols-outlined text-6xl text-outline-variant mb-3">
                        history
                    </span>

                    <p class="text-on-surface-variant">
                        Nenhuma atividade recente encontrada.
                    </p>

                </div>

            <?php endif; ?>

        </div>

    </section>

    </main>


    </div>
    <!-- Fim: Área Principal -->

</body>
</html>
