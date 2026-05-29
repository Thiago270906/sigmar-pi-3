<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGMAR - Funcionário</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <!-- Fontes -->
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

        .cargo-total {
            background-color: #f0f0f0;
            color: #555555;
        }

        .cargo-tecnico {
            background-color: #dcfce7;
            color: #15803d;
        }

    </style>
</head>

<body class="bg-background text-on-background font-body-main antialiased min-h-screen flex flex-col lg:flex-row">

<?php
require_once __DIR__ . '/../../../models/Usuario.php';

/** @var Usuario $usuarios */

    $total = 0;
    $tecnico = 0;

    foreach($usuarios as $usuario)
    {
        $cargo = strtolower(trim($usuario->getCargo()));

        $total++;
        switch($cargo)
        {
            case 'tecnico':
                $tecnico++;
                break;

        }
    }
?>

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

<!-- ==============================
     CONTEÚDO
============================== -->
<div class="flex-1 flex flex-col min-w-0 bg-white">

    <main class="flex-1 p-4 md:p-8 space-y-8 overflow-y-auto">

        <!-- Cabeçalho -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">

            <div>
                <h2 class="text-4xl font-bold text-primary">
                    Funcionários
                </h2>

                <p class="text-on-surface-variant">
                    Gerencie técnicos, especializações e disponibilidade em tempo real.
                </p>
            </div>

            <a href="index.php?acao=form-funcionario">
                <button class="bg-primary-container hover:bg-primary text-white rounded-lg flex items-center justify-center gap-2 transition-all active:scale-95 px-6 py-3 font-bold shadow-md">

                    <span class="material-symbols-outlined">add</span>

                    Cadastrar Funcionário
                </button>
            </a>

        </div>

        <!-- Mensagens -->
        <?php if(isset($_SESSION['sucesso'])): ?>

            <div class="p-4 rounded-lg bg-green-100 border border-green-300 text-green-700">
                <?= $_SESSION['sucesso']; ?>
            </div>

            <?php unset($_SESSION['sucesso']); ?>

        <?php endif; ?>

        <?php if(isset($_SESSION['erro'])): ?>

            <div class="p-4 rounded-lg bg-red-100 border border-red-300 text-red-700">
                <?= $_SESSION['erro']; ?>
            </div>

            <?php unset($_SESSION['erro']); ?>

        <?php endif; ?>

        <!-- Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

            <!-- Operacional -->
            <div class="bg-white p-6 rounded-xl border shadow-sm border-l-4 border-l-gray-500">

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-sm text-gray-500">
                            Total de funcionários
                        </p>

                        <h3 class="text-4xl font-bold text-primary mt-1">
                            <?= $total; ?>
                        </h3>
                    </div>

                    <div class="w-12 h-12 bg-gray-50 rounded-lg flex items-center justify-center text-gray-600">
                        <span class="material-symbols-outlined text-3xl">
                            groups
                        </span>
                    </div>

                </div>

            </div>

            <!-- Alerta -->
            <div class="bg-white p-6 rounded-xl border shadow-sm border-l-4 border-l-green-500">

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-sm text-gray-500">
                            Técnicos Disponíveis
                        </p>

                        <h3 class="text-4xl font-bold text-primary mt-1">
                            <?= $tecnico; ?>
                        </h3>
                    </div>

                    <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center text-green-600">
                        <span class="material-symbols-outlined text-3xl">
                            engineering
                        </span>
                    </div>

                </div>

            </div>

        </div>

        <!-- Lista -->
        <div class="bg-white rounded-xl border shadow-sm overflow-hidden">

            <div class="p-6 border-b">

                <div class="flex items-center justify-between">

                    <h3 class="text-xl font-bold text-primary">
                        Lista de Equipamentos
                    </h3>

                </div>

            </div>

            <div class="w-full overflow-x-auto">

                <?php if(empty($usuarios)): ?>

                    <div class="p-10 text-center text-gray-500">
                        Nenhum usuário cadastrado.
                    </div>

                <?php else: ?>

                    <table class="w-full min-w-[800px] text-left border-collapse">

                        <thead>

                            <tr class="bg-gray-50 border-b">

                                <th class="px-6 py-4 text-xs font-bold uppercase">
                                    ID
                                </th>

                                <th class="px-6 py-4 text-xs font-bold uppercase">
                                    Nome
                                </th>

                                <th class="px-6 py-4 text-xs font-bold uppercase">
                                    Email
                                </th>

                                <th class="px-6 py-4 text-xs font-bold uppercase">
                                    Cargo
                                </th>

                                <th class="px-6 py-4 text-xs font-bold uppercase">
                                    Telefone
                                </th>

                                <th class="px-6 py-4 text-xs font-bold uppercase text-right">
                                    Detalhes
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php foreach($usuarios as $usuario): ?>

                                <?php
                                    $cargo = strtolower($usuario->getCargo());

                                    $classeStatus = match($cargo)
                                    {
                                        'tecnico'      => 'cargo-tecnico',
                                        default       => 'cargo-total'
                                    };

                                ?>

                                <tr class="hover:bg-gray-50 transition-colors border-b">

                                    <!-- ID -->
                                    <td class="px-6 py-4">
                                        <?= $usuario->getId(); ?>
                                    </td>

                                    <!-- Nome -->
                                    <td class="px-6 py-4 font-semibold">
                                        <?= $usuario->getNome(); ?>
                                    </td>

                                    <!-- Tipo -->
                                    <td class="px-6 py-4 text-gray-600">
                                        <?= ucfirst($usuario->getEmail()); ?>
                                    </td>

                                    <!-- Status -->
                                    <td class="px-6 py-4">

                                        <span class="status-badge <?= $classeStatus; ?>">

                                            <?= ucfirst($cargo); ?>

                                        </span>

                                    </td>

                                    <td class="px-6 py-4 text-gray-600">
                                        <?= ucfirst($usuario->getTelefone()); ?>
                                    </td>

                                    <!-- Detalhes -->
                                    <td class="px-6 py-4 text-right">

                                        <a href="index.php?acao=detalhes-funcionario&id=<?= $usuario->getId(); ?>">

                                            <button class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg hover:bg-gray-100 text-secondary font-semibold transition-all">

                                                Ver Detalhes

                                            </button>

                                        </a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                <?php endif; ?>

            </div>

        </div>

    </main>

</div>

</body>
</html>