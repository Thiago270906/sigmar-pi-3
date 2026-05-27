<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SIGMAR - Dashboard de Manutenção Preventiva</title>
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
               class="bg-secondary text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">home</span>
                <span class="font-medium text-sm">Dashboard</span>
            </a>

            <!-- Link ativo: Máquinas -->
            <a href="index.php?acao=maquinas"
               class="text-white/70 hover:bg-white/10 hover:text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all">
                <span class="material-symbols-outlined">settings_input_component</span>
                <span class="font-medium text-sm">Máquinas</span>
            </a>

            <!-- Link: Manutenções -->
            <a href="index.php?acao=manutencoes"
               class="text-white/70 hover:bg-white/10 hover:text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all">
                <span class="material-symbols-outlined">description</span>
                <span class="font-medium text-sm">Manutenções</span>
            </a>

            <!-- Link: Funcionários -->
            <a href="index.php?acao=funcionarios"
               class="text-white/70 hover:bg-white/10 hover:text-white rounded-lg px-4 py-3 flex items-center gap-4 transition-all">
                <span class="material-symbols-outlined">group</span>
                <span class="font-medium text-sm">Funcionários</span>
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

    <!-- ==============================
         BARRA SUPERIOR
    ============================== -->
    <div class="flex-1 flex flex-col min-w-0 bg-white">

        <!-- ==============================
             CONTEÚDO PRINCIPAL
        ============================== -->
        
        <main class="flex-1 p-4 md:p-8 space-y-8 overflow-y-auto">

            <!-- Título da Página -->
            <div class="space-y-1">
                <h2 class="text-2xl font-bold text-primary">Dashboard</h2>
                <p class="text-on-surface-variant text-sm">Painel de Administrador</p>
            </div>

            <!-- ==============================
                 LINHA DO MEIO — Gráfico + Notificações
            ============================== -->
            <div class="grid grid-cols-1 gap-6"> <!-- responsividade -->

                <!-- tabela do gráfico -->
                <div class="w-full bg-white border border-outline-variant/50 rounded-xl p-4 md:p-6 overflow-x-auto">
                    <div class="flex justify-between items-center mb-10">
                        <h3 class="font-bold text-primary">Manutenções ao longo do tempo</h3>
                    </div>

                    <div class="h-80 relative w-full overflow-x-auto"> 
                        <svg class="w-full h-full overflow-visible" viewBox="0 0 800 240">
                            <!-- Linhas de grade -->
                            <line stroke="#f0f1f2" stroke-width="1" x1="0" x2="800" y1="0"   y2="0"></line>
                            <line stroke="#f0f1f2" stroke-width="1" x1="0" x2="800" y1="40"  y2="40"></line>
                            <line stroke="#f0f1f2" stroke-width="1" x1="0" x2="800" y1="80"  y2="80"></line>
                            <line stroke="#f0f1f2" stroke-width="1" x1="0" x2="800" y1="120" y2="120"></line>
                            <line stroke="#f0f1f2" stroke-width="1" x1="0" x2="800" y1="160" y2="160"></line>
                            <line stroke="#f0f1f2" stroke-width="1" x1="0" x2="800" y1="200" y2="200"></line>

                            <!-- Labels do eixo Y -->
                            <text fill="#737780" font-size="10" text-anchor="end" x="-15" y="5">25</text>
                            <text fill="#737780" font-size="10" text-anchor="end" x="-15" y="45">20</text>
                            <text fill="#737780" font-size="10" text-anchor="end" x="-15" y="85">15</text>
                            <text fill="#737780" font-size="10" text-anchor="end" x="-15" y="125">10</text>
                            <text fill="#737780" font-size="10" text-anchor="end" x="-15" y="165">5</text>
                            <text fill="#737780" font-size="10" text-anchor="end" x="-15" y="205">0</text>

                            <!-- Linha Azul -->
                            <path d="M20,180 L130,160 L240,140 L350,170 L460,110 L570,140 L680,120"
                                  fill="none" stroke="#005eb3" stroke-width="3"></path>

                            <!-- Linha Vermelha -->
                            <path d="M20,220 L130,210 L240,215 L350,205 L460,200 L570,215 L680,195"
                                  fill="none" stroke="#ba1a1a" stroke-width="2"></path>

                            <!-- Pontos — Azul -->
                            <circle cx="20"  cy="180" fill="#005eb3" r="4"></circle>
                            <circle cx="130" cy="160" fill="#005eb3" r="4"></circle>
                            <circle cx="240" cy="140" fill="#005eb3" r="4"></circle>
                            <circle cx="350" cy="170" fill="#005eb3" r="4"></circle>
                            <circle cx="460" cy="110" fill="#005eb3" r="4"></circle>
                            <circle cx="570" cy="140" fill="#005eb3" r="4"></circle>
                            <circle cx="680" cy="120" fill="#005eb3" r="4"></circle>

                            <!-- Pontos — Vermelho -->
                            <circle cx="20"  cy="220" fill="#ba1a1a" r="4"></circle>
                            <circle cx="130" cy="210" fill="#ba1a1a" r="4"></circle>
                            <circle cx="240" cy="215" fill="#ba1a1a" r="4"></circle>
                            <circle cx="350" cy="205" fill="#ba1a1a" r="4"></circle>
                            <circle cx="460" cy="200" fill="#ba1a1a" r="4"></circle>
                            <circle cx="570" cy="215" fill="#ba1a1a" r="4"></circle>
                            <circle cx="680" cy="195" fill="#ba1a1a" r="4"></circle>

                            <!-- Labels do eixo X -->
                            <text fill="#737780" font-size="10" text-anchor="middle" x="20"  y="235">12/05</text>
                            <text fill="#737780" font-size="10" text-anchor="middle" x="130" y="235">13/05</text>
                            <text fill="#737780" font-size="10" text-anchor="middle" x="240" y="235">14/05</text>
                            <text fill="#737780" font-size="10" text-anchor="middle" x="350" y="235">15/05</text>
                            <text fill="#737780" font-size="10" text-anchor="middle" x="460" y="235">16/05</text>
                            <text fill="#737780" font-size="10" text-anchor="middle" x="570" y="235">17/05</text>
                            <text fill="#737780" font-size="10" text-anchor="middle" x="680" y="235">18/05</text>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- ==============================
                 LINHA INFERIOR: Equipamentos e Manutenções
            ============================== -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 pb-8">

                <!-- ---- Card: Equipamentos Registrados ---- -->
                <div class="bg-white border border-outline-variant/50 rounded-xl flex flex-col" style="height: 400px;">
                    <div class="p-6 flex flex-col h-full">

                        <h3 class="font-bold text-primary mb-4">Equipamentos Registrados</h3>

                        <!-- Cabeçalho da tabela (fixo, não rola) -->
                        <div class="flex-shrink-0 grid grid-cols-2 text-[11px] text-outline uppercase tracking-wider border-b border-outline-variant/30 pb-2 mb-1">
                            <span class="font-semibold">Equipamento</span>
                            <span class="font-semibold text-right">Status</span>
                        </div>

                        <!-- Lista de equipamentos com scroll e hover clicável -->
                        <div class="flex-1 overflow-y-auto min-h-0 space-y-1">

                            <div class="flex-1 overflow-y-auto min-h-0 space-y-1">

                                <?php if(empty($maquinas)): ?>

                                    <div class="flex items-center justify-center h-full py-10">
                                        <p class="text-sm text-outline">
                                            Nenhuma máquina cadastrada.
                                        </p>
                                    </div>

                                <?php else: ?>

                                    <?php foreach($maquinas as $maquina): ?>

                                        <?php
                                            $status = $maquina->getStatus();

                                            $classeStatus = match($status) {
                                                'operando' => 'bg-green-100 text-green-700',
                                                'alerta' => 'bg-yellow-100 text-yellow-700',
                                                'critico' => 'bg-red-100 text-red-700',
                                                default => 'bg-gray-100 text-gray-700'
                                            };
                                        ?>

                                        <a href="index.php?acao=detalhes-maquina&id=<?= $maquina->getId(); ?>"
                                        class="flex items-center justify-between p-3 rounded-lg border border-outline-variant/20 hover:bg-surface-container-low transition-colors cursor-pointer">

                                            <div class="min-w-0 flex-1">
                                                <p class="text-sm font-medium text-on-surface">
                                                    <?= htmlspecialchars($maquina->getNome()); ?>
                                                </p>

                                                <p class="text-xs text-outline">
                                                    <?= htmlspecialchars($maquina->getTipo()); ?>
                                                </p>
                                            </div>

                                            <div class="flex items-center gap-2 flex-shrink-0">

                                                <span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase <?= $classeStatus ?>">
                                                    <?= htmlspecialchars($status); ?>
                                                </span>

                                                <span class="material-symbols-outlined text-outline text-[16px]">
                                                    chevron_right
                                                </span>

                                            </div>
                                        </a>

                                    <?php endforeach; ?>

                                <?php endif; ?>

                            </div>
                        </div>
                        <!-- Fim: Lista de equipamentos -->

                        <!-- Rodapé fixo: link para todos os equipamentos -->
                        <div class="mt-4 pt-4 border-t border-outline-variant/30 flex-shrink-0">
                            <a href="index.php?acao=maquinas"
                               class="text-secondary text-xs font-semibold hover:underline flex items-center justify-center gap-1">
                                Ver mais
                                <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
                            </a>
                        </div>

                    </div>
                </div>
                <!-- Fim: Card de Equipamentos -->

                <!-- ---- Card: Manutenções Recentes ---- -->
                <div class="bg-white border border-outline-variant/50 rounded-xl flex flex-col" style="height: 400px;">
                    <div class="p-6 flex flex-col h-full">

                        <h3 class="font-bold text-primary mb-4">Manutenções Recentes</h3>

                        <!-- Lista de manutenções com scroll e hover clicável -->
                        <div class="flex-1 overflow-y-auto min-h-0 space-y-2">

                            <!-- Manutenção 1: Troca de óleo — redireciona para detalhes -->
                            <a href="index.php?acao=manutencoes&id=1"
                               class="flex justify-between items-center p-3 rounded-lg border border-outline-variant/20 hover:bg-surface-container-low transition-colors cursor-pointer">
                                <div>
                                    <p class="text-sm font-medium text-on-surface">Troca de óleo - Filtro 2</p>
                                    <p class="text-xs text-outline">Tec: Ricardo Silva</p>
                                </div>
                                <div class="flex items-center gap-2 text-right flex-shrink-0">
                                    <div>
                                        <p class="text-xs font-medium text-on-surface-variant">18/05/2026</p>
                                        <p class="text-[10px] text-outline">Concluído</p>
                                    </div>
                                    <span class="material-symbols-outlined text-outline text-[16px]">chevron_right</span>
                                </div>
                            </a>

                            <!-- Manutenção 2: Calibração — redireciona para detalhes -->
                            <a href="index.php?acao=manutencoes&id=2"
                               class="flex justify-between items-center p-3 rounded-lg border border-outline-variant/20 hover:bg-surface-container-low transition-colors cursor-pointer">
                                <div>
                                    <p class="text-sm font-medium text-on-surface">Calibração de sensores</p>
                                    <p class="text-xs text-outline">Tec: Ana Costa</p>
                                </div>
                                <div class="flex items-center gap-2 text-right flex-shrink-0">
                                    <div>
                                        <p class="text-xs font-medium text-on-surface-variant">17/07/2025</p>
                                        <p class="text-[10px] text-outline">Concluído</p>
                                    </div>
                                    <span class="material-symbols-outlined text-outline text-[16px]">chevron_right</span>
                                </div>
                            </a>

                            <!-- Manutenção 3: Ajuste de correia — redireciona para detalhes -->
                            <a href="index.php?acao=manutencoes&id=3"
                               class="flex justify-between items-center p-3 rounded-lg border border-outline-variant/20 hover:bg-surface-container-low transition-colors cursor-pointer">
                                <div>
                                    <p class="text-sm font-medium text-on-surface">Ajuste de correia</p>
                                    <p class="text-xs text-outline">Tec: Marcos Souza</p>
                                </div>
                                <div class="flex items-center gap-2 text-right flex-shrink-0">
                                    <div>
                                        <p class="text-xs font-medium text-on-surface-variant">16/11/2024</p>
                                        <p class="text-[10px] text-outline">Concluído</p>
                                    </div>
                                    <span class="material-symbols-outlined text-outline text-[16px]">chevron_right</span>
                                </div>
                            </a>

                            <!-- Manutenção 4: Limpeza preventiva — redireciona para detalhes -->
                            <a href="index.php?acao=manutencoes&id=4"
                               class="flex justify-between items-center p-3 rounded-lg border border-outline-variant/20 hover:bg-surface-container-low transition-colors cursor-pointer">
                                <div>
                                    <p class="text-sm font-medium text-on-surface">Limpeza preventiva</p>
                                    <p class="text-xs text-outline">Tec: Ricardo Silva</p>
                                </div>
                                <div class="flex items-center gap-2 text-right flex-shrink-0">
                                    <div>
                                        <p class="text-xs font-medium text-on-surface-variant">15/05/2024</p>
                                        <p class="text-[10px] text-outline">Concluído</p>
                                    </div>
                                    <span class="material-symbols-outlined text-outline text-[16px]">chevron_right</span>
                                </div>
                            </a>

                        </div>
                        <!-- Fim: Lista de manutenções -->

                        <!-- Rodapé fixo: link para todas as manutenções -->
                        <div class="mt-4 pt-4 border-t border-outline-variant/30 flex-shrink-0">
                            <a href="index.php?acao=manutencoes"
                               class="text-secondary text-xs font-semibold hover:underline flex items-center justify-center gap-1">
                                Ver mais
                                <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
                            </a>
                        </div>

                    </div>
                </div>
                <!-- Fim: Card de Manutenções -->

            </div>
            <!-- Fim: Linha Inferior -->

        </main>
        <!-- Fim: Área Principal (main) -->

    </div>
</body>
</html>