CREATE DATABASE AlquilerCollab;

USE AlquilerCollab;

/* tablas del alquiler de entrada y salida */

CREATE TABLE
    Salida(
        Salida_ID PRIMARY KEY INT AUTO_INCREMENT,
        cliente_id INT NOT NULL,
        fecha_salida DATE NOT NULL,
        hora_salida TIME NOT NULL,
        subtotalPeso VARCHAR(60) NOT NULL,
        empleado_id INT NOT NULL,
        placatransporte VARCHAR(60) NOT NULL,
        observaciones VARCHAR(500) NOT NULL,
        Foreign Key (cliente_id) REFERENCES Cliente(Cliente_ID),
        Foreign Key (empleado_id) REFERENCES Empleado(Empleado_ID)
    );

CREATE TABLE
    SalidaDetalle(
        SalidaDetalle_ID PRIMARY KEY INT AUTO_INCREMENT,
        salida_id INT NOT NULL,
        producto_id INT NOT NULL,
        obra_id INT NOT NULL,
        cantidad_salida INT NOT NULL,
        cantidad_propia INT NOT NULL,
        cantidad_subalquilada INT NOT NULL,
        valorUnidad FLOAT NOT NULL,
        fecha_standby DATE NOT NULL,
        estado VARCHAR(60) NOT NULL,
        FOREIGN KEY (salida_id) REFERENCES Salida(Salida_ID),
        FOREIGN KEY (producto_id) REFERENCES Producto(Producto_ID),
        FOREIGN KEY (obra_id) REFERENCES Obra(Obra_ID),
    );

CREATE TABLE
    Entrada(
        Entrada_ID PRIMARY KEY INT AUTO_INCREMENT,
        salida_id INT NOT NULL,
        empleado_id INT NOT NULL,
        cliente_id INT NOT NULL,
        fecha_entrada DATE NOT NULL,
        hora_entrada TIME NOT NULL,
        observaciones VARCHAR(500) NOT NULL,
        FOREIGN KEY (salida_id) REFERENCES Salida(Salida_ID),
        FOREIGN KEY (empleado_id) REFERENCES Empleado(Empleado_ID),
        FOREIGN KEY (cliente_id) REFERENCES Cliente(Cliente_ID)

    );

CREATE TABLE
    EntradaDetalle(
        EntradaDetalle_ID PRIMARY KEY INT AUTO_INCREMENT,
        producto_id INT NOT NULL,
        obra_id INT NOT NULL,
        entrada_cantidad INT NOT NULL,
        entrada_cantidad_propia INT NOT NULL,
        entrada_cantidad_subalquilada INT NOT NULL,
        estado VARCHAR(50) NOT NULL,
        FOREIGN KEY (producto_id) REFERENCES Producto(Producto_ID),
        FOREIGN KEY (obra_id) REFERENCES Obra(Obra_ID)
    );

CREATE TABLE
    Inventario(
        Inventario_ID PRIMARY KEY INT AUTO_INCREMENT,
        producto_id INT NOT NULL,
        CantidadInicial INT NOT NULL,
        CantidadIngresos FLOAT NOT NULL,
        CantidadSalidas INT NOT NULL,
        CantidadFinal INT NOT NULL,
        FechaInventario DATE NOT NULL,
        TipoOperacion VARCHAR(50) NOT NULL
    );
CREATE TABLE Productos(
Producto_ID INT PRIMARY KEY AUTO_INCREMENT, 
    Producto_nombre VARCHAR(60) NOT NULL,
    Producto_descripcion VARCHAR(500) NOT NULL,
    Producto_precio FLOAT NOT NULL,
    Producto_stock INT NOT NULL
);
CREATE TABLE
    Usuario(
        Usuario_ID PRIMARY KEY INT AUTO_INCREMENT,
        Empleado_ID INT NOT NULL,
        Email VARCHAR(60) NOT NULL,
        Contraseña VARCHAR(60) NOT NULL,
        KEYGEN INT NOT NULL,
        FOREIGN KEY (Empleado_ID) REFERENCES Empleado(Empleado_ID)
    );

CREATE TABLE
    Cliente(
Cliente_ID INT PRIMARY KEY AUTO_INCREMENT, 
        CompanyName VARCHAR(60) NOT NULL, 
        Telefono VARCHAR(60) NOT NULL,
        Email VARCHAR(60) NOT NULL
    );

CREATE TABLE
    Empleado(
        Empleado_ID INT PRIMARY KEY AUTO_INCREMENT,
        Empleado_nombre VARCHAR(60) NOT NULL, 
        Email VARCHAR(60) NOT NULL, 
Telefono VARCHAR(60) NOT NULL );

CREATE Cotizacion(
Cotizacion_ID INT PRIMARY KEY AUTO_INCREMENT , 
    Cotizacion_fecha DATE NOT NULL,
    ClienteCoti INT NOT NULL,
    ProductoCoti INT NOT NULL,
    PrecioCoti BIGINT NOT NULL,
    ObraCoti INT NOT NULL,
    FOREIGN KEY (ClienteCoti) REFERENCES Cliente(Cliente_ID),
    FOREIGN KEY (ProductoCoti) REFERENCES Producto(Producto_ID),
    FOREIGN KEY (ObraCoti) REFERENCES Obra(Obra_ID)
);

CREATE TABLE Obras(
Obra_ID INT PRIMARY KEY AUTO_INCREMENT,
Obra_nombre VARCHAR(60) NOT NULL,
ClienteObra INT NOT NULL,
FOREIGN KEY (ClienteObra) REFERENCES Cliente(Cliente_ID)    
);
#Clientes Datos
#Clientes Datos
#Clientes Datos
INSERT INTO Cliente (CompanyName, Telefono, Email)
VALUES (
        'Acme Corporation',
        '555-1234',
        'info@acme.com'
    ), (
        'Globex Industries',
        '555-5678',
        'info@globex.com'
    ), (
        'Initech',
        '555-9012',
        'info@initech.com'
    ), (
        'Wayne Enterprises',
        '555-3456',
        'info@wayneent.com'
    ), (
        'Umbrella Corporation',
        '555-7890',
        'info@umbrellacorp.com'
    ), (
        'Stark Industries',
        '555-2345',
        'info@starkind.com'
    ), (
        'Gekko & Co',
        '555-6789',
        'info@gekkoandco.com'
    ), (
        'Weyland-Yutani Corporation',
        '555-0123',
        'info@weylandyutani.com'
    ), (
        'Cyberdyne Systems',
        '555-4567',
        'info@cyberdynesys.com'
    ), (
        'Spacely Sprockets',
        '555-8901',
        'info@spacelysprockets.com'
    );
#Empleado Datos#Empleado Datos
#Empleado Datos#Empleado Datos
#Empleado Datos#Empleado Datos
INSERT INTO Empleado (Empleado_nombre , Email, Telefono)
VALUES
  ('John Smith', 'johnsmith@example.com', CONCAT('555-', FLOOR(RAND()*1000), '-', FLOOR(RAND()*10000))),
  ('Jane Doe', 'janedoe@example.com', CONCAT('555-', FLOOR(RAND()*1000), '-', FLOOR(RAND()*10000))),
  ('Bob Johnson', 'bjohnson@example.com', CONCAT('555-', FLOOR(RAND()*1000), '-', FLOOR(RAND()*10000))),
  ('Lisa Williams', 'lwilliams@example.com', CONCAT('555-', FLOOR(RAND()*1000), '-', FLOOR(RAND()*10000))),
  ('Mike Brown', 'mbrown@example.com', CONCAT('555-', FLOOR(RAND()*1000), '-', FLOOR(RAND()*10000))),
  ('Sarah Lee', 'slee@example.com', CONCAT('555-', FLOOR(RAND()*1000), '-', FLOOR(RAND()*10000))),
  ('David Lee', 'dlee@example.com', CONCAT('555-', FLOOR(RAND()*1000), '-', FLOOR(RAND()*10000))),
  ('Karen Davis', 'kdavis@example.com', CONCAT('555-', FLOOR(RAND()*1000), '-', FLOOR(RAND()*10000))),
  ('Tom Wilson', 'twilson@example.com', CONCAT('555-', FLOOR(RAND()*1000), '-', FLOOR(RAND()*10000))),
  ('Amy Johnson', 'ajohnson@example.com', CONCAT('555-', FLOOR(RAND()*1000), '-', FLOOR(RAND()*10000)));
#Productos Datos
#Productos Datos
#Productos Datos
INSERT INTO productos (Producto_nombre, Producto_descripcion, Producto_precio, Producto_stock)
VALUES
  ('iPhone 12', 'Apple smartphone with A14 Bionic chip and dual-camera system.', 999.99, 50),
  ('Samsung Galaxy S21', 'Android flagship phone with Exynos 2100 processor and 5G support.', 899.99, 100),
  ('Sony WH-1000XM4', 'Wireless noise-canceling headphones with excellent sound quality.', 349.99, 75),
  ('Dell XPS 13', 'Ultra-thin laptop with Intel Core i7 processor and InfinityEdge display.', 1299.99, 200),
  ('Nintendo Switch', 'Hybrid gaming console for handheld and TV play.', 299.99, 150),
  ('Canon EOS R6', 'Mirrorless camera with 20.1MP full-frame sensor and 4K video recording.', 2499.99, 120),
  ('Bose QuietComfort 35 II', 'Premium wireless headphones with active noise cancellation.', 299.99, 80),
  ('LG OLED CX', '55-inch 4K OLED TV with HDR, Dolby Vision, and webOS.', 1499.99, 250),
  ('Fitbit Charge 4', 'Fitness tracker with heart rate monitoring, built-in GPS, and sleep tracking.', 149.99, 90),
  ('Amazon Echo Dot', 'Smart speaker with Alexa voice control and compact design.', 49.99, 110);
INSERT INTO Obras (Obra_nombre, ClienteObra)
VALUES
  ('Project Alpha', 1),
  ('Building Renovation', 2),
  ('Infrastructure Development', 3),
  ('Bridge Construction', 4),
  ('Residential Complex', 5),
  ('Commercial Tower', 6),
  ('Highway Expansion', 7),
  ('Park Redevelopment', 8),
  ('School Construction', 9),
  ('Hospital Renovation', 10);


/*vistas salidas entradas inventario li */