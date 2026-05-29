<?php

require_once __DIR__ . '/../../../models/Maquina.php';

/** @var Maquina $maquina */
/** @var array $sensoresExistentes */

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SIGMAR - Editar Máquina</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <script src="assets/js/cep.js"></script>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet"
    />

    <script>

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

            font-variation-settings:
            'FILL' 0,
            'wght' 400,
            'GRAD' 0,
            'opsz' 24;

            display: inline-block;
            line-height: 1;

        }

        .form-card {

            background: #fff;
            border: 1px solid #dee2e6;
            box-shadow: 0 2px 4px rgba(0,0,0,.04);

        }

    </style>

</head>

<body class="bg-background text-on-background font-body-main antialiased min-h-screen flex flex-col lg:flex-row">

<!-- SIDEBAR -->

<aside class="w-full lg:w-[260px] bg-primary lg:h-screen lg:sticky top-0 flex flex-col py-4 lg:py-8 flex-shrink-0">

    <!-- Logo -->

    <div class="px-6 mb-12">

        <div class="flex flex-col items-center">

            <img
                src="./assets/img/logo-sigmar.png"
                alt="Logo SIGMAR"
                class="w-36 h-auto mb-2"
            >

        </div>

    </div>

    <!-- MENU -->

    <nav class="flex-1 px-3 space-y-2">

        <a
            href="index.php?acao=dashboard"
            class="text-white/70 hover:bg-white/10 hover:text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all"
        >

            <span class="material-symbols-outlined">

                home

            </span>

            <span class="font-medium text-sm">

                Dashboard

            </span>

        </a>

        <a
            href="index.php?acao=maquinas"
            class="bg-secondary text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all"
        >

            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">

                settings_input_component

            </span>

            <span class="font-medium text-sm">

                Máquinas

            </span>

        </a>

        <a
            href="index.php?acao=manutencoes"
            class="text-white/70 hover:bg-white/10 hover:text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all"
        >

            <span class="material-symbols-outlined">

                description

            </span>

            <span class="font-medium text-sm">

                Manutenções

            </span>

        </a>

        <a
            href="index.php?acao=funcionarios"
            class="text-white/70 hover:bg-white/10 hover:text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all"
        >

            <span class="material-symbols-outlined">

                group

            </span>

            <span class="font-medium text-sm">

                Funcionários

            </span>

        </a>

    </nav>

    <!-- LOGOUT -->

    <div class="mt-auto px-3 border-t border-white/10 pt-4">

        <a
            href="index.php?acao=logout"
            class="text-white/70 hover:text-white px-4 py-3 flex items-center gap-4 transition-all"
        >

            <span class="material-symbols-outlined">

                logout

            </span>

            <span class="font-medium text-sm">

                Sair

            </span>

        </a>

    </div>

</aside>

<!-- CONTEÚDO -->

<div class="flex-1 flex flex-col min-w-0 bg-white">

<main class="flex-1 p-4 md:p-8 space-y-8 overflow-y-auto">

    <!-- HEADER -->

    <div>

        <h2 class="font-h1-display text-h1-display text-primary">

            Editar Máquina

        </h2>

        <p class="text-body-main text-on-surface-variant mt-1">

            Atualize as informações técnicas e sensores da máquina.

        </p>

    </div>

    <!-- FEEDBACK -->

    <?php if(isset($_SESSION['erro'])): ?>

        <div class="px-4 py-3 rounded-lg bg-error-container text-on-error-container font-medium text-body-main">

            <?= $_SESSION['erro']; ?>

        </div>

        <?php unset($_SESSION['erro']); ?>

    <?php endif; ?>

    <?php if(isset($_SESSION['sucesso'])): ?>

        <div class="px-4 py-3 rounded-lg bg-green-100 text-green-700 font-medium text-body-main">

            <?= $_SESSION['sucesso']; ?>

        </div>

        <?php unset($_SESSION['sucesso']); ?>

    <?php endif; ?>

    <!-- FORM -->

    <form action="index.php?acao=editar-maquina" method="POST" class="space-y-8">

        <input
            type="hidden"
            name="id_maquina"
            value="<?= $maquina->getId(); ?>"
        >

        <!-- CARD DADOS -->

        <div class="form-card rounded-xl p-6">

            <h3 class="font-h2-subtitle text-h2-subtitle text-primary mb-6 flex items-center gap-2">

                <span class="material-symbols-outlined text-secondary">

                    settings_input_component

                </span>

                Identificação Técnica

            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- NOME -->

                <div class="space-y-2">

                    <label class="text-label-sm font-label-sm text-on-surface-variant">

                        Nome do Equipamento

                    </label>

                    <input
                        type="text"
                        name="nome"
                        required
                        value="<?= htmlspecialchars($maquina->getNome()); ?>"
                        class="w-full rounded-lg border-outline-variant focus:border-secondary focus:ring-1 focus:ring-secondary py-2.5 text-body-main"
                    >

                </div>

                <!-- TIPO -->

                <div class="space-y-2">

                    <label class="text-label-sm font-label-sm text-on-surface-variant">

                        Tipo

                    </label>

                    <input
                        type="text"
                        name="tipo"
                        required
                        value="<?= htmlspecialchars($maquina->getTipo()); ?>"
                        class="w-full rounded-lg border-outline-variant focus:border-secondary focus:ring-1 focus:ring-secondary py-2.5 text-body-main"
                    >

                </div>

                <!-- STATUS -->

                <div class="space-y-2">

                    <label class="text-label-sm font-label-sm text-on-surface-variant">

                        Status Atual

                    </label>

                    <div class="px-4 py-3 rounded-lg bg-surface-container-low border border-outline-variant text-on-surface font-medium">

                        <?= htmlspecialchars($maquina->getStatus()); ?>

                    </div>

                </div>

            </div>

        </div>

        <!-- SENSORES -->

        <div class="form-card rounded-xl p-6">

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

                <div>

                    <h3 class="font-h2-subtitle text-h2-subtitle text-primary flex items-center gap-2">

                        <span class="material-symbols-outlined text-secondary">

                            sensors

                        </span>

                        Sensores Atuais

                    </h3>

                    <p class="text-sm text-on-surface-variant mt-1">

                        Gerencie os sensores vinculados à máquina.

                    </p>

                </div>

            </div>

            <!-- LISTA SENSORES -->

            <?php if(!empty($sensoresExistentes)): ?>

                <div class="space-y-4">

                    <?php foreach($sensoresExistentes as $sensor): ?>

                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 p-5 border border-outline-variant rounded-xl bg-surface-container-low hover:bg-surface-container-high transition-all">

                            <div class="space-y-1">

                                <h4 class="font-semibold text-primary">

                                    <?= htmlspecialchars($sensor->getModelo()); ?>

                                </h4>

                                <p class="text-sm text-on-surface-variant">

                                    <?= htmlspecialchars($sensor->getTipo()); ?>

                                </p>

                            </div>

                            <a
                                href="index.php?acao=trocar-sensor&id_sensor=<?= $sensor->getId(); ?>&id_maquina=<?= $maquina->getId(); ?>"
                                class="inline-flex items-center gap-2 px-5 py-2.5 bg-secondary text-white rounded-lg font-medium hover:opacity-90 transition-all"
                            >

                                <span class="material-symbols-outlined text-base">

                                    sync_alt

                                </span>

                                Trocar Sensor

                            </a>

                        </div>

                    <?php endforeach; ?>

                </div>

            <?php else: ?>

                <!-- VAZIO -->

                <div class="border border-dashed border-outline-variant rounded-xl p-10 text-center">

                    <span class="material-symbols-outlined text-5xl text-on-surface-variant mb-3">

                        sensors_off

                    </span>

                    <h4 class="text-lg font-semibold text-primary mb-2">

                        Nenhum sensor ativo encontrado

                    </h4>

                    <p class="text-on-surface-variant">

                        Esta máquina ainda não possui sensores associados.

                    </p>

                </div>

            <?php endif; ?>

            <!-- TROCAS PENDENTES -->

            <?php if(isset($_SESSION['sensores_troca']) && count($_SESSION['sensores_troca']) > 0): ?>

                <div class="mt-8">

                    <h4 class="text-lg font-semibold text-primary mb-4">

                        Trocas Pendentes

                    </h4>

                    <div class="space-y-4">

                        <?php foreach($_SESSION['sensores_troca'] as $item): ?>

                            <div class="p-5 rounded-xl border border-yellow-300 bg-yellow-50">

                                <div class="flex items-start gap-3">

                                    <span class="material-symbols-outlined text-yellow-600">

                                        pending_actions

                                    </span>

                                    <div>

                                        <h5 class="font-semibold text-yellow-800">

                                            Novo Sensor:
                                            <?= htmlspecialchars($item['novo']['modelo']); ?>

                                        </h5>

                                        <p class="text-sm text-yellow-700">

                                            Tipo:
                                            <?= htmlspecialchars($item['novo']['tipo']); ?>

                                        </p>

                                        <p class="text-sm text-yellow-700 mt-1">

                                            Substituindo sensor ID:
                                            <?= $item['antigo_id']; ?>

                                        </p>

                                    </div>

                                </div>

                            </div>

                        <?php endforeach; ?>

                    </div>

                </div>

            <?php endif; ?>

        </div>

        <!-- FOOTER -->

        <div class="flex justify-end items-center gap-4 pt-2">

            <a
                href="index.php?acao=maquinas"
                class="px-6 py-2.5 rounded-lg font-medium text-body-main text-on-surface-variant hover:bg-surface-container-high transition-colors"
            >

                Cancelar

            </a>

            <button
                type="submit"
                class="px-8 py-2.5 bg-secondary text-on-secondary rounded-lg font-bold text-body-main shadow-md hover:opacity-90 active:scale-95 transition-all flex items-center gap-2"
            >

                <span class="material-symbols-outlined text-lg">

                    save

                </span>

                Salvar Alterações

            </button>

        </div>

    </form>

</main>

</div>

</body>
</html>