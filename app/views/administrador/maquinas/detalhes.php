<?php

require_once __DIR__ . '/../../../models/Maquina.php';

/** @var Maquina $maquina */

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SIGMAR - Detalhes da Máquina</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet"
    />

    <script>

        tailwind.config = {

            darkMode:"class",

            theme:{

                extend:{

                    colors:{

                        "primary":"#001836",
                        "secondary":"#005eb3",
                        "background":"#f8f9fa",
                        "outline":"#737780",
                        "outline-variant":"#c3c6d0",
                        "surface-container-high":"#e7e8e9",
                        "surface-container-lowest":"#ffffff",
                        "on-surface-variant":"#43474f",
                        "primary-container":"#002d5b",
                        "on-primary":"#ffffff"

                    }

                }

            }

        }

    </script>

    <style>

        body{

            font-family:'Inter',sans-serif;

        }

        .material-symbols-outlined{

            font-variation-settings:
            'FILL'0,
            'wght'400,
            'GRAD'0,
            'opsz'24;

        }

    </style>

</head>

<body class="bg-background min-h-screen flex flex-col lg:flex-row text-gray-800">

<!-- SIDEBAR -->

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
<!-- CONTEÚDO -->

<div class="flex-1 flex flex-col min-w-0">

    <main class="flex-1 p-4 md:p-8 space-y-8 overflow-y-auto">

        <!-- HEADER -->

        <div>

            <h2 class="text-4xl font-bold text-primary">

                Detalhes da Máquina

            </h2>

            <p class="text-on-surface-variant mt-2">

                Visualize as informações completas da máquina e seus sensores.

            </p>

        </div>

        <!-- GRID -->

        <div class="grid grid-cols-12 gap-4">

            <div class="col-span-12 lg:col-span-8 space-y-6">

                <!-- INFORMAÇÕES DA MÁQUINA -->

                <section class="bg-surface-container-lowest rounded-xl border border-outline-variant/40 shadow-sm p-6">

                    <div class="flex items-center gap-3 mb-8">

                        <div class="w-10 h-10 rounded-lg bg-primary-container flex items-center justify-center">

                            <span class="material-symbols-outlined text-white">

                                precision_manufacturing

                            </span>

                        </div>

                        <h3 class="text-xl font-semibold text-primary">

                            Informações da Máquina

                        </h3>

                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>

                            <p class="text-xs uppercase font-bold tracking-wider text-on-surface-variant">

                                ID da Máquina

                            </p>

                            <p class="mt-1">

                                <?= $maquina->getId(); ?>

                            </p>

                        </div>

                        <div>

                            <p class="text-xs uppercase font-bold tracking-wider text-on-surface-variant">

                                Nome

                            </p>

                            <p class="mt-1">

                                <?= htmlspecialchars($maquina->getNome()); ?>

                            </p>

                        </div>

                        <div>

                            <p class="text-xs uppercase font-bold tracking-wider text-on-surface-variant">

                                Tipo

                            </p>

                            <p class="mt-1">

                                <?= htmlspecialchars($maquina->getTipo()); ?>

                            </p>

                        </div>

                        <div>

                            <p class="text-xs uppercase font-bold tracking-wider text-on-surface-variant">

                                Status

                            </p>

                            <p class="mt-1">

                                <?= htmlspecialchars($maquina->getStatus()); ?>

                            </p>

                        </div>

                    </div>

                </section>

                <!-- SENSOR TEMPERATURA -->

                <section class="bg-surface-container-lowest rounded-xl border border-outline-variant/40 shadow-sm p-6">

                    <div class="flex items-center gap-3 mb-8">

                        <div class="w-10 h-10 rounded-lg bg-primary-container flex items-center justify-center">

                            <span class="material-symbols-outlined text-white">

                                device_thermostat

                            </span>

                        </div>

                        <h3 class="text-xl font-semibold text-primary">

                            Sensor de Temperatura

                        </h3>

                    </div>

                    <?php if($maquina->getSensorTemperatura()) : ?>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                            <div>

                                <p class="text-xs uppercase font-bold tracking-wider text-on-surface-variant">

                                    Modelo

                                </p>

                                <p class="mt-1">

                                    <?= htmlspecialchars($maquina->getSensorTemperatura()->getModelo()); ?>

                                </p>

                            </div>

                            <div>

                                <p class="text-xs uppercase font-bold tracking-wider text-on-surface-variant">

                                    Limite de Alerta

                                </p>

                                <p class="mt-1">

                                    <?= $maquina->getSensorTemperatura()->getLimiteAlerta(); ?>

                                </p>

                            </div>

                            <div>

                                <p class="text-xs uppercase font-bold tracking-wider text-on-surface-variant">

                                    Limite Crítico

                                </p>

                                <p class="mt-1">

                                    <?= $maquina->getSensorTemperatura()->getLimiteCritico(); ?>

                                </p>

                            </div>

                        </div>

                    <?php else : ?>

                        <p class="text-on-surface-variant">

                            Nenhum sensor de temperatura cadastrado.

                        </p>

                    <?php endif; ?>

                </section>

                <!-- SENSOR VIBRAÇÃO -->

                <section class="bg-surface-container-lowest rounded-xl border border-outline-variant/40 shadow-sm p-6">

                    <div class="flex items-center gap-3 mb-8">

                        <div class="w-10 h-10 rounded-lg bg-primary-container flex items-center justify-center">

                            <span class="material-symbols-outlined text-white">

                                vibration

                            </span>

                        </div>

                        <h3 class="text-xl font-semibold text-primary">

                            Sensor de Vibração

                        </h3>

                    </div>

                    <?php if($maquina->getSensorVibracao()) : ?>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                            <div>

                                <p class="text-xs uppercase font-bold tracking-wider text-on-surface-variant">

                                    Modelo

                                </p>

                                <p class="mt-1">

                                    <?= htmlspecialchars($maquina->getSensorVibracao()->getModelo()); ?>

                                </p>

                            </div>

                            <div>

                                <p class="text-xs uppercase font-bold tracking-wider text-on-surface-variant">

                                    Limite de Alerta

                                </p>

                                <p class="mt-1">

                                    <?= $maquina->getSensorVibracao()->getLimiteAlerta(); ?>

                                </p>

                            </div>

                            <div>

                                <p class="text-xs uppercase font-bold tracking-wider text-on-surface-variant">

                                    Limite Crítico

                                </p>

                                <p class="mt-1">

                                    <?= $maquina->getSensorVibracao()->getLimiteCritico(); ?>

                                </p>

                            </div>

                        </div>

                    <?php else : ?>

                        <p class="text-on-surface-variant">

                            Nenhum sensor de vibração cadastrado.

                        </p>

                    <?php endif; ?>

                </section>

                <!-- BOTÕES -->

                <div class="flex flex-wrap gap-4 pt-2">

                    <a
                        href="index.php?acao=maquinas"
                        class="px-6 py-2 rounded-lg hover:bg-surface-container-high transition-all"
                    >

                        Voltar

                    </a>

                    <a
                        href="index.php?acao=form-simular-maquina&id=<?= $maquina->getId(); ?>"
                        class="px-6 py-2 bg-primary text-white rounded-lg flex items-center gap-2"
                    >

                        <span class="material-symbols-outlined">

                            play_arrow

                        </span>

                        Simular

                    </a>

                    <a
                        href="index.php?acao=form-editar-maquina&id=<?= $maquina->getId(); ?>"
                        class="px-6 py-2 bg-secondary text-white rounded-lg flex items-center gap-2"
                    >

                        <span class="material-symbols-outlined">

                            edit

                        </span>

                        Editar

                    </a>

                </div>

            </div>

        </div>

    </main>

</div>

</body>
</html>