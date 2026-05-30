<?php

require_once __DIR__ . '/../../../models/Usuario.php';

/** @var Usuario $usuario */

?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="./assets/img/logo-icone.png">
<title>SIGMAR - Detalhes Funcionário</title>
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


<div class="flex-1 flex flex-col min-w-0 bg-white">
    <main class="flex-1 p-4 md:p-8 space-y-8 overflow-y-auto">

            <!-- Cabeçalho -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">

                <div>

                    <!-- Título + seta -->
                    <div class="flex items-center gap-3">

                        <h2 class="text-4xl font-bold text-primary">
                            Detalhes do Funcionário
                        </h2>

                    </div>

                    <p class="text-on-surface-variant">
                        Gerencie as informações e permissões do colaborador no sistema SIGMAR.
                    </p>

                </div>

            </div>

      <!-- ============
       GRID BENTO 
       ============== -->

      <div class="grid grid-cols-12 gap-4 md:gap-gutter">
        <div class="col-span-12 lg:col-span-8 space-y-4 md:space-y-gutter">

          <!-- Card: Informações Pessoais -->
          <section
            class="bg-surface-container-lowest p-6 md:p-card-inner-padding rounded-xl border border-outline-variant/30 shadow-sm">

            <!-- Cabeçalho do card com ícone e título -->
            <div class="flex items-center gap-3 mb-6 md:mb-8">
              <div class="w-10 h-10 rounded-lg bg-primary-container flex items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined text-on-primary">person</span>
              </div>
              <h4 class="font-h3-card-title text-on-surface">Informações Pessoais</h4>
            </div>

            <!-- Grid de campos: 1 coluna em mobile, 2 colunas em tablets/desktop -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-12">

              <div class="space-y-1">
                <p class="text-caption text-on-tertiary-container font-bold uppercase tracking-wider">Nome Completo</p>
                <p class="font-body-main text-on-surface">
                    <?= htmlspecialchars($usuario->getNome()) ?>
                </p>
              </div>

              <div class="space-y-1">
                <p class="text-caption text-on-tertiary-container font-bold uppercase tracking-wider">Email Corporativo</p>
                <p class="font-body-main text-on-surface break-all">
                    <?= htmlspecialchars($usuario->getEmail()) ?>
                </p>
              </div>
              
              <div class="space-y-1">
                <p class="text-caption text-on-tertiary-container font-bold uppercase tracking-wider">Cargo na Empresa:</p>
                <p class="font-body-main text-on-surface break-all">
                    <?= htmlspecialchars(strtoupper($usuario->getCargo())) ?>
                </p>
              </div>

              <div class="space-y-1">
                <p class="text-caption text-on-tertiary-container font-bold uppercase tracking-wider">Telefone Contato</p>
                <p class="font-body-main text-on-surface">
                    
                    <?php if($usuario->getTelefone()): ?>

                    <?= htmlspecialchars($usuario->getTelefone()) ?>

                    <?php else: ?>

                    Não informado

                    <?php endif; ?>
                </p>
              </div>

              <div class="space-y-1">
                <p class="text-caption text-on-tertiary-container font-bold uppercase tracking-wider">Conta cadastrada em:</p>
                <p class="font-body-main text-on-surface break-all">
                    <?= date('d/m/Y H:i', strtotime($usuario->getCriadaEm())) ?>
                </p>
              </div>

            </div>
          </section>

          <!-- Card: Endereço de Residência (com ícone decorativo de fundo) -->
          <section
            class="bg-surface-container-lowest p-6 md:p-card-inner-padding rounded-xl border border-outline-variant/30 shadow-sm relative overflow-hidden">

            <!-- Ícone decorativo de fundo (baixíssima opacidade) -->
            <div class="absolute right-0 top-0 opacity-[0.03] p-4 pointer-events-none select-none">
              <span class="material-symbols-outlined text-[160px]"
                style="font-variation-settings: 'FILL' 1;">location_on</span>
            </div>

            <!-- Cabeçalho do card com ícone e título -->
            <div class="flex items-center gap-3 mb-6 md:mb-8">
              <div class="w-10 h-10 rounded-lg bg-primary-container flex items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined text-on-primary">map</span>
              </div>
              <h4 class="font-h3-card-title text-on-surface">Endereço de Residência</h4>
            </div>

            <!-- Grid de campos: 1 coluna em mobile, 3 colunas em tablets/desktop -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-y-6 gap-x-8">

              <div class="space-y-1">
                <p class="text-caption text-on-tertiary-container font-bold uppercase tracking-wider">CEP</p>
                <p class="font-body-main text-on-surface">
                    <?= $usuario->getEndereco()->getCep() ?>
                </p>
              </div>

              <!-- Ocupa 2 colunas em desktop para a rua ter mais espaço -->
              <div class="space-y-1 md:col-span-2">
                <p class="text-caption text-on-tertiary-container font-bold uppercase tracking-wider">Rua</p>
                <p class="font-body-main text-on-surface">
                    <?= $usuario->getEndereco()->getRua() ?>
                </p>
              </div>

              <div class="space-y-1">
                <p class="text-caption text-on-tertiary-container font-bold uppercase tracking-wider">Número</p>
                <p class="font-body-main text-on-surface">
                    <?= $usuario->getEndereco()->getNumero() ?>
                </p>
              </div>

              <div class="space-y-1">
                <p class="text-caption text-on-tertiary-container font-bold uppercase tracking-wider">Bairro</p>
                <p class="font-body-main text-on-surface">
                    <?= $usuario->getEndereco()->getBairro() ?>
                </p>
              </div>

              <div class="space-y-1">
                <p class="text-caption text-on-tertiary-container font-bold uppercase tracking-wider">Cidade</p>
                <p class="font-body-main text-on-surface">
                    <?= $usuario->getEndereco()->getCidade() ?>
                </p>
              </div>

              <div class="space-y-1">
                <p class="text-caption text-on-tertiary-container font-bold uppercase tracking-wider">Estado</p>
                <p class="font-body-main text-on-surface">
                    <?= $usuario->getEndereco()->getEstado() ?>
                </p>
                
              </div>

            </div>
          </section>
                          <div class="flex flex-wrap gap-4 pt-2">

                    <a
                        href="index.php?acao=funcionarios"
                        class="px-6 py-2 rounded-lg hover:bg-surface-container-high transition-all"
                    >

                        Voltar

                    </a>

                    <a
                        href="index.php?acao=form-editar-funcionario&id=<?= $usuario->getId(); ?>"
                        class="px-6 py-2 bg-secondary text-white rounded-lg flex items-center gap-2"
                    >
                        <span class="material-symbols-outlined">

                            edit

                        </span>

                        Editar

                    </a>

                    <a
                        href="index.php?acao=form-remover-funcionario&id=<?= $usuario->getId(); ?>"
                        class="px-6 py-2 bg-red-600 text-white rounded-lg flex items-center gap-2"
                    >

                        <span class="material-symbols-outlined">

                            delete

                        </span>

                        Remover

                    </a>


                </div>
      </div>
    </main>
  </div>
</body>
</html>