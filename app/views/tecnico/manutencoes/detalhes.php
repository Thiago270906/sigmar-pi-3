<?php

require_once __DIR__ . '/../../../models/OrdemManutencao.php';

/** @var OrdemManutencao $ordem */

?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="./assets/img/logo-icone.png">
<title>SIGMAR - Detalhes da Manutenção</title>
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
    <main class="flex-1 p-4 md:p-8 space-y-8 overflow-y-auto">

        <!-- HEADER -->

        <div>

            <h2 class="text-4xl font-bold text-primary">

                Detalhes da Manutenção

            </h2>

            <p class="text-on-surface-variant">

                Visualize as informações completas da ordem.

            </p>

        </div>


        <!-- GRID -->

        <div class="grid grid-cols-12 gap-6">

            <div class="col-span-12 lg:col-span-8 space-y-6">


                <!-- ORDEM -->

                <section class="bg-white rounded-xl border shadow-sm p-6">

                    <div class="flex items-center gap-3 mb-8">

                        <div class="w-10 h-10 rounded-lg bg-primary-container flex items-center justify-center">

                            <span class="material-symbols-outlined text-white">

                                description

                            </span>

                        </div>

                        <h3 class="text-xl font-bold text-primary">

                            Informações da Ordem

                        </h3>

                    </div>


                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        <div>

                            <p class="text-xs font-bold uppercase text-gray-500">

                                ID

                            </p>

                            <p>

                                <?= $ordem->getId(); ?>

                            </p>

                        </div>


                        <div>

                            <p class="text-xs font-bold uppercase text-gray-500">

                                Ocorrência

                            </p>

                            <p>

                                <?= htmlspecialchars($ordem->getTitulo()); ?>

                            </p>

                        </div>


                        <div>

                            <p class="text-xs font-bold uppercase text-gray-500">

                                Tipo

                            </p>

                            <p>

                                <?= ucfirst(
                                    htmlspecialchars(
                                        $ordem->getTipo()
                                    )
                                ); ?>

                            </p>

                        </div>


                        <div>

                            <p class="text-xs font-bold uppercase text-gray-500">

                                Prioridade

                            </p>

                            <p>

                                <?= ucfirst(
                                    htmlspecialchars(
                                        $ordem->getPrioridade()
                                    )
                                ); ?>

                            </p>

                        </div>


                        <div>

                            <p class="text-xs font-bold uppercase text-gray-500">

                                Status

                            </p>

                            <p>

                                <?= ucfirst(
                                    htmlspecialchars(
                                        $ordem->getStatus()
                                    )
                                ); ?>

                            </p>

                        </div>


                        <div>

                            <p class="text-xs font-bold uppercase text-gray-500">

                                Data Agendada

                            </p>

                            <p>

                                <?= $ordem->getDataAgendada(); ?>

                            </p>

                        </div>


                        <div class="md:col-span-2">

                            <p class="text-xs font-bold uppercase text-gray-500">

                                Descrição

                            </p>

                            <p>

                                <?= $ordem->getDescricao()
                                    ? htmlspecialchars($ordem->getDescricao())
                                    : "Não informado"; ?>

                            </p>

                        </div>

                    </div>

                </section>


                <!-- MAQUINA -->

                <section class="bg-white rounded-xl border shadow-sm p-6">

                    <div class="flex items-center gap-3 mb-8">

                        <div class="w-10 h-10 rounded-lg bg-primary-container flex items-center justify-center">

                            <span class="material-symbols-outlined text-white">

                                precision_manufacturing

                            </span>

                        </div>

                        <h3 class="text-xl font-bold text-primary">

                            Informações da Máquina

                        </h3>

                    </div>


                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        <div>

                            <p class="text-xs font-bold uppercase text-gray-500">

                                Máquina

                            </p>

                            <p>

                                <?= htmlspecialchars(
                                    $ordem->getNomeMaquina()
                                ); ?>

                            </p>

                        </div>


                        <div>

                            <p class="text-xs font-bold uppercase text-gray-500">

                                Tipo

                            </p>

                            <p>

                                <?= htmlspecialchars(
                                    $ordem->getTipoMaquina()
                                ); ?>

                            </p>

                        </div>


                        <div>

                            <p class="text-xs font-bold uppercase text-gray-500">

                                Status Máquina

                            </p>

                            <p>

                                <?= htmlspecialchars(
                                    $ordem->getStatusMaquina()
                                ); ?>

                            </p>

                        </div>


                        <div>

                            <p class="text-xs font-bold uppercase text-gray-500">

                                Técnico

                            </p>

                            <p>

                                <?= htmlspecialchars(
                                    $ordem->getNomeTecnico()
                                ); ?>

                            </p>

                        </div>

                    </div>

                </section>



                <!-- AÇÕES -->

                <div class="flex justify-end gap-4">

                    <a
                        href="index.php?acao=manutencoes"
                        class="px-6 py-2.5 font-medium text-on-surface-variant hover:text-primary transition"
                    >

                        Voltar

                    </a>


                    <?php

                    $status =
                        strtolower(
                            trim(
                                $ordem->getStatus()
                            )
                        );

                    ?>

                    <?php if($status === 'agendada' || $status === 'pendente'): ?>

                        <form
                            method="POST"
                            action="index.php?acao=iniciar-manutencao&id=<?= $ordem->getId(); ?>"
                        >

                            <button
                                class="px-8 py-2.5 bg-primary text-white rounded-lg font-bold hover:opacity-90 transition"
                            >

                                Iniciar Manutenção

                            </button>

                        </form>

                    <?php elseif($status === 'em_andamento'): ?>

                        <form
                            method="POST"
                            action="index.php?acao=finalizar-manutencao&id=<?= $ordem->getId(); ?>"
                        >

                            <button
                                class="px-8 py-2.5 bg-primary text-white rounded-lg font-bold hover:opacity-90 transition"
                            >

                                Finalizar Manutenção

                            </button>

                        </form>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </main>
        </div>

</body>
</html>