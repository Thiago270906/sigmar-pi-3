<?php
require_once __DIR__ . '/../../../models/OrdemManutencao.php';

/** @var OrdemManutencao $ordem */
/** @var array $usuarios */
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/img/logo-icone.png">

    <title>SIGMAR - Editar Ordem de Manutenção</title>

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
                        "on-surface-variant":"#43474f"

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
            border:1px solid #dee2e6;
            box-shadow:0 2px 4px rgba(0,0,0,.04);

        }

    </style>

</head>

<body class="bg-background min-h-screen flex flex-col lg:flex-row">

<!-- SIDEBAR -->

<aside class="w-full lg:w-[260px] bg-primary lg:h-screen lg:sticky top-0 flex flex-col py-4 lg:py-8 flex-shrink-0">

    <!-- Logo -->
    <div class="px-6 mb-12">

        <div class="flex flex-col items-center">

            <img
                src="./assets/img/logo-sigmar.png"
                alt="Logo SIGMAR"
                class="w-36 h-auto mb-2"
            />

        </div>

    </div>

    <!-- Navegação -->

    <nav class="flex-1 px-3 space-y-2">

        <a href="index.php?acao=dashboard"
           class="text-white/70 hover:bg-white/10 hover:text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all">

            <span class="material-symbols-outlined">

                home

            </span>

            <span class="font-medium text-sm">

                Dashboard

            </span>

        </a>

        <a href="index.php?acao=maquinas"
           class="text-white/70 hover:bg-white/10 hover:text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all">

            <span class="material-symbols-outlined">

                settings_input_component

            </span>

            <span class="font-medium text-sm">

                Máquinas

            </span>

        </a>

        <a href="index.php?acao=manutencoes"
           class="bg-secondary text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all">

            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">

                description

            </span>

            <span class="font-medium text-sm">

                Manutenções

            </span>

        </a>

        <a href="index.php?acao=funcionarios"
           class="text-white/70 hover:bg-white/10 hover:text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all">

            <span class="material-symbols-outlined">

                group

            </span>

            <span class="font-medium text-sm">

                Funcionários

            </span>

        </a>

    </nav>

    <!-- Logout -->

    <div class="mt-auto px-3 border-t border-white/10 pt-4">

        <a href="index.php?acao=logout"
           class="text-white/70 hover:text-white px-4 py-3 flex items-center gap-4 transition-all">

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

<main class="flex-1 p-4 md:p-8 space-y-8">

    <!-- HEADER -->

    <div>

        <h1 class="text-4xl font-bold text-primary">

            Editar Ordem de Manutenção

        </h1>

        <p class="text-on-surface-variant mt-2">

            Atualize as informações da ordem de manutenção.

        </p>

    </div>

    <!-- ERRO -->

    <?php if(isset($_SESSION['erro'])): ?>

        <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg">

            <?= $_SESSION['erro']; ?>

        </div>

        <?php unset($_SESSION['erro']); ?>

    <?php endif; ?>

    <!-- FORM -->

    <form
        action="index.php?acao=editar-ordem"
        method="POST"
        class="space-y-6"
    >

        <input
            type="hidden"
            name="id_ordem"
            value="<?= $ordem->getId(); ?>"
        >

        <div class="form-card rounded-xl p-6">

            <h2 class="text-xl font-semibold text-primary mb-6 flex items-center gap-2">

                <span class="material-symbols-outlined text-secondary">

                    edit_document

                </span>

                Informações da Ordem

            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- TÍTULO -->

                <div>

                    <label class="text-sm font-semibold">

                        Título da Ordem

                    </label>

                    <input
                        type="text"
                        name="titulo"
                        required
                        value="<?= htmlspecialchars($ordem->getTitulo()); ?>"
                        class="w-full mt-2 rounded-lg border border-outline-variant"
                    >

                </div>

                <!-- TIPO -->

                <div>

                    <label class="text-sm font-semibold">

                        Tipo da Manutenção

                    </label>

                    <select
                        name="tipo"
                        required
                        class="w-full mt-2 rounded-lg border border-outline-variant"
                    >

                        <option value="preventiva" <?= $ordem->getTipo() === 'preventiva' ? 'selected' : ''; ?>>

                            Preventiva

                        </option>

                        <option value="corretiva" <?= $ordem->getTipo() === 'corretiva' ? 'selected' : ''; ?>>

                            Corretiva

                        </option>

                        <option value="preditiva" <?= $ordem->getTipo() === 'preditiva' ? 'selected' : ''; ?>>

                            Preditiva

                        </option>

                    </select>

                </div>

                <!-- PRIORIDADE -->

                <div>

                    <label class="text-sm font-semibold">

                        Prioridade

                    </label>

                    <select
                        name="prioridade"
                        required
                        class="w-full mt-2 rounded-lg border border-outline-variant"
                    >

                        <option value="baixa" <?= $ordem->getPrioridade() === 'baixa' ? 'selected' : ''; ?>>

                            Baixa

                        </option>

                        <option value="media" <?= $ordem->getPrioridade() === 'media' ? 'selected' : ''; ?>>

                            Média

                        </option>

                        <option value="alta" <?= $ordem->getPrioridade() === 'alta' ? 'selected' : ''; ?>>

                            Alta

                        </option>

                        <option value="urgente" <?= $ordem->getPrioridade() === 'urgente' ? 'selected' : ''; ?>>

                            Urgente

                        </option>

                    </select>

                </div>

                <!-- DATA -->

                <div>

                    <label class="text-sm font-semibold">

                        Data Agendada

                    </label>

                    <input
                        type="date"
                        name="data_agendada"
                        required
                        value="<?= $ordem->getDataAgendada(); ?>"
                        class="w-full mt-2 rounded-lg border border-outline-variant"
                    >

                </div>

                <!-- MÁQUINA -->

                <div>

                    <label class="text-sm font-semibold">

                        Máquina

                    </label>

                    <input
                        type="text"
                        readonly
                        value="<?= htmlspecialchars($ordem->getNomeMaquina() ?? 'Máquina ID: ' . $ordem->getIdMaquina()); ?>"
                        class="w-full mt-2 rounded-lg border border-outline-variant bg-gray-100 text-gray-600 cursor-not-allowed"
                    >

                    <input
                        type="hidden"
                        name="id_maquina"
                        value="<?= $ordem->getIdMaquina(); ?>"
                    >

                </div>

                <!-- TÉCNICO -->

                <div>

                    <label class="text-sm font-semibold">

                        Técnico Responsável

                    </label>

                    <select
                        name="id_usuario"
                        required
                        class="w-full mt-2 rounded-lg border border-outline-variant"
                    >

                        <option value="">

                            Selecione o técnico

                        </option>

                        <?php foreach($usuarios as $u): ?>

                            <option
                                value="<?= $u->getId(); ?>"
                                <?= $u->getId() == $ordem->getIdUsuario() ? 'selected' : ''; ?>
                            >

                                <?= $u->getId() . " # " . htmlspecialchars($u->getNome()); ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <!-- DESCRIÇÃO -->

                <div class="md:col-span-2">

                    <label class="text-sm font-semibold">

                        Descrição da Ordem

                    </label>

                    <textarea
                        name="descricao"
                        required
                        rows="5"
                        class="w-full mt-2 rounded-lg border border-outline-variant"
                    ><?= htmlspecialchars($ordem->getDescricao()); ?></textarea>

                </div>

            </div>

        </div>

        <!-- BOTÕES -->

        <div class="flex gap-4">

            <a
                href="index.php?acao=manutencoes"
                class="px-6 py-2 rounded-lg hover:bg-surface-container-high transition-all"
            >

                Cancelar

            </a>

            <button
                type="submit"
                class="px-8 py-2 bg-secondary hover:opacity-90 text-white rounded-lg font-bold flex items-center gap-2 transition-all"
            >

                <span class="material-symbols-outlined">

                    save

                </span>

                Salvar Alterações

            </button>

        </div>

    </form>

</main>

</body>
</html>