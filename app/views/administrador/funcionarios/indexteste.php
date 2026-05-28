<?php
    /*
    |--------------------------------------------------------------------------
    | View: Lista de Funcionários (Admin)
    | Utiliza a variável $usuarios injetada pelo FuncionarioController::index()
    |--------------------------------------------------------------------------
    */
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SIGMAR - Dashboard</title>
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

            <a href="index.php?acao=dashboard"
               class="text-white/70 hover:bg-white/10 hover:text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all">
                <span class="material-symbols-outlined">home</span>
                <span class="font-medium text-sm">Dashboard</span>
            </a>

            <a href="index.php?acao=maquinas"
               class="text-white/70 hover:bg-white/10 hover:text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all">
                <span class="material-symbols-outlined">settings_input_component</span>
                <span class="font-medium text-sm">Máquinas</span>
            </a>

            <a href="index.php?acao=manutencoes"
               class="text-white/70 hover:bg-white/10 hover:text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all">
                <span class="material-symbols-outlined">description</span>
                <span class="font-medium text-sm">Manutenções</span>
            </a>

            <a href="index.php?acao=funcionarios"
               class="bg-secondary text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">group</span>
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
        <div class="grid grid-cols-1 gap-6">

            <!-- Feedback de sessão: sucesso ou erro -->
            <?php if (isset($_SESSION['sucesso'])): ?>
                <div class="px-4 py-3 rounded-lg bg-emerald-100 text-emerald-800 font-medium text-body-main">
                    <?php echo htmlspecialchars($_SESSION['sucesso']); unset($_SESSION['sucesso']); ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['erro'])): ?>
                <div class="px-4 py-3 rounded-lg bg-error-container text-on-error-container font-medium text-body-main">
                    <?php echo htmlspecialchars($_SESSION['erro']); unset($_SESSION['erro']); ?>
                </div>
            <?php endif; ?>

            <!-- Header -->
            <div class="flex justify-between items-end">
                <div>
                    <h2 class="text-4xl font-bold text-primary">Gestão de Funcionários</h2>
                    <p class="text-body-main text-on-surface-variant">
                        Gerencie técnicos, especializações e disponibilidade em tempo real.
                    </p>
                </div>

                <!-- Cadastrar Funcionário → formCadastrarFuncionario() -->
                <a href="index.php?acao=form-funcionario">
                   <button class="bg-primary-container hover:bg-primary text-white rounded-lg flex items-center justify-center gap-2 transition-all active:scale-95 px-6 py-3 font-bold shadow-md">
                        <span class="material-symbols-outlined">person_add</span>
                        <span>Adicionar Funcionário</span>
                   </button>
                </a>
            </div>

            <!-- =========================
                 Cards de resumo (Total de Técnicos, Disponíveis, etc.)
            ========================= -->

            <div class="grid grid-cols-1 md:grid-cols-3 gap-card-gap">

                <!-- Card: Total de Técnicos -->
                <div class="bg-surface-container-lowest border border-outline-variant p-6 rounded-xl card-shadow flex items-start justify-between">
                    <div>
                        <p class="text-label-sm text-on-surface-variant uppercase tracking-wider">Total de Funcionários</p>
                        <!-- Contagem dinâmica total de usuários -->
                        <h3 class="text-metric-value text-primary mt-1">
                            <?php echo !empty($usuarios) ? count($usuarios) : 0; ?>
                        </h3>
                    </div>
                    <div class="bg-primary/5 p-3 rounded-lg">
                        <span class="material-symbols-outlined text-primary">groups</span>
                    </div>
                </div>

                <!-- Card: Disponíveis -->
                <div class="bg-surface-container-lowest border border-outline-variant p-6 rounded-xl card-shadow flex items-start justify-between border-t-4 border-t-emerald-500">
                    <div>
                        <p class="text-label-sm text-on-surface-variant uppercase tracking-wider">Técnicos Disponíveis</p>
                        <!-- Contagem de usuários com cargo de técnico disponível -->
                        <h3 class="text-metric-value text-primary mt-1">
                            <?php
                                $totalDisponiveis = 0;
                                if (!empty($usuarios)) {
                                    foreach ($usuarios as $u) {
                                        if (strtolower($u->getCargo()) === 'tecnico') {
                                            $totalDisponiveis++;
                                        }
                                    }
                                }
                                echo $totalDisponiveis;
                            ?>
                        </h3>
                    </div>
                    <div class="bg-emerald-50 p-3 rounded-lg">
                        <span class="material-symbols-outlined text-emerald-600">check_circle</span>
                    </div>
                </div>

            </div>

            <!-- =========================
                 Employee List Table Container
                 ========================= -->
            <div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden card-shadow">

                <!-- Cabeçalho da tabela -->
                    <div class="p-6 border-b border-outline-variant flex justify-between items-center">
                        <h3 class="font-h2-subtitle text-h2-subtitle text-primary">Lista de Funcionários</h3>
                        <div class="flex gap-2">
                            <form method="GET" class="flex items-center gap-2">

                            <input type="hidden" name="acao" value="maquinas">

                            <select
                                name="cargo"
                                class="border border-outline-variant rounded-lg px-3 py-2 text-sm">
                                <option value="">Todos</option>

                                <option value="admin"
                                    <?= (isset($_GET['cargo']) && $_GET['cargo'] == 'admin') ? 'selected' : ''; ?>>
                                    Administrador
                                </option>

                                <option value="tecnico" <?= (isset($_GET['cargo']) && $_GET['cargo'] == 'tecnico') ? 'selected' : ''; ?>>
                                    Técnico
                                </option>
                            </select>

                            <button type="submit" class="p-2 rounded-lg border border-outline-variant hover:bg-surface-container-high transition-all">
                                <span class="material-symbols-outlined text-[20px]">
                                    filter_list
                                </span>
                            </button>

                        </form>
                        </div>
                    </div>

                <!-- Tabela de funcionários -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">

                        <thead>
                            <tr class="bg-surface-container-low text-on-surface-variant text-label-sm uppercase tracking-wider">
                                <th class="px-6 py-4 text-xs font-bold uppercase">ID</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase">Nome</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase">Email</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase">Cargo</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase">Telefone</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase">CEP</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase text-right">Detalhes</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-outline-variant">

                            <?php if (empty($usuarios)): ?>

                                <!-- Mensagem quando não há funcionários cadastrados -->
                                <tr>
                                    <td colspan="5" class="px-6 py-10 text-center text-on-surface-variant text-body-main">
                                        Nenhum funcionário cadastrado.
                                    </td>
                                </tr>

                            <?php else: ?>

                                <?php foreach ($usuarios as $usuario): ?>

                                    <tr class="hover:bg-gray-50 transition-colors border-b">

                                        <!-- Nome + ID do funcionário -->
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <p class="text-caption text-on-surface-variant">
                                                    <?php echo htmlspecialchars($usuario->getId()); ?>
                                                </p>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                    <p class="font-semibold text-on-surface">
                                                        <?php echo htmlspecialchars($usuario->getNome()); ?>
                                                    </p>
                                            </div>
                                        </td>

                                        <!-- Email -->
                                        <td class="px-6 py-4 text-body-main text-on-surface-variant">
                                            <?php echo htmlspecialchars($usuario->getEmail()); ?>
                                        </td>

                                        <!-- Cargo (ucfirst para capitalizar) -->
                                        <td class="px-6 py-4 text-body-main">
                                            <?php echo htmlspecialchars(ucfirst($usuario->getCargo())); ?>
                                        </td>

                                        <!-- Telefone (exibe 'Não informado' se nulo) -->
                                        <td class="px-6 py-4 text-body-main text-on-surface-variant">
                                            <?php echo htmlspecialchars($usuario->getTelefone() ?? 'Não informado'); ?>
                                        </td>

                                        <!-- Data de Criação -->
                                        <td class="px-6 py-4 text-body-main text-on-surface-variant">
                                            <?php echo htmlspecialchars($usuario->getCriadaEm()); ?>
                                        </td>


                                        <!-- Detalhes: visualizar -->
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex justify-end gap-2">

                                                <!-- Visualizar funcionário -->
                                                <a href="index.php?acao=detalhes-funcionario&id=<?php echo (int) $usuario->getId(); ?>">
                                                    <button class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg hover:bg-gray-100 text-secondary font-semibold transition-all">
                                                        Ver Detalhes
                                                    </button>
                                                </a>

                                            </div>
                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>

</body>
</html>