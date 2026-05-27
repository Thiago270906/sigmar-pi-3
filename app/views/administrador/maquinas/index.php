<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Máquinas</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <!-- Fontes: Inter + Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

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
                        "body-main":    ["16px", { lineHeight: "1.5", fontWeight: "400" }],
                        "h1-display":   ["32px", { lineHeight: "1.2", letterSpacing: "-0.02em", fontWeight: "700" }],
                        "caption":      ["13px", { lineHeight: "1.4", fontWeight: "400" }],
                        "label-sm":     ["12px", { lineHeight: "1.2", fontWeight: "600" }],
                        "h2-subtitle":  ["18px", { lineHeight: "1.4", fontWeight: "500" }]
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

        /* Badges de status */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 10px;
            border-radius: 9999px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            white-space: nowrap;
        }
        .status-operacional { background-color: #dcfce7; color: #15803d; }
        .status-alerta       { background-color: #fef9c3; color: #a16207; }
        .status-critico      { background-color: #fee2e2; color: #b91c1c; }
    </style>
</head>

<body class="bg-background text-on-background font-body-main antialiased min-h-screen flex flex-col lg:flex-row">

    <!-- ==============================
         NAVBAR LATERAL
    ============================== -->
    <aside class="w-full lg:w-[260px] bg-primary lg:h-screen lg:sticky top-0 flex flex-col py-4 lg:py-8 flex-shrink-0">

        <!-- Logo -->
        <div class="px-6 mb-12">
            <div class="flex flex-col items-center">
                <img src="./assets/img/logo-sigmar.png" alt="Logo SIGMAR" class="w-36 h-auto mb-2">
            </div>
        </div>

        <!-- Menu de Navegação -->
        <nav class="flex-1 px-3 space-y-2">

            <a href="index.php?acao=dashboard"
               class="text-white/70 hover:bg-white/10 hover:text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all">
                <span class="material-symbols-outlined">home</span>
                <span class="font-medium text-sm">Dashboard</span>
            </a>

            <!-- Link ativo: Máquinas -->
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

        <!-- Logout -->
        <div class="mt-auto px-3 border-t border-white/10 pt-4">
            <a href="index.php?acao=logout"
               class="text-white/70 hover:text-white px-4 py-3 flex items-center gap-4 transition-all">
                <span class="material-symbols-outlined">logout</span>
                <span class="font-medium text-sm">Sair</span>
            </a>
        </div>

    </aside>

    <!-- ==============================
         CONTEÚDO PRINCIPAL
    ============================== -->
    <div class="flex-1 flex flex-col min-w-0 bg-white">

        <!-- Barra Superior -->
        <header class="h-16 flex items-center justify-between px-8 bg-white border-b border-outline-variant/30">
            <div href="index.php?acao=notificacoes" class="flex items-center gap-6 ml-4">

                <button class="relative text-on-surface-variant hover:text-primary transition-colors">
                    <img src="./assets/img/notificacao.png" width="25px" height="30px">
                </button>

                <div href="index.php?acao=perfil" class="flex items-center gap-3">
                    <button>
                        <div class="w-10 h-10 rounded-full border border-outline-variant/50 flex items-center justify-center overflow-hidden bg-surface-container">
                            <span class="material-symbols-outlined text-outline">person</span>
                        </div>
                    </button>
                </div>

            </div>
        </header>

        <main class="flex-1 p-4 md:p-8 space-y-8 overflow-y-auto">

            <!-- Título da página + botão de cadastro -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                <div>
                    <h2 class="font-h1-display text-h1-display text-primary">Máquinas</h2>
                    <p class="text-on-surface-variant font-body-main">Gerencie e monitore o estado de todos os ativos industriais.</p>
                </div>

                <!-- Botão de cadastro de máquina -->
                <a href="index.php?acao=form-maquina">
                    <button class="bg-primary-container hover:bg-primary text-white rounded-lg flex items-center justify-center gap-2 transition-all active:scale-95 px-6 py-3 font-bold shadow-md">
                        <span class="material-symbols-outlined">add</span>
                        Cadastrar Máquina
                    </button>
                </a>
            </div>

            <!-- Icones de status -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-card-gap mb-8">

                <!-- icone de Operacional -->
                <div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant shadow-sm border-l-4 border-l-green-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-caption text-on-surface-variant font-medium">Operacional</p>
                            <h3 class="text-metric-value text-primary mt-1">32</h3>
                        </div>
                        <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center text-green-600">
                            <span class="material-symbols-outlined text-3xl">check_circle</span>
                        </div>
                    </div>
                </div>

                <!-- icone de Alerta -->
                <div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant shadow-sm border-l-4 border-l-amber-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-caption text-on-surface-variant font-medium">Equipamentos em Alerta</p>
                            <h3 class="text-metric-value text-primary mt-1">7</h3>
                        </div>
                        <div class="w-12 h-12 bg-amber-50 rounded-lg flex items-center justify-center text-amber-600">
                            <span class="material-symbols-outlined text-3xl">warning</span>
                        </div>
                    </div>
                </div>

                <!-- icone de estado Crítico -->
                <div class="bg-surface-container-lowest p-6 rounded-xl border border-outline-variant shadow-sm border-l-4 border-l-red-500">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-caption text-on-surface-variant font-medium">Estado Crítico</p>
                            <h3 class="text-metric-value text-primary mt-1">3</h3>
                        </div>
                        <div class="w-12 h-12 bg-red-50 rounded-lg flex items-center justify-center text-red-600">
                            <span class="material-symbols-outlined text-3xl">error</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- ==============================
                 SEÇÃO DE LISTA DE EQUIPAMENTOS
            ============================== -->
            <div class="bg-surface-container-lowest rounded-xl border border-outline-variant shadow-sm overflow-hidden">

                <!-- Cabeçalho da lista -->
                <div class="p-6 border-b border-outline-variant bg-surface-bright">
                    <div class="flex items-center justify-between w-full">
                        <h3 class="text-h2-subtitle font-bold text-primary">Lista de Equipamentos</h3>
                        <button class="p-2 rounded-lg border border-outline-variant hover:bg-surface-container-high text-on-surface-variant transition-all">
                            <span class="material-symbols-outlined text-[20px]">filter_list</span>
                        </button>
                    </div>
                </div>

                <!-- Tabela com scroll horizontal em telas pequenas -->
                <div class="w-full overflow-x-auto">
                    <table class="w-full min-w-[800px] text-left border-collapse">

                        <!--
                            CABEÇALHO DA TABELA
                        -->
                        <thead>
                            <tr class="bg-surface-container-low border-b border-outline-variant">
                                <th class="px-6 py-4 text-label-sm text-on-surface-variant font-bold uppercase tracking-wider">ID</th>
                                <th class="px-6 py-4 text-label-sm text-on-surface-variant font-bold uppercase tracking-wider">Nome</th>
                                <th class="px-6 py-4 text-label-sm text-on-surface-variant font-bold uppercase tracking-wider">Tipo</th>
                                <th class="px-6 py-4 text-label-sm text-on-surface-variant font-bold uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-label-sm text-on-surface-variant font-bold uppercase tracking-wider">Temperatura</th>
                                <th class="px-6 py-4 text-label-sm text-on-surface-variant font-bold uppercase tracking-wider">Vibração</th>
                                <th class="px-6 py-4 text-label-sm text-on-surface-variant font-bold uppercase tracking-wider text-right">Detalhes</th>
                            </tr>
                        </thead>

                        <!--
                            CORPO DA TABELA
                        -->
                        <tbody class="divide-y divide-outline-variant/30">

                            <!-- Item 1 -->
                            <tr class="hover:bg-surface-container-low transition-colors cursor-pointer">
                                <td class="px-6 py-4 text-caption font-medium text-on-surface">1</td>
                                <td class="px-6 py-4 text-caption font-bold text-on-surface">Torno CNC-04</td>
                                <td class="px-6 py-4 text-caption font-medium text-on-surface-variant">Equipamento</td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-operacional">
                                        <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                        Operacional
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-caption text-on-surface-variant">35°C</td>
                                <td class="px-6 py-4 text-caption text-on-surface-variant">0.2 mm/s</td>
                                <td class="px-6 py-4 text-right">

                                    <!-- Botão Ver Detalhes — linkei qie nem como ta configurado no PHP no final do codigo -->
                                    <a href="index.php?acao=detalhes-maquina&id=1" title="Ver detalhes">
                                        <button class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg hover:bg-surface-container-high text-secondary text-caption font-semibold transition-all">
                                            Ver Detalhes
                                        </button>
                                    </a>
                                </td>
                            </tr>

                            <!-- Item 2 -->
                            <tr class="hover:bg-surface-container-low transition-colors cursor-pointer">
                                <td class="px-6 py-4 text-caption font-medium text-on-surface">2</td>
                                <td class="px-6 py-4 text-caption font-bold text-on-surface">Braço Robótico KUKA</td>
                                <td class="px-6 py-4 text-caption font-medium text-on-surface-variant">Robô</td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-alerta">
                                        <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">warning</span>
                                        Alerta
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-caption text-on-surface-variant">62°C</td>
                                <td class="px-6 py-4 text-caption text-on-surface-variant">1.8 mm/s</td>
                                <td class="px-6 py-4 text-right">
                                    <a href="index.php?acao=detalhes-maquina&id=2" title="Ver detalhes">
                                        <button class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg hover:bg-surface-container-high text-secondary text-caption font-semibold transition-all">
                                            Ver Detalhes
                                        </button>
                                    </a>
                                </td>
                            </tr>

                            <!-- Item 3 -->
                            <tr class="hover:bg-surface-container-low transition-colors cursor-pointer">
                                <td class="px-6 py-4 text-caption font-medium text-on-surface">3</td>
                                <td class="px-6 py-4 text-caption font-bold text-on-surface">Compressor Industrial</td>
                                <td class="px-6 py-4 text-caption font-medium text-on-surface-variant">Compressor</td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-critico">
                                        <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">error</span>
                                        Crítico
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-caption font-extrabold text-error">IMEDIATO</td>
                                <td class="px-6 py-4 text-caption font-extrabold text-error">IMEDIATO</td>
                                <td class="px-6 py-4 text-right">
                                    <a href="index.php?acao=detalhes-maquina&id=3" title="Ver detalhes">
                                        <button class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg hover:bg-surface-container-high text-secondary text-caption font-semibold transition-all">
                                            Ver Detalhes
                                        </button>
                                    </a>
                                </td>
                            </tr>

                            <!-- Item 4 -->
                            <tr class="hover:bg-surface-container-low transition-colors cursor-pointer">
                                <td class="px-6 py-4 text-caption font-medium text-on-surface">4</td>
                                <td class="px-6 py-4 text-caption font-bold text-on-surface">Forno Térmico HT-30</td>
                                <td class="px-6 py-4 text-caption font-medium text-on-surface-variant">Forno</td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-operacional">
                                        <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                        Operacional
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-caption text-on-surface-variant">48°C</td>
                                <td class="px-6 py-4 text-caption text-on-surface-variant">0.5 mm/s</td>
                                <td class="px-6 py-4 text-right">
                                    <a href="index.php?acao=detalhes-maquina&id=4" title="Ver detalhes">
                                        <button class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg hover:bg-surface-container-high text-secondary text-caption font-semibold transition-all">
                                            Ver Detalhes
                                        </button>
                                    </a>
                                </td>
                            </tr>

                            <!-- Item 5 -->
                            <tr class="hover:bg-surface-container-low transition-colors cursor-pointer">
                                <td class="px-6 py-4 text-caption font-medium text-on-surface">5</td>
                                <td class="px-6 py-4 text-caption font-bold text-on-surface">Esteira Transportadora</td>
                                <td class="px-6 py-4 text-caption font-medium text-on-surface-variant">Esteira</td>
                                <td class="px-6 py-4">
                                    <span class="status-badge status-operacional">
                                        <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                        Operacional
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-caption text-on-surface-variant">29°C</td>
                                <td class="px-6 py-4 text-caption text-on-surface-variant">0.1 mm/s</td>
                                <td class="px-6 py-4 text-right">
                                    <a href="index.php?acao=detalhes-maquina&id=5" title="Ver detalhes">
                                        <button class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg hover:bg-surface-container-high text-secondary text-caption font-semibold transition-all">
                                            Ver Detalhes
                                        </button>
                                    </a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <!-- Fim: tabela -->

            </div>
            <!-- Fim: seção de lista -->

        </main>

        <!-- ==============================
             BLOCO PHP — ainda não mexi alem do detalhes da máquina
        ============================== -->

        <h1>Máquinas</h1>

        <hr>

        <?php if(isset($_SESSION['sucesso'])): ?>

            <p>
                <?= $_SESSION['sucesso']; ?>
            </p>

            <?php unset($_SESSION['sucesso']); ?>

        <?php endif; ?>

        <?php if(isset($_SESSION['erro'])): ?>

            <p>
                <?= $_SESSION['erro']; ?>
            </p>

            <?php unset($_SESSION['erro']); ?>

        <?php endif; ?>

        <?php if(empty($maquinas)): ?>

            <p>Nenhuma máquina cadastrada.</p>

        <?php else: ?>

            <table border="1" cellpadding="10">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Status</th>
                        <th>Temperatura</th>
                        <th>Vibração</th>
                        <th>Detalhes</th>
                    </tr>

                </thead>

                <tbody>

                    <?php foreach($maquinas as $maquina): ?>

                        <tr>

                            <td>
                                <?= $maquina->getId(); ?>
                            </td>

                            <td>
                                <?= $maquina->getNome(); ?>
                            </td>

                            <td>
                                <?= ucfirst($maquina->getTipo()); ?>
                            </td>

                            <td>
                                <?= ucfirst($maquina->getStatus()); ?>
                            </td>

                            <!-- TEMPERATURA -->
                            <td>

                                <?php if($maquina->getSensorTemperatura()): ?>

                                    <?= $maquina->getSensorTemperatura()->getValorAtual(); ?>
                                    <?= $maquina->getSensorTemperatura()->getUnidade(); ?>

                                <?php else: ?>

                                    --

                                <?php endif; ?>

                            </td>

                            <!-- VIBRAÇÃO -->
                            <td>

                                <?php if($maquina->getSensorVibracao()): ?>

                                    <?= $maquina->getSensorVibracao()->getValorAtual(); ?>
                                    <?= $maquina->getSensorVibracao()->getUnidade(); ?>

                                <?php else: ?>

                                    --

                                <?php endif; ?>

                            </td>

                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">

                                    <!-- Ver detalhes da máquina -->
                                    <a href="index.php?acao=detalhes-maquina&id=<?= $maquina->getId() ?>" title="Ver detalhes">
                                        <button class="p-1.5 rounded-lg hover:bg-surface-container-high text-secondary transition-all">
                                            <p>Ver Detalhes</p>
                                        </button>
                                    </a>
                                </div>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        <?php endif; ?>

    </div>
    <!-- Fim: conteúdo principal -->

</body>
</html>