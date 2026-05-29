<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGMAR - Registrar Manutenção</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

    <script>
        tailwind.config = {
            darkMode: "class",
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
                        "on-secondary":"#ffffff",
                        "error-container":"#ffdad6",
                        "on-error-container":"#93000a"
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
            class="text-white/70 hover:bg-white/10 rounded-lg px-4 py-3 flex gap-4"
        >

            <span class="material-symbols-outlined">
                home
            </span>

            Dashboard

        </a>

        <a
            href="index.php?acao=manutencoes"
            class="bg-secondary text-white rounded-lg px-4 py-3 flex gap-4"
        >

            <span class="material-symbols-outlined"
            style="font-variation-settings:'FILL'1">

                description

            </span>

            Manutenções

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

<main class="flex-1 p-4 md:p-8 space-y-8">

    <div>

        <h2 class="text-4xl font-bold text-primary">

            Registrar Manutenção

        </h2>

        <p class="text-on-surface-variant mt-2">

            Preencha as informações da manutenção realizada.

        </p>

    </div>

    <!-- mensagens -->

    <?php if(isset($_SESSION['erro'])): ?>

        <div class="p-4 rounded-lg bg-error-container text-on-error-container">

            <?= $_SESSION['erro']; ?>

        </div>

        <?php unset($_SESSION['erro']); ?>

    <?php endif; ?>

    <?php if(isset($_SESSION['sucesso'])): ?>

        <div class="p-4 rounded-lg bg-green-100 text-green-700">

            <?= $_SESSION['sucesso']; ?>

        </div>

        <?php unset($_SESSION['sucesso']); ?>

    <?php endif; ?>

    <form
        action="index.php?acao=cadastrar-manutencao"
        method="POST"
        class="space-y-6"
    >

        <div class="form-card rounded-xl p-6">

            <h3 class="text-xl font-semibold text-primary mb-6 flex gap-2 items-center">

                <span class="material-symbols-outlined text-secondary">

                    description

                </span>

                Relatório Técnico

            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- DATA INICIO -->

                <div>

                    <label class="text-sm font-semibold">

                        Data de Início

                    </label>

                    <div class="mt-2">

                        <?php if(isset($ordem) && $ordem->getDataInicio()): ?>

                            <?= date(
                                'd/m/Y H:i',
                                strtotime(
                                    $ordem->getDataInicio()
                                )
                            ); ?>

                        <?php else: ?>

                            Não iniciada

                        <?php endif; ?>

                    </div>

                </div>

                <!-- DATA FIM -->

                <div>

                    <label class="text-sm font-semibold">

                        Data de Término

                    </label>

                    <div class="mt-2">

                        <?php if(isset($_SESSION['data_conclusao'])): ?>

                            <?= date(
                                'd/m/Y H:i',
                                strtotime(
                                    $_SESSION['data_conclusao']
                                )
                            ); ?>

                        <?php else: ?>

                            Em aberto

                        <?php endif; ?>

                    </div>

                </div>

                <!-- DESCRIÇÃO -->

                <div>

                    <label class="text-sm font-semibold">

                        Descrição Técnica

                    </label>

                    <textarea
                        name="descricao_servico"
                        required
                        rows="4"
                        class="w-full mt-2 rounded-lg border border-outline-variant"
                        placeholder="Descreva o serviço realizado"
                    ></textarea>

                </div>

                <!-- OBS -->

                <div>

                    <label class="text-sm font-semibold">

                        Observações

                    </label>

                    <textarea
                        name="observacoes"
                        rows="4"
                        class="w-full mt-2 rounded-lg border border-outline-variant"
                        placeholder="Observações adicionais"
                    ></textarea>

                </div>

                <!-- ORDEM -->

                <div>

                    <label class="text-sm font-semibold">

                        Ordem vinculada

                    </label>

                    <?php if(isset($_SESSION['ordem_finalizada'])): ?>

                        <input
                            type="hidden"
                            name="id_ordem"
                            value="<?= $_SESSION['ordem_finalizada']; ?>"
                        >

                        <p class="mt-2">

                            Ordem #<?= $_SESSION['ordem_finalizada']; ?>

                        </p>

                    <?php else: ?>

                        <input
                            type="number"
                            required
                            name="id_ordem"
                            placeholder="ID da Ordem"
                            class="w-full mt-2 rounded-lg border border-outline-variant"
                        >

                    <?php endif; ?>

                </div>

            </div>

        </div>

        <!-- BOTÕES -->

        <div class="flex gap-4">

            <a
                href="index.php?acao=manutencoes"
                class="px-6 py-2 rounded-lg hover:bg-surface-container-high"
            >

                Cancelar

            </a>

            <button
                type="submit"
                class="px-8 py-2 bg-secondary text-white rounded-lg font-bold flex items-center gap-2"
            >

                <span class="material-symbols-outlined">

                    save

                </span>

                Registrar Manutenção

            </button>

        </div>

    </form>

</main>

</body>
</html>