<?php
require_once __DIR__ . '/../../../models/Usuario.php';

/** @var Usuario $usuario */

$end = $usuario->getEndereco();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SIGMAR - Editar Funcionário</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

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

        body {

            font-family: 'Inter', sans-serif;

        }

        .material-symbols-outlined {

            font-variation-settings:
            'FILL' 0,
            'wght' 400,
            'GRAD' 0,
            'opsz' 24;

            display: inline-block;
            line-height: 1;

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
           class="text-white/70 hover:bg-white/10 hover:text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all">

            <span class="material-symbols-outlined">

                description

            </span>

            <span class="font-medium text-sm">

                Manutenções

            </span>

        </a>

        <a href="index.php?acao=funcionarios"
           class="bg-secondary text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all">

            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">

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

<!-- MAIN -->

<div class="flex-1 flex flex-col min-w-0 bg-white">

    <main class="flex-1 p-4 md:p-8 space-y-8 overflow-y-auto">

        <!-- HEADER -->

        <div class="flex items-center gap-3">

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">

                <div>

                    <h2 class="text-4xl font-bold text-primary">

                        Editar Funcionário

                    </h2>

                    <p class="text-body-main text-on-surface-variant">

                        Atualize os dados cadastrais, profissionais e endereço do colaborador.

                    </p>

                </div>

            </div>

        </div>

        <!-- ERRO -->

        <?php if (isset($_SESSION['erro'])): ?>

            <div class="mb-6 px-4 py-3 rounded-lg bg-error-container text-on-error-container font-medium text-body-main">

                <?= htmlspecialchars($_SESSION['erro']); ?>

            </div>

            <?php unset($_SESSION['erro']); ?>

        <?php endif; ?>

        <!-- FORM CARD -->

        <div class="bg-surface-container-lowest rounded-xl border border-outline-variant shadow-[0_2px_4px_rgba(0,0,0,0.04)] overflow-hidden mb-12">

            <form action="index.php?acao=editar-funcionario" method="POST">

                <input
                    type="hidden"
                    name="id_usuario"
                    value="<?= $usuario->getId(); ?>"
                >

                <div class="p-8 space-y-12">

                    <!-- INFORMAÇÕES PESSOAIS -->

                    <section class="flex flex-col md:flex-row gap-8">

                        <div class="w-full md:w-1/3">

                            <h3 class="font-bold text-primary mb-1">

                                Informações Pessoais

                            </h3>

                            <p class="text-caption text-on-surface-variant">

                                Dados básicos de identificação e contato do colaborador.

                            </p>

                        </div>

                        <div class="flex-1 space-y-6">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <!-- NOME -->

                                <div class="space-y-2">

                                    <label
                                        class="block font-label-sm text-on-surface-variant uppercase tracking-wider"
                                        for="nome"
                                    >

                                        Nome Completo

                                    </label>

                                    <input
                                        class="w-full px-4 py-3 bg-surface border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary-container focus:border-transparent outline-none transition-all"
                                        id="nome"
                                        name="nome"
                                        type="text"
                                        value="<?= htmlspecialchars($usuario->getNome()); ?>"
                                        required
                                    />

                                </div>

                                <!-- TELEFONE -->

                                <div class="space-y-2">

                                    <label
                                        class="block font-label-sm text-on-surface-variant uppercase tracking-wider"
                                        for="telefone"
                                    >

                                        Telefone

                                    </label>

                                    <input
                                        class="w-full px-4 py-3 bg-surface border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary-container focus:border-transparent outline-none transition-all"
                                        id="telefone"
                                        name="telefone"
                                        type="tel"
                                        maxlength="11"
                                        value="<?= htmlspecialchars($usuario->getTelefone()); ?>"
                                        required
                                    />

                                </div>

                                <!-- EMAIL -->

                                <div class="space-y-2">

                                    <label
                                        class="block font-label-sm text-on-surface-variant uppercase tracking-wider"
                                        for="email"
                                    >

                                        E-mail

                                    </label>

                                    <input
                                        class="w-full px-4 py-3 bg-surface border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary-container focus:border-transparent outline-none transition-all"
                                        id="email"
                                        name="email"
                                        type="email"
                                        value="<?= htmlspecialchars($usuario->getEmail()); ?>"
                                        required
                                    />

                                </div>

                                <!-- CARGO -->

                                <div class="space-y-2">

                                    <label
                                        class="block font-label-sm text-on-surface-variant uppercase tracking-wider"
                                        for="cargo"
                                    >

                                        Cargo

                                    </label>

                                    <div class="relative">

                                        <select
                                            class="w-full appearance-none px-4 py-3 bg-surface border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary-container focus:border-transparent outline-none transition-all"
                                            id="cargo"
                                            name="cargo"
                                            required
                                        >

                                            <option value="admin" <?= $usuario->getCargo() === 'admin' ? 'selected' : ''; ?>>

                                                Administrador

                                            </option>

                                            <option value="tecnico" <?= $usuario->getCargo() === 'tecnico' ? 'selected' : ''; ?>>

                                                Técnico

                                            </option>

                                        </select>

                                        <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-on-surface-variant">

                                            expand_more

                                        </span>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </section>

                    <hr class="border-outline-variant/30" />

                    <!-- ENDEREÇO -->

                    <section class="flex flex-col md:flex-row gap-8">

                        <div class="w-full md:w-1/3">

                            <h3 class="font-bold text-primary mb-1">

                                Endereço Residencial

                            </h3>

                            <p class="text-caption text-on-surface-variant">

                                Atualize os dados de localização do colaborador.

                            </p>

                        </div>

                        <div class="flex-1 space-y-6">

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                                <!-- CEP -->

                                <div class="space-y-2">

                                    <label
                                        class="block font-label-sm text-on-surface-variant uppercase tracking-wider"
                                        for="cep"
                                    >

                                        CEP

                                    </label>

                                    <input
                                        class="w-full px-4 py-3 bg-surface border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary-container focus:border-transparent outline-none transition-all"
                                        id="cep"
                                        name="cep"
                                        type="text"
                                        maxlength="9"
                                        onblur="pesquisaCep(this.value)"
                                        value="<?= $end ? htmlspecialchars($end->getCep()) : ''; ?>"
                                        required
                                    />

                                </div>

                                <!-- RUA -->

                                <div class="md:col-span-2 space-y-2">

                                    <label
                                        class="block font-label-sm text-on-surface-variant uppercase tracking-wider"
                                        for="rua"
                                    >

                                        Rua / Logradouro

                                    </label>

                                    <input
                                        class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant rounded-lg text-on-surface-variant cursor-not-allowed"
                                        id="rua"
                                        name="rua"
                                        type="text"
                                        readonly
                                        value="<?= $end ? htmlspecialchars($end->getRua()) : ''; ?>"
                                    />

                                </div>

                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                                <!-- BAIRRO -->

                                <div class="space-y-2">

                                    <label
                                        class="block font-label-sm text-on-surface-variant uppercase tracking-wider"
                                        for="bairro"
                                    >

                                        Bairro

                                    </label>

                                    <input
                                        class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant rounded-lg text-on-surface-variant cursor-not-allowed"
                                        id="bairro"
                                        name="bairro"
                                        type="text"
                                        readonly
                                        value="<?= $end ? htmlspecialchars($end->getBairro()) : ''; ?>"
                                    />

                                </div>

                                <!-- CIDADE -->

                                <div class="space-y-2">

                                    <label
                                        class="block font-label-sm text-on-surface-variant uppercase tracking-wider"
                                        for="cidade"
                                    >

                                        Cidade

                                    </label>

                                    <input
                                        class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant rounded-lg text-on-surface-variant cursor-not-allowed"
                                        id="cidade"
                                        name="cidade"
                                        type="text"
                                        readonly
                                        value="<?= $end ? htmlspecialchars($end->getCidade()) : ''; ?>"
                                    />

                                </div>

                                <!-- ESTADO -->

                                <div class="space-y-2">

                                    <label
                                        class="block font-label-sm text-on-surface-variant uppercase tracking-wider"
                                        for="estado"
                                    >

                                        Estado (UF)

                                    </label>

                                    <input
                                        class="w-full px-4 py-3 bg-surface-container-low border border-outline-variant rounded-lg text-on-surface-variant cursor-not-allowed"
                                        id="estado"
                                        name="estado"
                                        type="text"
                                        maxlength="2"
                                        readonly
                                        value="<?= $end ? htmlspecialchars($end->getEstado()) : ''; ?>"
                                    />

                                </div>

                            </div>

                            <!-- NÚMERO -->

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                                <div class="space-y-2">

                                    <label
                                        class="block font-label-sm text-on-surface-variant uppercase tracking-wider"
                                        for="numero"
                                    >

                                        Número

                                    </label>

                                    <input
                                        class="w-full px-4 py-3 bg-surface border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary-container focus:border-transparent outline-none transition-all"
                                        id="numero"
                                        name="numero"
                                        type="text"
                                        value="<?= $end ? htmlspecialchars($end->getNumero()) : ''; ?>"
                                        required
                                    />

                                </div>

                            </div>

                        </div>

                    </section>

                </div>

                <!-- FOOTER -->

                <div class="px-8 py-6 bg-surface-container-low border-t border-outline-variant flex justify-end items-center gap-4">

                    <a
                        href="index.php?acao=funcionarios"
                        class="px-6 py-2.5 font-medium text-on-surface-variant hover:text-primary transition-colors"
                    >

                        Cancelar

                    </a>

                    <button
                        class="px-8 py-2.5 bg-primary text-on-primary rounded-lg font-bold shadow-sm hover:opacity-90 hover:shadow-md transition-all flex items-center gap-2"
                        type="submit"
                    >

                        <span class="material-symbols-outlined text-[20px]">

                            save

                        </span>

                        Salvar Alterações

                    </button>

                </div>

            </form>

        </div>

    </main>

</div>

<script src="assets/js/cep.js"></script>

</body>
</html>