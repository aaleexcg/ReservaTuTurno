CREATE TABLE negocio (
    id_negocio INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    creado_en DATETIME DEFAULT NOW(),
    actualizado_en DATETIME DEFAULT NOW()
);

INSERT INTO negocio (nombre, descripcion)
VALUES ('Peluquería', 'Servicios de corte, tinte y barbería');
