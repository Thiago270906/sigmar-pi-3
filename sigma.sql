    DROP DATABASE sigmar;
    CREATE DATABASE sigmar;
    USE sigmar;

    -- =========================
    -- USUÁRIOS
    -- =========================

    CREATE TABLE usuarios (
        id_usuario INT AUTO_INCREMENT PRIMARY KEY,
        
        nome VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        senha_hash VARCHAR(255) NOT NULL,
        
        cargo ENUM('admin', 'tecnico') NOT NULL,
        
        telefone VARCHAR(20),
        
        ativo BOOLEAN DEFAULT TRUE,

        criada_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

        deleted_at DATETIME NULL 
    );

    -- =========================
    -- ENDEREÇOS
    -- =========================

    CREATE TABLE enderecos (
        id_endereco INT AUTO_INCREMENT PRIMARY KEY,
        
        cep VARCHAR(10),
        cidade VARCHAR(100),
        bairro VARCHAR(100),
        rua VARCHAR(100),
        estado CHAR(2),
        numero VARCHAR(10),
        
        id_usuario INT NOT NULL,
        
        FOREIGN KEY (id_usuario)
            REFERENCES usuarios(id_usuario)
            ON DELETE CASCADE
    );

    -- =========================
    -- MÁQUINAS
    -- =========================

    CREATE TABLE maquinas (
        id_maquina INT AUTO_INCREMENT PRIMARY KEY,
        
        nome VARCHAR(100) NOT NULL,
        tipo VARCHAR(100) NOT NULL,
        
        status ENUM(
            'operando',
            'alerta',
            'critico'
        ) DEFAULT 'operando',
        
        ativa BOOLEAN DEFAULT TRUE,
        
        criada_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

        deleted_at DATETIME NULL 
    );

    -- =========================
    -- ORDENS DE MANUTENÇÃO
    -- =========================

    CREATE TABLE ordens_manutencao (
        id_ordem INT AUTO_INCREMENT PRIMARY KEY,
        
        titulo VARCHAR(150) NOT NULL,
        descricao TEXT,
        
        tipo ENUM(
            'preventiva',
            'corretiva',
            'preditiva'
        ) NOT NULL,
        
        prioridade ENUM(
            'baixa',
            'media',
            'alta',
            'urgente'
        ) DEFAULT 'media',
        
        status ENUM(
            'agendada',
            'pendente',
            'em_andamento',
            'concluida',
            'cancelada'
        ) DEFAULT 'agendada',
        
        data_abertura TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        data_agendada DATE,
        data_inicio DATETIME,
        data_conclusao DATETIME,

        deleted_at DATETIME NULL, 
        
        id_maquina INT NOT NULL,
        id_usuario INT,
        
        FOREIGN KEY (id_maquina)
            REFERENCES maquinas(id_maquina),
            
        FOREIGN KEY (id_usuario)
            REFERENCES usuarios(id_usuario)
    );

    -- =========================
    -- MANUTENÇÕES EXECUTADAS
    -- =========================

    CREATE TABLE manutencoes (
        id_manutencao INT AUTO_INCREMENT PRIMARY KEY,

        diagnostico TEXT NOT NULL,

        descricao_servico TEXT NOT NULL,

        pecas_trocadas TEXT,

        observacoes TEXT,

        data_execucao DATETIME DEFAULT CURRENT_TIMESTAMP,

        id_ordem INT NOT NULL,
        id_usuario INT NOT NULL,

        FOREIGN KEY (id_ordem)
            REFERENCES ordens_manutencao(id_ordem),

        FOREIGN KEY (id_usuario)
            REFERENCES usuarios(id_usuario)
    );
        

    CREATE TABLE notificacoes (
        id_notificacao INT AUTO_INCREMENT PRIMARY KEY,
        
        titulo VARCHAR(100),
        mensagem TEXT NOT NULL,
        
        tipo ENUM(
            'alerta',
            'manutencao',
            'sistema',
            'critico'
        ),
        
        lida BOOLEAN DEFAULT FALSE,
        
        data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        
        id_usuario INT,
        id_maquina INT,
        
        FOREIGN KEY (id_usuario)
            REFERENCES usuarios(id_usuario),
            
        FOREIGN KEY (id_maquina)
            REFERENCES maquinas(id_maquina)
    );

    CREATE TABLE sensores (
        id_sensor INT AUTO_INCREMENT PRIMARY KEY,

        modelo VARCHAR(100),

        tipo ENUM(
            'temperatura',
            'vibracao'
        ) NOT NULL,

        limite_alerta DECIMAL(10,2),

        limite_critico DECIMAL(10,2),
        
        status ENUM(
            'ativo',
            'inativo'
        ) DEFAULT 'ativo',

        data_instalacao DATETIME DEFAULT CURRENT_TIMESTAMP,

        data_troca DATETIME NULL,

        id_maquina INT NOT NULL,

        FOREIGN KEY (id_maquina)
            REFERENCES maquinas(id_maquina)
            ON DELETE CASCADE
    );

    -- =========================
    -- USUÁRIOS
    -- =========================

    INSERT INTO usuarios
    (nome, email, senha_hash, cargo, telefone)
    VALUES
    (
        'Administrador Geral',
        'admin@sigmar.com',
        '$2y$10$rJLBU0YwQ1dzUasWKWXez.hmoUp4HFm5kZePYg.3830B3Rqf1RaHq',
        'admin',
        '(19) 99999-0001'
    ),
    (
        'Técnico',
        'tecnico@sigmar.com',
        '$2y$10$rJLBU0YwQ1dzUasWKWXez.hmoUp4HFm5kZePYg.3830B3Rqf1RaHq',
        'tecnico',
        '(19) 99999-0002'
    ),
    (
        'Fernanda Souza',
        'fernanda@sigmar.com',
        '$2y$10$rJLBU0YwQ1dzUasWKWXez.hmoUp4HFm5kZePYg.3830B3Rqf1RaHq',
        'tecnico',
        '(19) 99999-0003'
    ),
    (
        'Ricardo Alves',
        'ricardo@sigmar.com',
        '$2y$10$rJLBU0YwQ1dzUasWKWXez.hmoUp4HFm5kZePYg.3830B3Rqf1RaHq',
        'admin',
        '(19) 99999-0004'
    ),
    (
        'Carlos Henrique',
        'carlos@sigmar.com',
        '$2y$10$rJLBU0YwQ1dzUasWKWXez.hmoUp4HFm5kZePYg.3830B3Rqf1RaHq',
        'tecnico',
        '(19) 99999-0005'
    );

    -- =========================
    -- ENDEREÇOS
    -- =========================

    INSERT INTO enderecos
    (cep, cidade, bairro, rua, estado, numero, id_usuario)
    VALUES
    ('13970-000', 'Itapira', 'Centro', 'Rua Rui Barbosa', 'SP', '120', 1),
    ('13970-000', 'Itapira', 'Vila Ilze', 'Rua São Paulo', 'SP', '455', 2),
    ('13050-000', 'Campinas', 'Jardim Chapadão', 'Rua das Palmeiras', 'SP', '89', 3),
    ('13800-000', 'Mogi Mirim', 'Centro', 'Rua XV de Novembro', 'SP', '210', 4),
    ('13840-000', 'Mogi Guaçu', 'Vila São Carlos', 'Avenida Brasil', 'SP', '450', 5);

    -- =========================
    -- MÁQUINAS
    -- =========================

    INSERT INTO maquinas
    (nome, tipo, status)
    VALUES
    (
        'Motor Universal',
        'Motor Elétriico',
        'alerta'
    ),
    (
        'Prensa Hidráulica PH-300',
        'Prensa Hidráulica',
        'critico'
    ),
    (
        'Esteira Transportadora ET-01',
        'Esteira',
        'operando'
    ),
    (
        'Compressor Atlas Copco',
        'Compressor',
        'alerta'
    ),
    (
        'Fresadora Universal FU-12',
        'Fresadora',
        'operando'
    ),
    (
        'Injetora Plástica IP-500',
        'Injetora',
        'alerta'
    );

    -- =========================
    -- SENSORES
    -- =========================

    INSERT INTO sensores
    (modelo, tipo, limite_alerta, limite_critico, status, id_maquina)
    VALUES
    ('TMP-X100', 'temperatura', 70.00, 90.00, 'ativo', 1),
    ('VIB-S200', 'vibracao', 5.00, 8.00, 'ativo', 1),

    ('TMP-X100', 'temperatura', 65.00, 85.00, 'ativo', 2),
    ('VIB-S200', 'vibracao', 4.50, 7.50, 'ativo', 2),

    ('TMP-X100', 'temperatura', 60.00, 80.00, 'ativo', 3),

    ('TMP-X100', 'temperatura', 75.00, 95.00, 'ativo', 4),
    ('VIB-S200', 'vibracao', 6.00, 9.00, 'ativo', 4),

    ('TMP-X100', 'temperatura', 68.00, 88.00, 'ativo', 5),

    ('VIB-S200', 'vibracao', 5.50, 8.50, 'ativo', 6);

    -- =========================
    -- ORDENS DE MANUTENÇÃO
    -- ADMIN APENAS RELATA O SINTOMA
    -- =========================

    INSERT INTO ordens_manutencao
    (
        titulo,
        descricao,
        tipo,
        prioridade,
        status,
        data_agendada,
        data_inicio,
        data_conclusao,
        id_maquina,
        id_usuario
    )
    VALUES
    (
        'Ruído estranho no Motor Elétrico',
        'Operador informou ruído metálico durante funcionamento',
        'corretiva',
        'alta',
        'concluida',
        '2026-05-10',
        '2026-05-10 08:00:00',
        '2026-05-10 11:20:00',
        1,
        2
    ),
    (
        'Prensa perdeu pressão',
        'Equipamento apresentou falha hidráulica durante produção',
        'corretiva',
        'urgente',
        'em_andamento',
        '2026-05-21',
        '2026-05-21 13:00:00',
        NULL,
        2,
        3
    ),
    (
        'Inspeção preventiva mensal',
        'Verificação preventiva programada pelo setor industrial',
        'preventiva',
        'media',
        'agendada',
        '2026-05-28',
        NULL,
        NULL,
        3,
        5
    ),
    (
        'Temperatura elevada no compressor',
        'Sistema apresentou aquecimento acima do normal',
        'preditiva',
        'alta',
        'pendente',
        '2026-05-26',
        NULL,
        NULL,
        4,
        2
    ),
    (
        'Vibração anormal na injetora',
        'Operador relatou vibração excessiva durante operação',
        'corretiva',
        'media',
        'concluida',
        '2026-05-15',
        '2026-05-15 09:10:00',
        '2026-05-15 12:40:00',
        6,
        5
    );

    -- =========================
    -- MANUTENÇÕES EXECUTADAS
    -- TÉCNICO DESCREVE O PROBLEMA REAL
    -- =========================

    INSERT INTO manutencoes
    (descricao_servico, observacoes, id_ordem, id_usuario)
    VALUES
    (
        'Identificado desgaste no rolamento principal do torno. Realizada substituição do rolamento e lubrificação completa do eixo.',
        'Equipamento voltou a operar normalmente após testes',
        1,
        2
    ),
    (
        'Identificada folga excessiva na base do motor da injetora. Realizado reaperto estrutural e balanceamento.',
        'Vibração normalizada após manutenção',
        5,
        5
    );