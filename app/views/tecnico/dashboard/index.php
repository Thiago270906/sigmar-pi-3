
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
        ============================== -->
        
    <!-- Gráfico de Manutenções -->
    <div class="bg-surface-container-lowest rounded-xl card-border p-card-inner-padding">
        <div class="flex justify-between items-center mb-6">
            <h3 class="font-h3-card-title text-h3-card-title text-primary">
                Manutenções realizadas nos últimos meses
            </h3>
        </div>

        <div class="h-[280px] relative w-full flex items-end justify-between gap-3 px-4">
            <?php 
            $grafico = $grafico ?? [];   // Proteção contra variável indefinida
            $max = !empty($grafico) ? max(array_column($grafico, 'total')) : 0;
            $max = max($max, 1);
            ?>

            <?php if (!empty($grafico)): ?>
                <?php foreach($grafico as $item): ?>
                    <?php 
                    $altura = ($item['total'] / $max) * 100;
                    $altura = max($altura, 8);
                    ?>
                    <div class="flex-1 flex flex-col items-center group">
                        <div class="text-xs font-bold text-on-surface-variant mb-1">
                            <?= $item['total'] ?>
                        </div>
                        <div class="w-full bg-secondary/30 rounded-t-lg hover:bg-secondary/70 transition-all"
                            style="height: <?= $altura ?>%;">
                        </div>
                        <div class="text-[10px] font-medium text-on-surface-variant mt-3">
                            <?= ucfirst($item['mes_nome']) ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Mensagem quando não há dados -->
                <div class="flex-1 flex items-center justify-center h-full text-on-surface-variant/60">
                    <p>Nenhuma manutenção concluída nos últimos meses.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

           <!-- ==============================
                PRÓXIMAS TAREFAS
            ============================== -->
            <section class="grid grid-cols-1 w-full gap-gutter items-start">

                <div class="w-full">
                    <div class="bg-surface-container-lowest rounded-xl card-border p-card-inner-padding w-full">

                        <!-- Cabeçalho -->
                        <div class="flex items-center justify-between mb-6 w-full">
                            <h3 class="font-h3-card-title text-h3-card-title text-primary">
                                Próximas Tarefas
                            </h3>
                            <span class="text-xs text-on-surface-variant">Hoje / Pendentes</span>
                        </div>

                        <!-- Lista de tarefas -->
                        <div class="space-y-5 w-full">

                            <?php if (!empty($ordens)): ?>

                                <?php foreach ($ordens as $ordem): ?>

                                    <?php
                                        $tipo = strtolower($ordem->getTipo());
                                        $prioridade = strtolower($ordem->getPrioridade());

                                        $corTipo = $tipo === 'corretiva' 
                                            ? 'bg-error-container text-on-error-container' 
                                            : 'bg-secondary-fixed text-on-secondary-fixed-variant';

                                        $corPrioridade = $prioridade === 'alta' 
                                            ? 'text-error' 
                                            : ($prioridade === 'media' ? 'text-warning' : 'text-secondary');
                                    ?>

                                    <div class="w-full p-6 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 
                                                bg-surface-container-lowest border border-outline-variant/30 rounded-xl
                                                hover:border-primary/50 hover:shadow-md transition-all">

                                        <!-- Informações -->
                                        <div class="flex-1 min-w-0">
                                            <div class="flex flex-wrap items-center gap-3 mb-3">
                                                <h4 class="font-bold text-lg text-primary">
                                                    <?= htmlspecialchars($ordem->getTitulo()) ?>
                                                </h4>

                                                <span class="text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded <?= $corTipo ?>">
                                                    <?= ucfirst($tipo) ?>
                                                </span>

                                                <span class="text-xs font-semibold <?= $corPrioridade ?>">
                                                    ● <?= ucfirst($prioridade) ?>
                                                </span>
                                            </div>

                                            <p class="text-on-surface-variant text-sm line-clamp-2">
                                                <?= htmlspecialchars($ordem->getDescricao()) ?>
                                            </p>

                                            <?php if ($ordem->getNomeMaquina()): ?>
                                                <p class="text-xs text-on-surface-variant mt-2">
                                                    <strong>Máquina:</strong> <?= htmlspecialchars($ordem->getNomeMaquina()) ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>

                                        <!-- Botão -->
                                        <div class="flex-shrink-0">
                                            <a href="index.php?acao=detalhes-manutencao&id=<?= $ordem->getId() ?>"
                                            class="inline-flex items-center justify-center px-6 py-3 bg-secondary text-white rounded-lg font-semibold hover:opacity-90 transition">
                                                Ver Ordem
                                            </a>
                                        </div>
                                    </div>

                                <?php endforeach; ?>

                            <?php else: ?>

                                <div class="w-full p-12 text-center rounded-xl border border-dashed border-outline-variant text-on-surface-variant">
                                    <p class="text-lg">🎉 Nenhuma tarefa pendente no momento.</p>
                                    <p class="text-sm mt-2">Ótimo trabalho!</p>
                                </div>

                            <?php endif; ?>

                        </div>

                        <!-- Botão inferior -->
                        <a href="index.php?acao=manutencoes"
                        class="block w-full mt-8 py-4 text-center border border-outline-variant/30 rounded-xl font-bold hover:bg-surface-container-high transition-all">
                            Ver Todas as Ordens de Manutenção
                        </a>

                    </div>
                </div>

            </section>

        </main>
        <!-- Fim: Conteúdo Principal (main) -->

    </div>
    <!-- Fim: Área Principal -->

</body>
</html>
