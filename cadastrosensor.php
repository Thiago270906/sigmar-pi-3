
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sigmar- Cadastrar Máquina</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Fontes -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

    <!-- Configuração do Tailwind (tokens de design) -->
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
        /* Ícones Material Symbols */
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            line-height: 1;
        }

        /* Card padrão dos formulários */
        .form-card {
            background-color: #FFFFFF;
            border: 1px solid #DEE2E6;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.04);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
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

            <a href="index.php?acao=dashboard"
               class="text-white/70 hover:bg-white/10 hover:text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all">
                <span class="material-symbols-outlined">home</span>
                <span class="font-medium text-sm">Dashboard</span>
            </a>

            <a href="index.php?acao=maquinas"
               class="bg-secondary text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">settings_input_component</span>
                <span class="font-medium text-sm">Máquinas</span>
            </a>

            <a href="index.php?acao=manutencoes"
               class="text-white/70 hover:bg-white/10 hover:text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all">
                <span class="material-symbols-outlined">description</span>
                <span class="font-medium text-sm">Manutenções</span>
            </a>

            <a href="index.php?acao=funcionarios"
               class="text-white/70 hover:bg-white/10 hover:text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all">
                <span class="material-symbols-outlined">group</span>
                <span class="font-medium text-sm">Funcionários</span>
            </a>

        </nav>

        <div class="mt-auto px-3 border-t border-white/10 pt-4">
            <a href="index.php?acao=logout"
               class="text-white/70 hover:text-white px-4 py-3 flex items-center gap-4 transition-all">
                <span class="material-symbols-outlined">logout</span>
                <span class="font-medium text-sm">Sair</span>
            </a>
        </div>

    </aside>
    <!-- Fim: Navbar Lateral -->

    <main class="flex-1 p-4 md:p-8 space-y-8 overflow-y-auto">

        <!-- Header da página -->
        <div>
            <h2 class="font-h1-display text-h1-display text-primary">Cadastrar Novo Sensor</h2>
            <p class="text-body-main text-on-surface-variant mt-1">
                Preencha as informações técnicas para registrar o novo sensor no sistema.
            </p>
        </div>

        <!-- Feedback de sessão: erro -->
        <?php if (isset($_SESSION['erro'])): ?>
            <div class="px-4 py-3 rounded-lg bg-error-container text-on-error-container font-medium text-body-main">
                <?php echo htmlspecialchars($_SESSION['erro']); unset($_SESSION['erro']); ?>
            </div>
        <?php endif; ?>
        <form action="index.php?acao=adicionar-sensor" method="POST">

            <div class="grid grid-cols-12 gap-card-gap">

                <!-- Identificação Técnica-->
                <div class="col-span-12">
                    <div class="form-card rounded-xl p-6">

                        <h3 class="font-h2-subtitle text-h2-subtitle text-primary mb-6 flex items-center gap-2">
                            <span class="material-symbols-outlined text-secondary">sensors</span>
                            Cadastro de Sensor
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <!-- Nome do sensor -->
                            <div class="space-y-2">
                                <label class="text-label-sm font-label-sm text-on-surface-variant"
                                       for="nome">Nome do Sensor</label>
                                <input class="w-full rounded-lg border-outline-variant focus:border-secondary focus:ring-1 focus:ring-secondary py-2.5 text-body-main"
                                       id="modelo"
                                       name="modelo"
                                       type="text"
                                       placeholder="Modelo do sensor (ex: LM35)"
                                       required />
                            </div>

                            <!-- Tipo do sensor -->
                            <div class="space-y-2">
                                <label class="text-label-sm font-label-sm text-on-surface-variant"
                                       for="tipo">Tipo de sensor</label>

                                <select class="w-full rounded-lg border-outline-variant focus:border-secondary focus:ring-1 focus:ring-secondary py-2.5 text-body-main" name="tipo" id="tipo" required>
                                    <option value="">
                                        Selecione o tipo do sensor
                                    </option>

                                    <option value="temperatura">
                                        Temperatura
                                    </option>

                                    <option value="vibracao">
                                        Vibração
                                    </option>
                                </select>
                            </div>

                            <!-- Limite de Alerta e Limite Crítico -->
                            <div class="space-y-2">
                                <label class="text-label-sm font-label-sm text-on-surface-variant"
                                       for="descricao">Limite de Alerta</label>
                                <div id="campo-alerta">
                                    <input
                                        type="number"
                                        step="0.01"
                                        name="limite_alerta"
                                        placeholder="Insira o limite de alerta do sensor"
                                        required
                                    >
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="text-label-sm font-label-sm text-on-surface-variant"
                                       for="descricao">Limite Crítico</label>
                                <div id="campo-critico">

                                    <input
                                        type="number"
                                        step="0.01"
                                        name="limite_critico"
                                        placeholder="Insira o limite crítico do sensor"
                                    >
                                
                                    <br><br>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- =========================
                Footer: Ações do formulário
            ========================= -->
            <div class="flex justify-start items-center gap-4 py-6 mt-4 justify-end">

                <!-- Cancelar -->
                <a href="index.php?acao=maquinas" class="px-6 py-2.5 rounded-lg font-medium text-body-main text-on-surface-variant hover:bg-surface-container-high transition-colors">
                    Cancelar
                </a>

                <!-- Submeter formulário -->
                <button class="px-8 py-2.5 bg-secondary text-on-secondary rounded-lg font-bold text-body-main shadow-md hover:opacity-90 active:scale-95 transition-all flex items-center gap-2"
                        type="submit">
                    <span class="material-symbols-outlined text-lg">save</span>
                    Adicionar Sensor
                </button>

            </div>

        </form>

        <script>

        const tipo = document.getElementById('tipo');

        const campoCritico =
            document.getElementById('campo-critico');

        tipo.addEventListener('change', function()
        {
            if(this.value === 'vibracao')
            {
                campoCritico.style.display = 'none';
            }
            else
            {
                campoCritico.style.display = 'block';
            }
        });

        </script>
        
    </main>
</body>
</html>