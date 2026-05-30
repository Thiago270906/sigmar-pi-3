<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/img/logo-icone.png">
    <title>SIGMAR - Login</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
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
        }

    </style>
</head>

<body class="bg-background min-h-screen flex flex-col"> <!-- responsividade pro body -->

    <!-- ==============================
         SUA PARTE ESTÁ AQUI THIAGO, O QUE MUDEI FOI SÓ O ESTILO EM CLASS DO TAILWIND, O RESTO É O MESMO DO SEU CÓDIGO
    ============================== -->
    <main class="flex-grow flex items-center justify-center w-full px-4 sm:px-6 md:px-8 py-6">  <!-- responsividade no main -->

        <!-- Card central de login -->
        <div class="bg-surface-container-lowest w-full max-w-[420px] rounded-lg overflow-hidden shadow-[0_2px_4px_rgba(0,0,0,0.04)] border border-outline-variant">

            <!-- parte azul da logo -->
            <div class="bg-primary-container flex flex-col items-center justify-center py-8">
                <img src="./assets/img/logo-sigmar.png" alt="Logo SIGMAR" width="250px" height="auto">
            </div>

            <!-- conteúdo -->
            <div class="p-10">

                <div class="flex flex-col items-center mb-8">
                    <h1 class="text-h1-display font-h1-display text-primary uppercase tracking-tight">LOGIN</h1>
                    <p class="text-caption font-caption text-on-surface-variant mt-2">Tela de Acesso ao Sistema</p>
                </div>

            <!-- Formulário começa aqui -->
            <form action="index.php?acao=login" method="POST" class="space-y-6">

                <!-- parte do email e da senha -->
                <div>
                    <label for="email" class="block text-label-sm font-label-sm text-on-surface mb-2">E-mail Corporativo</label>
                    <input id="email" name="email" type="email" placeholder="seuusuario@sigmar.com.br" class="w-full h-12 px-4 rounded-lg border border-outline-variant bg-surface-container-low text-body-main font-body-main focus:ring-2 focus:ring-secondary focus:border-secondary transition-all outline-none placeholder:text-outline"/>
                </div>

                <div>
                    <label for="senha" class="block text-label-sm font-label-sm text-on-surface mb-2">
                        Senha
                    </label>
                <div class="relative">
                        <input id="senha" type="password" name="senha" placeholder="Digite sua senha" class="w-full h-12 px-4 rounded-lg border border-outline-variant bg-surface-container-low text-body-main font-body-main focus:ring-2 focus:ring-secondary focus:border-secondary transition-all outline-none placeholder:text-outline"/>
                </div>
                <br>

                <!-- botão de 'esqueci a senha' (não funciona ainda) -->

                <div class="flex items-center justify-between">              
                    <!--o href não existe ainda-->
                    <a href="senharecuperacao.php" class="text-caption font-caption text-secondary font-medium hover:underline">Esqueci minha senha</a>
                </div>
                <br>

                <!-- Botão de enviar -->
                <button type="submit" class="w-full h-14 bg-primary-container hover:bg-primary text-white rounded-lg flex items-center justify-center gap-3 transition-all active:scale-[0.98]">
                    <span class="text-body-main font-bold">Entrar</span>
                </button>

                <!-- Mensagem de erro -->
                <?php if(isset($_SESSION['erro'])): ?>
                    <p>
                        <?= $_SESSION['erro'] ?>
                    </p>
                    
                    <?php unset($_SESSION['erro']); ?>
                <?php endif; ?>

                <br>

            </form>
        </div>
    </main>

    <!-- ===================
         AQUI É SÓ A PARTE DO RODAPÉ
    ======================== -->
    <footer class="w-full bg-surface border-t border-outline-variant/30 py-6">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-center gap-1 text-center">
            <p class="text-caption font-caption text-on-surface-variant">
                © 2026 SIGMAR - Sistema Inteligente de Gestão de Máquinas Rotativas.
            </p>
            <p class="text-caption font-caption text-on-surface-variant">
                Todos os direitos reservados.
            </p>
        </div>
    </footer>

</body>
</html>
