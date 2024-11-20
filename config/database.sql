-- Crear tabla Usuario
CREATE TABLE Usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(50) NOT NULL,
    Apellido VARCHAR(50) NOT NULL,
    Nacionalidad VARCHAR(50),
    Contrasena VARCHAR(255) NOT NULL,
    Correo VARCHAR(100) NOT NULL UNIQUE,
    Residencia VARCHAR(100),
    Telefono VARCHAR(20)
);

-- Crear tabla Paquete
CREATE TABLE Paquete (
    id_paquete INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(50) NOT NULL,
    Descripcion TEXT,
    Destino VARCHAR(100),
    Precio DECIMAL(10, 2),
    Foto VARCHAR(255),
    Fecha_inicio DATE,
    Fecha_final DATE,
    itinerario TEXT
);

-- Crear tabla Viajes
CREATE TABLE Viajes (
    id_viajes INT AUTO_INCREMENT PRIMARY KEY,
    Estado VARCHAR(20),
    Fecha_inicio DATE,
    Fecha_final DATE,
    Visa BOOLEAN,
    id_usuario INT NOT NULL,
    id_paquete INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario) ON DELETE CASCADE,
    FOREIGN KEY (id_paquete) REFERENCES Paquete(id_paquete) ON DELETE CASCADE
);

-- Crear tabla Servicio
CREATE TABLE Servicio (
    id_servicio INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(50) NOT NULL
);

-- Crear tabla intermedia entre Paquete y Servicio para relación N:M
CREATE TABLE Paquete_Servicio (
    id_paquete INT NOT NULL,
    id_servicio INT NOT NULL,
    PRIMARY KEY (id_paquete, id_servicio),
    FOREIGN KEY (id_paquete) REFERENCES Paquete(id_paquete) ON DELETE CASCADE,
    FOREIGN KEY (id_servicio) REFERENCES Servicio(id_servicio) ON DELETE CASCADE
);

CREATE TABLE Administrador (
    id_admin INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(50) NOT NULL UNIQUE,
    contrasena VARCHAR(255) NOT NULL
);
