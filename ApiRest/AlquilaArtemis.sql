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
    Producto_ID PRIMARY KEY INT AUTO_INCREMENT,
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
        Cliente_ID PRIMARY KEY INT AUTO_INCREMENT, 
        CompanyName VARCHAR(60) NOT NULL, 
        Telefono VARCHAR(60) NOT NULL,
        Email VARCHAR(60) NOT NULL
    );

CREATE TABLE
    Empleado(
        Empleado_ID PRIMARY KEY INT AUTO_INCREMENT, 
        Empleado_nombre VARCHAR(60) NOT NULL, 
        Email VARCHAR(60) NOT NULL, 
        Telefono VARCHAR(60) NOT NULL,
    );

CREATE Cotizacion(
    Cotizacion_ID PRIMARY KEY INT AUTO_INCREMENT 
    Cotizacion_fecha DATE NOT NULL,
    ClienteCoti INT NOT NULL,
    ProductoCoti INT NOT NULL,
    PrecioCoti INT NOT NULL,
    ObraCoti INT NOT NULL,
    FOREIGN KEY (ClienteCoti) REFERENCES Cliente(Cliente_ID),
    FOREIGN KEY (ProductoCoti) REFERENCES Producto(Producto_ID),
    FOREIGN KEY (ObraCoti) REFERENCES Obra(Obra_ID)
);

/*vistas salidas entradas inventario li */