CREATE TABLE empresa (
    id_empresa INT PRIMARY KEY AUTO_INCREMENT,
    razaosocial VARCHAR(255) NOT NULL,
    nome_fantasia VARCHAR(255) NOT NULL,
    cnpj VARCHAR(14) NOT NULL UNIQUE
) ENGINE = InnoDB;

CREATE TABLE setor (
    id_setor INT PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(255) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE empresa_setor (
    id_empresa INT,
    id_setor INT,
    PRIMARY KEY (id_empresa, id_setor),
    FOREIGN KEY (id_empresa) REFERENCES empresa(id_empresa) ON DELETE CASCADE,
    FOREIGN KEY (id_setor) REFERENCES setor(id_setor) ON DELETE CASCADE
) ENGINE = InnoDB;
