CREATE DATABASE brinquedos_db
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE brinquedos_db;

CREATE TABLE IF NOT EXISTS brinquedos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    categoria VARCHAR(150) NOT NULL,
    faixa_etaria INT NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    quantidade_estoque INT NOT NULL
);
