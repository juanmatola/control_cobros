CREATE TABLE abonos (
    id          INT AUTO_INCREMENT,
    nombre      varchar(50) NOT NULL,
    monto       INT NOT NULL,
    CONSTRAINT pk_abonos PRIMARY KEY(id)
);

CREATE TABLE clientes (
    id          INT AUTO_INCREMENT,
    abono_id    INT,
    nombre      VARCHAR(50) NOT NULL,
    telefono    INT NOT NULL,
    email       VARCHAR(50),
    web         VARCHAR(50),
    fecha       TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT pk_clientes PRIMARY KEY(id),
    CONSTRAINT fk_cliente_abono FOREIGN KEY(abono_id) REFERENCES abonos(id) 
);

CREATE TABLE cobros (
    id          INT AUTO_INCREMENT,
    cliente_id  INT NOT NULL,
    abono_id    INT,
    monto       INT NOT NULL,
    fecha       TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT pk_cobros PRIMARY KEY(id),
    CONSTRAINT fk_cobro_cliente FOREIGN KEY(cliente_id) REFERENCES clientes(id),
    CONSTRAINT fk_cobro_abono FOREIGN KEY(abono_id) REFERENCES abonos(id)
);