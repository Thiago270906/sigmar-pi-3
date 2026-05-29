
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
        
        <main class="flex-1 p-4 md:p-8 space-y-8 overflow-y-auto">
            <div class="grid grid-cols-1 gap-6">
                <h2 class="text-4xl font-bold text-primary">Painel Principal - Técnico</h2>
                <p class="text-body-main text-on-surface-variant">Confira o resumo operacional e suas próximas tarefas prioritárias.</p>
            </div>

            <!-- Recent Activities / History -->
            <div class="bg-surface-container-lowest rounded-xl card-border p-card-inner-padding flex-1">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-h3-card-title text-h3-card-title text-primary">Manutenções realizadas no mês</h3>
                </div>

                <div class="h-[240px] relative w-full flex items-end justify-between gap-2 px-4">
                    <div class="flex-1 bg-secondary/20 rounded-t-lg relative group transition-all hover:bg-secondary/40" style="height: 60%;">
                        <div class="absolute -top-6 left-1/2 -translate-x-1/2 text-[10px] font-bold text-on-surface-variant opacity-0 group-hover:opacity-100 transition-opacity">12</div>
                    </div>
                    <div class="flex-1 bg-secondary/20 rounded-t-lg relative group transition-all hover:bg-secondary/40" style="height: 80%;">
                        <div class="absolute -top-6 left-1/2 -translate-x-1/2 text-[10px] font-bold text-on-surface-variant opacity-0 group-hover:opacity-100 transition-opacity">16</div>
                    </div>
                    <div class="flex-1 bg-secondary/20 rounded-t-lg relative group transition-all hover:bg-secondary/40" style="height: 45%;">
                        <div class="absolute -top-6 left-1/2 -translate-x-1/2 text-[10px] font-bold text-on-surface-variant opacity-0 group-hover:opacity-100 transition-opacity">9</div>
                    </div>
                    <div class="flex-1 bg-secondary/20 rounded-t-lg relative group transition-all hover:bg-secondary/40" style="height: 95%;">
                        <div class="absolute -top-6 left-1/2 -translate-x-1/2 text-[10px] font-bold text-on-surface-variant opacity-0 group-hover:opacity-100 transition-opacity">18</div>
                    </div>
                    <div class="flex-1 bg-secondary/20 rounded-t-lg relative group transition-all hover:bg-secondary/40" style="height: 70%;">
                        <div class="absolute -top-6 left-1/2 -translate-x-1/2 text-[10px] font-bold text-on-surface-variant opacity-0 group-hover:opacity-100 transition-opacity">14</div>
                    </div>
                    <div class="flex-1 bg-secondary rounded-t-lg relative group transition-all" style="height: 20%;">
                        <div class="absolute -top-6 left-1/2 -translate-x-1/2 text-[10px] font-bold text-on-surface-variant">3</div>
                    </div>
                    <div class="flex-1 bg-secondary rounded-t-lg relative group transition-allflex-1 bg-secondary/20 rounded-t-lg relative group transition-all hover:bg-secondary/40" style="height: 5%;">
                        <div class="absolute -top-6 left-1/2 -translate-x-1/2 text-[10px] font-bold text-on-surface-variant opacity-0 group-hover:opacity-100 transition-opacity">0</div>
                    </div>
                </div>
                <div class="flex justify-between mt-4 px-4 font-caption text-caption text-on-surface-variant uppercase">
                    <span>Jan</span><span>Fev</span><span>Mar</span><span>Abr</span><span>Maio</span><span>Jun</span><span>Jul</span>
                </div>
            </div>

            <!-- ==============================
                 ALERTAS + PRÓXIMAS TAREFAS
            ============================== -->
            <section class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-start">

                <!-- ---- Próximas Tarefas (5/12 colunas em desktop) ---- -->
                <div class="col-span-1 lg:col-span-5">

                    <div class="bg-surface-container-lowest rounded-xl card-border p-card-inner-padding">

                        <!-- Cabeçalho -->
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="font-h3-card-title text-h3-card-title text-primary">
                                Próximas Tarefas
                            </h3>
                            <span class="text-xs text-on-surface-variant">Hoje</span>
                        </div>

                        <!-- Lista de tarefas -->
                        <div class="space-y-5">
                            <div class="flex-grow p-5 md:p-[24px]
                                        flex flex-col md:flex-row md:items-center
                                        justify-between gap-4 md:gap-6 bg-surface-container-lowest border border-outline-variant/30 rounded-xl
                                overflow-hidden hover:border-primary/50 transition-all group">
                            
                                <!-- Tarefa 1: Calibração -->
                                <div>
                                    <div class="flex flex-wrap items-center gap-2 mb-1">
                                        <h4 class="font-h3-card-title text-h3-card-title text-primary">
                                            Compressor Axial CP-402
                                        </h4>
                                        <span class="text-[10px] font-bold uppercase tracking-wider
                                                bg-error-container text-on-error-container
                                                px-2 py-0.5 rounded">
                                                Corretiva
                                        </span>
                                    </div>

                                    <p class="text-on-surface-variant text-sm mb-3">
                                        Vazamento de óleo detectado no retentor principal.
                                    </p>
                                </div>
                            </div>
                            <div class="flex-grow p-5 md:p-[24px]
                                        flex flex-col md:flex-row md:items-center
                                        justify-between gap-4 md:gap-6 bg-surface-container-lowest border border-outline-variant/30 rounded-xl
                                overflow-hidden hover:border-primary/50 transition-all group">
                            
                                <!-- Tarefa 1: Calibração -->
                                <div>
                                    <div class="flex flex-wrap items-center gap-2 mb-1">
                                        <h4 class="font-h3-card-title text-h3-card-title text-primary">
                                            Prensa Hidráulica PH-300
                                        </h4>
                                        <span class="text-[10px] font-bold uppercase tracking-wider
                                                     bg-secondary-fixed text-on-secondary-fixed-variant
                                                     px-2 py-0.5 rounded">
                                            Preventiva
                                        </span>
                                    </div>

                                    <p class="text-on-surface-variant text-sm mb-3">
                                        Troca de filtros e inspeção periódica de nível.
                                    </p>
                                </div>
                            </div>
                            
                        </div>
                        <!-- Fim: Lista de tarefas -->

                        <!-- Rodapé: ver agenda -->
                        <button class="w-full mt-8 py-2.5
                                       border border-outline-variant/30
                                       text-on-surface-variant font-bold rounded-lg text-xs
                                       hover:bg-surface-container-high transition-all">
                            Ver Ordens de Manutenções
                        </button>

                    </div>

                </div>
                <!-- Fim: Próximas Tarefas -->

            </section>
            <!-- Fim: Alertas + Próximas Tarefas -->

        </main>
        <!-- Fim: Conteúdo Principal (main) -->

    </div>
    <!-- Fim: Área Principal -->

</body>
</html>
