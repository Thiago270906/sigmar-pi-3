<!DOCTYPE html>
<html lang="pt-br">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Máquinas</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script src="assets/js/cep.js"></script>
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

        <!-- Logo -->
        <div class="px-6 mb-12">
            <div class="flex flex-col items-center">

                <!-- Imagem da logo -->
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
    
        <main class="flex-1 p-6 lg:p-10">

            

            <h1 class="font-h1-display text-h1-display text-primary">Cadastrar Máquina</h1>

                <?php if(isset($_SESSION['erro'])): ?>

                    <p>
                        <?= $_SESSION['erro'] ?>
                    </p>

                    <?php unset($_SESSION['erro']); ?>

                <?php endif; ?>

                <form action="index.php?acao=cadastrar-maquina" method="POST">


                    <form class="space-y-6">
                        <div class="grid grid-cols-12 gap-card-gap">
                            <!-- Section 1: Identificação Técnica -->
                            <div class="col-span-12">
                                <div class="form-card rounded-xl p-6">
                                    <h3 class="font-h2-subtitle text-h2-subtitle text-primary mb-6 flex items-center gap-2">
                                        <span class="material-symbols-outlined text-secondary" data-icon="settings_input_component">settings_input_component</span>
                                        Identificação Técnica
                                    </h3>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="space-y-2">
                                            <label class="text-label-sm font-label-sm text-on-surface-variant">Nome do Equipamento</label>
                                            <input type="text" name="nome" class="w-full rounded-lg border-outline-variant focus:border-secondary focus:ring-1 focus:ring-secondary py-2.5 text-body-main" placeholder="Ex: Torno CNC-04" type="text"/>
                                        </div>
                                        <div class="space-y-2">
                                            <label class="text-label-sm font-label-sm text-on-surface-variant">Tipo</label>
                                            <input type="text" name="tipo" class="w-full rounded-lg border-outline-variant focus:border-secondary focus:ring-1 focus:ring-secondary py-2.5 text-body-main" placeholder="Ex: Bobina" type="text"/>
                                        </div>
                                        <div class="space-y-2">
                                            <label class="text-label-sm font-label-sm text-on-surface-variant">Descrição</label>
                                            <textarea class="w-full rounded-lg border-outline-variant focus:border-secondary focus:ring-1 focus:ring-secondary py-2.5 text-body-main" name="descricao" placeholder="Ex: Máquina de usinagem"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>             
            <br>
            <br>


                    <h3 class="font-h1-display text-h1-display text-primary">Sensores</h3>

                    <a href="index.php?acao=form-sensor"class="w-full md:w-auto h-14 px-6 bg-primary-container hover:bg-primary text-white rounded-lg 
                        items-center justify-center transition-all active:scale-[0.98] text-body-main font-medium">Cadastrar Sensor</a>
                        
                    <br><br>

                    <?php if(!empty($_SESSION['sensores'])): ?>

                        <table border="1" cellpadding="10">

                            <tr>
                                <th>Modelo</th>
                                <th>Tipo</th>
                                <th>Alerta</th>
                                <th>Crítico</th>
                                <th>Ação</th>
                            </tr>

                            <?php foreach($_SESSION['sensores'] as $index => $sensor): ?>

                                <tr>

                                    <td>
                                        <?= $sensor['modelo'] ?>
                                    </td>

                                    <td>
                                        <?= ucfirst($sensor['tipo']) ?>
                                    </td>

                                    <td>
                                        <?= $sensor['limite_alerta'] ?>
                                    </td>

                                    <td>
                                        <?= $sensor['limite_critico'] ?>
                                    </td>

                                    <td>

                                        <a href="index.php?acao=remover-sensor&index=<?= $index ?>">
                                            Remover
                                        </a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </table>

                    <?php endif; ?>

                <a href="index.php?acao=cadastrar-maquina">
                    <button class="bg-primary-container hover:bg-primary text-white rounded-lg flex items-center justify-center gap-2 transition-all active:scale-95 px-6 py-3 font-bold shadow-md">
                        <span class="material-symbols-outlined">add</span>
                        Cadastrar Máquina
                    </button>
                </a>
        </main>
    </div>
</form>

</body>
</html>