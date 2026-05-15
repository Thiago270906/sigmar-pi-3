CREATE DATABASE IF NOT EXISTS sigmar;
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
    
    temperatura_limite DECIMAL(5,2),
    vibracao_limite DECIMAL(5,2),
    
    localizacao VARCHAR(150),
    
    ativa BOOLEAN DEFAULT TRUE,
    
    criada_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
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
        'concluida',
        'cancelada'
    ) DEFAULT 'agendada',
    
    data_abertura TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_agendada DATETIME,
    data_conclusao DATETIME,
    
    id_maquina INT NOT NULL,
    id_tecnico INT,
    id_admin INT NOT NULL,
    
    FOREIGN KEY (id_maquina)
        REFERENCES maquinas(id_maquina),
        
    FOREIGN KEY (id_tecnico)
        REFERENCES usuarios(id_usuario),
        
    FOREIGN KEY (id_admin)
        REFERENCES usuarios(id_usuario)
);

-- =========================
-- MANUTENÇÕES EXECUTADAS
-- =========================

CREATE TABLE manutencoes (
    id_manutencao INT AUTO_INCREMENT PRIMARY KEY,
    
    descricao_servico TEXT NOT NULL,
    
    observacoes TEXT,
    
    tempo_parada_minutos INT,
    
    data_execucao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    id_ordem INT NOT NULL,
    id_tecnico INT NOT NULL,
    
    FOREIGN KEY (id_ordem)
        REFERENCES ordens_manutencao(id_ordem),
        
    FOREIGN KEY (id_tecnico)
        REFERENCES usuarios(id_usuario)
);

-- =========================
-- NOTIFICAÇÕES
-- =========================

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

-- =========================
-- HISTÓRICO DAS MÁQUINAS
-- =========================

CREATE TABLE historico_status_maquina (
    id_historico INT AUTO_INCREMENT PRIMARY KEY,
    
    status_anterior VARCHAR(50),
    status_novo VARCHAR(50),
    
    descricao TEXT,
    
    data_alteracao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    id_maquina INT NOT NULL,
    
    FOREIGN KEY (id_maquina)
        REFERENCES maquinas(id_maquina)
);

INSERT INTO usuarios
(nome, email, senha_hash, cargo)
VALUES
(
'Administrador',
'admin@sigmar.com',
'SENHA_HASH_AQUI',
'admin'
);