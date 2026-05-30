<!-- views/administrador/manutencoes/index.php -->

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="./assets/img/logo-icone.png">
<title>SIGMAR - Manutenção</title>
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
               class="text-white/70 hover:bg-white/10 hover:text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all">
                <span class="material-symbols-outlined">home</span>
                <span class="font-medium text-sm">Dashboard</span>
            </a>
            
            <!-- Link: Manutenções -->
            <a href="index.php?acao=manutencoes"
               class="bg-secondary text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">description</span>
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

    <?php
    /** @var array $ordens */

    $pendentes = 0;
    $andamento = 0;

    foreach($ordens as $ordem)
    {
        $status = strtolower(
            trim(
                $ordem->getStatus()
            )
        );

        switch($status)
        {
            case 'pendente':

                $pendentes++;

            break;

            case 'em_andamento':
            case 'em andamento':

                $andamento++;

            break;
        }
    }

    ?>

    <!-- HEADER -->

    <div>

        <h2 class="text-4xl font-bold text-primary">

            Minhas Manutenções

        </h2>

        <p class="text-on-surface-variant mt-2">

            Consulte e acompanhe suas ordens de manutenção atribuídas.

        </p>

    </div>


    <!-- FEEDBACK -->

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


    <!-- CARDS -->

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

        <!-- PENDENTES -->

        <div class="bg-white p-6 rounded-xl border shadow-sm border-l-4 border-l-yellow-500">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-sm text-gray-500">

                        Pendentes

                    </p>

                    <h3 class="text-4xl font-bold text-primary mt-1">

                        <?= $pendentes ?>

                    </h3>

                </div>

                <div class="w-12 h-12 bg-yellow-50 rounded-lg flex items-center justify-center">

                    <span class="material-symbols-outlined text-yellow-600 text-3xl">

                        warning

                    </span>

                </div>

            </div>

        </div>


        <!-- EM ANDAMENTO -->

        <div class="bg-white p-6 rounded-xl border shadow-sm border-l-4 border-l-blue-500">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-sm text-gray-500">

                        Em andamento

                    </p>

                    <h3 class="text-4xl font-bold text-primary mt-1">

                        <?= $andamento ?>

                    </h3>

                </div>

                <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center">

                    <span class="material-symbols-outlined text-blue-600 text-3xl">

                        engineering

                    </span>

                </div>

            </div>

        </div>

    </div>


    <!-- LISTA -->

    <div class="bg-white rounded-xl border shadow-sm overflow-hidden">

        <!-- HEADER DA TABELA -->

        <div class="p-6 border-b">

            <div class="flex items-center justify-between">

                <h3 class="text-xl font-bold text-primary">

                    Ordens Atribuídas

                </h3>

                <span class="text-sm text-on-surface-variant">

                    Total:
                    <?= count($ordens) ?>

                </span>

            </div>

        </div>


        <?php if(empty($ordens)): ?>

            <div class="p-16 text-center text-gray-500">

                Nenhuma manutenção atribuída.

            </div>

        <?php else: ?>

            <div class="overflow-x-auto">

                <table class="w-full min-w-[900px]">

                    <thead>

                        <tr class="bg-gray-50 border-b">

                            <th class="px-6 py-4 text-xs font-bold uppercase">

                                ID

                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase">

                                Título

                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase">

                                Tipo

                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase">

                                Prioridade

                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase">

                                Status

                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase">

                                Data

                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase">

                                Máquina

                            </th>

                            <th class="px-6 py-4 text-xs font-bold uppercase text-right">

                                Detalhes

                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php foreach($ordens as $ordem): ?>

                            <?php

                            $status =
                                strtolower(
                                    trim(
                                        $ordem->getStatus()
                                    )
                                );

                            $classe =
                                match($status)
                                {
                                    'pendente'
                                        => 'status-pendente',

                                    'em andamento',
                                    'em_andamento'
                                        => 'status-andamento',

                                    default
                                        => 'status-default'
                                };

                            ?>

                            <tr class="hover:bg-gray-50 border-b transition">

                                <td class="px-6 py-4">

                                    <?= $ordem->getId() ?>

                                </td>

                                <td class="px-6 py-4 font-semibold">

                                    <?= $ordem->getTitulo() ?>

                                </td>

                                <td class="px-6 py-4">

                                    <?= ucfirst($ordem->getTipo()) ?>

                                </td>

                                <td class="px-6 py-4">

                                    <?= ucfirst($ordem->getPrioridade()) ?>

                                </td>

                                <td class="px-6 py-4">

                                    <span class="status-badge <?= $classe ?>">

                                        <?= ucfirst($status) ?>

                                    </span>

                                </td>

                                <td class="px-6 py-4">

                                    <?= $ordem->getDataAgendada() ?>

                                </td>

                                <td class="px-6 py-4">

                                    <?= $ordem->getNomeMaquina() ?>

                                </td>

                                <td class="px-6 py-4 text-right">

                                    <a
                                        href="index.php?acao=detalhes-manutencao&id=<?= $ordem->getId() ?>"
                                        class="inline-flex items-center gap-1 px-3 py-2 rounded-lg hover:bg-gray-100 text-secondary font-semibold transition"
                                    >

                                        Ver detalhes

                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        <?php endif; ?>

    </div>

</main>
</body>
</html>