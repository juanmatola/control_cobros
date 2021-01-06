CREATE TABLE clientes (
    id          INT AUTO_INCREMENT,
    nombre      VARCHAR(50) NOT NULL,
    telefono    INT NOT NULL,
    email       VARCHAR(50),
    web         VARCHAR(50),
    abono       CHAR(2) NOT NULL,
    CONSTRAINT pk_usuarios PRIMARY KEY(id) 
);

CREATE TABLE cobros (
    id          INT AUTO_INCREMENT,
    cliente_id  INT NOT NULL,
    monto    INT NOT NULL,
    fecha DATE NOT NULL,
    CONSTRAINT pk_cobros PRIMARY KEY(id),
    CONSTRAINT fk_cobro_cliente FOREIGN KEY(cliente_id) REFERENCES clientes(id)
);