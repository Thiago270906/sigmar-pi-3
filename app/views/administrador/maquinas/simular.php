<?php

require_once __DIR__ . '/../../../models/Maquina.php';

/** @var Maquina $maquina */

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8" />

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    />

    <title>SIGMAR - Simular Leituras</title>

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

                        primary:"#001836",
                        secondary:"#005eb3",
                        background:"#f8f9fa",
                        outline:"#737780",
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

        .form-card{

            background:#fff;
            border:1px solid #DEE2E6;
            box-shadow:0 2px 4px rgba(0,0,0,.04);

        }

    </style>

</head>

<body class="bg-background min-h-screen flex flex-col lg:flex-row">

<!-- SIDEBAR -->

<aside class="w-full lg:w-[260px] bg-primary lg:h-screen lg:sticky top-0 flex flex-col py-4 lg:py-8">

    <div class="px-6 mb-12">

        <div class="flex justify-center">

            <img
                src="./assets/img/logo-sigmar.png"
                class="w-36"
            >

        </div>

    </div>

    <nav class="flex-1 px-3 space-y-2">

        <a
            href="index.php?acao=dashboard"
            class="text-white/70 hover:bg-white/10 rounded-lg px-4 py-3 flex gap-4 transition-all"
        >

            <span class="material-symbols-outlined">

                home

            </span>

            Dashboard

        </a>

        <a
            href="index.php?acao=maquinas"
            class="bg-secondary text-white rounded-lg px-4 py-3 flex gap-4"
        >

            <span
                class="material-symbols-outlined"
                style="font-variation-settings:'FILL'1"
            >

                precision_manufacturing

            </span>

            Máquinas

        </a>

        <a
            href="index.php?acao=manutencoes"
            class="text-white/70 hover:bg-white/10 rounded-lg px-4 py-3 flex gap-4 transition-all"
        >

            <span class="material-symbols-outlined">

                description

            </span>

            Manutenções

        </a>

        <a
            href="index.php?acao=funcionarios"
            class="text-white/70 hover:bg-white/10 rounded-lg px-4 py-3 flex gap-4 transition-all"
        >

            <span class="material-symbols-outlined">

                group

            </span>

            Funcionários

        </a>

    </nav>

    <div class="mt-auto px-3 border-t border-white/10 pt-4">

        <a
            href="index.php?acao=logout"
            class="text-white/70 px-4 py-3 flex gap-4"
        >

            <span class="material-symbols-outlined">

                logout

            </span>

            Sair

        </a>

    </div>

</aside>

<!-- CONTEÚDO -->

<main class="flex-1 p-4 md:p-8 space-y-8 overflow-y-auto">

    <!-- HEADER -->

    <div>

        <h2 class="text-4xl font-bold text-primary">

            Simular Leituras

        </h2>

        <p class="text-on-surface-variant mt-2">

            Simule os valores atuais dos sensores da máquina.

        </p>

    </div>

    <!-- FORM -->

    <form
        method="POST"
        action="index.php?acao=simular-leituras"
        class="space-y-6"
    >

        <!-- CARD -->

        <div class="form-card rounded-xl p-6">

            <h3 class="text-xl font-semibold text-primary mb-6 flex items-center gap-2">

                <span class="material-symbols-outlined text-secondary">

                    sensors

                </span>

                Sensores da Máquina

            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- SENSOR TEMPERATURA -->

                <?php if($maquina->getSensorTemperatura()): ?>

                    <?php $sensor = $maquina->getSensorTemperatura(); ?>

                    <div class="border border-outline-variant rounded-xl p-5 space-y-4">

                        <div class="flex items-center gap-3">

                            <div class="w-10 h-10 rounded-lg bg-primary-container flex items-center justify-center">

                                <span class="material-symbols-outlined text-white">

                                    device_thermostat

                                </span>

                            </div>

                            <div>

                                <h4 class="font-semibold text-primary">

                                    Sensor Temperatura

                                </h4>

                                <p class="text-sm text-on-surface-variant">

                                    <?= htmlspecialchars($sensor->getModelo()); ?>

                                </p>

                            </div>

                        </div>

                        <div>

                            <p class="text-sm text-on-surface-variant">

                                Valor Atual

                            </p>

                            <p class="text-2xl font-bold text-primary">

                                <?= $sensor->getValorAtual(); ?>
                                <?= $sensor->getUnidade(); ?>

                            </p>

                        </div>

                        <input
                            type="hidden"
                            name="sensores[<?= $sensor->getId(); ?>][id]"
                            value="<?= $sensor->getId(); ?>"
                        >

                        <div class="space-y-2">

                            <label class="text-sm font-semibold">

                                Novo Valor

                            </label>

                            <input
                                type="number"
                                step="0.01"
                                name="sensores[<?= $sensor->getId(); ?>][valor]"
                                placeholder="Digite o novo valor"
                                class="w-full rounded-lg border-outline-variant focus:border-secondary focus:ring-secondary"
                            >

                        </div>

                    </div>

                <?php endif; ?>

                <!-- SENSOR VIBRAÇÃO -->

                <?php if($maquina->getSensorVibracao()): ?>

                    <?php $sensor = $maquina->getSensorVibracao(); ?>

                    <div class="border border-outline-variant rounded-xl p-5 space-y-4">

                        <div class="flex items-center gap-3">

                            <div class="w-10 h-10 rounded-lg bg-primary-container flex items-center justify-center">

                                <span class="material-symbols-outlined text-white">

                                    vibration

                                </span>

                            </div>

                            <div>

                                <h4 class="font-semibold text-primary">

                                    Sensor Vibração

                                </h4>

                                <p class="text-sm text-on-surface-variant">

                                    <?= htmlspecialchars($sensor->getModelo()); ?>

                                </p>

                            </div>

                        </div>

                        <div>

                            <p class="text-sm text-on-surface-variant">

                                Valor Atual

                            </p>

                            <p class="text-2xl font-bold text-primary">

                                <?= $sensor->getValorAtual(); ?>
                                <?= $sensor->getUnidade(); ?>

                            </p>

                        </div>

                        <input
                            type="hidden"
                            name="sensores[<?= $sensor->getId(); ?>][id]"
                            value="<?= $sensor->getId(); ?>"
                        >

                        <div class="space-y-2">

                            <label class="text-sm font-semibold">

                                Novo Valor

                            </label>

                            <input
                                type="number"
                                step="0.01"
                                name="sensores[<?= $sensor->getId(); ?>][valor]"
                                placeholder="Digite o novo valor"
                                class="w-full rounded-lg border-outline-variant focus:border-secondary focus:ring-secondary"
                            >

                        </div>

                    </div>

                <?php endif; ?>

            </div>

        </div>

        <!-- BOTÕES -->

        <div class="flex justify-end gap-4 pt-2">

            <a
                href="index.php?acao=detalhes-maquina&id=<?= $maquina->getId(); ?>"
                class="px-6 py-2.5 rounded-lg hover:bg-surface-container-high transition-all"
            >

                Cancelar

            </a>

            <button
                type="submit"
                class="px-8 py-2.5 bg-secondary text-white rounded-lg font-bold shadow-md hover:opacity-90 transition-all flex items-center gap-2"
            >

                <span class="material-symbols-outlined">

                    play_arrow

                </span>

                Simular Leituras

            </button>

        </div>

    </form>

</main>

</body>
</html>