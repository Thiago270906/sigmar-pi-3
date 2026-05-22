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
        
        descricao VARCHAR(150),
        
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
        
        descricao_servico TEXT NOT NULL,
        
        observacoes TEXT,
        
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

    INSERT INTO usuarios
    (nome, email, senha_hash, cargo)
    VALUES
    (
    'Administrador Tester',
    'admin@sigmar.com',
    '$2y$10$rJLBU0YwQ1dzUasWKWXez.hmoUp4HFm5kZePYg.3830B3Rqf1RaHq',
    'admin'
    );

    INSERT INTO usuarios
    (nome, email, senha_hash, cargo)
    VALUES
    (
    'Técnico Tester',
    'tecnico@sigmar.com',
    '$2y$10$rJLBU0YwQ1dzUasWKWXez.hmoUp4HFm5kZePYg.3830B3Rqf1RaHq',
    'tecnico'
    );