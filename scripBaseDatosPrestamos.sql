CREATE TABLE IF NOT EXISTS `pais` (
`id` int(11) PRIMARY key AUTO_INCREMENT,
  `paisnombre` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `idPais` int(11) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
);


CREATE TABLE IF NOT EXISTS `cliente` (
`id` int(11) PRIMARY key AUTO_INCREMENT ,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `ci` int(11) NOT NULL,
  `expedido` varchar(5) NOT NULL,
  `lugarProcedencia` varchar(30) NOT NULL,
  `genero` varchar(30) NOT NULL,
  `celular` int(11) NOT NULL,
  `celular_ref` int(11) DEFAULT NULL,
  `estadoCivil` varchar(12) DEFAULT NULL,
  `ocupacion` varchar(30) NOT NULL,
  `domicilio` varchar(50) NOT NULL,
  `nit` int(11) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `idPais` int(11),
    FOREIGN key(idPais) REFERENCES pais(id)
);

create table gestion(
    id int PRIMARY key AUTO_INCREMENT,
    fecha_inicio date,
    fecha_fin date,
    estado int
        
);
create table empleado(
id int primary key AUTO_INCREMENT,
    nombre varchar(30),
    apellidos varchar(30),
    cargo varchar(30),
    usuario varchar(50),
    password varchar(30)
   

);
create table tipomeda(
    id int PRIMARY key AUTO_INCREMENT,
    moneda varchar(20),
    bs decimal(9,2),
    deleted_at date
);
create table detalleprestamo(
id int PRIMARY key AUTO_INCREMENT,
  tipoGarantia varchar(50),
  tipoPago int,
deleted_at date

);
create table prestamos(
id int PRIMARY key AUTO_INCREMENT,
    capitalPrestado decimal(9,2),
    fecha timestamp NULL DEFAULT CURRENT_TIMESTAMP,
 	estado char,   
    interes decimal(9,2),
    gananancia decimal(9,2),
    
    idDetallePrestamo int,
    idPadre int,
    idMoneda int,
    idCliente int,
    idEmpleado int,
    
    FOREIGN KEY (idDetallePrestamo) REFERENCES detallePrestamo(id),
   FOREIGN KEY (idMoneda) REFERENCES tipomeda(id),
       FOREIGN KEY (idCliente) REFERENCES cliente(id),

       FOREIGN KEY (idEmpleado) REFERENCES empleado(id),

    deleted_at date

);
create table plandepago(
	id int PRIMARY key AUTO_INCREMENT,
    nroCuota int,
    fechaVencimiento date,
    fechaMensual date,
    totaPagar decimal(9,2),
    idPrestamo int,
    estado char,
    FOREIGN key(idPrestamo) REFERENCES prestamos(id),
        deleted_at date

);
create table cuota(
id int PRIMARY key AUTO_INCREMENT,
    importe decimal(9,2),
    fechaLimite date,
    iva decimal(9,2),
    nroCuota int,
    idPlanPago int,
    mora tinyint,
    FOREIGN key(idPlanPago) REFERENCES plandepago(id)
);
CREATE TABLE IF NOT EXISTS `detallecuota` (
`id` int(11) PRIMARY key AUTO_INCREMENT,
  `monto` decimal(9,2) DEFAULT NULL,
  `idCuota` int(11) DEFAULT NULL,
  `tipoPago` char(4) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` date DEFAULT NULL,
    FOREIGN key(idCuota) REFERENCES cuota(id)
);
CREATE TABLE IF NOT EXISTS `banco` (
`id` int(11) PRIMARY key AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL
);
CREATE TABLE IF NOT EXISTS `cuentabancaria` (
`id` int(11) PRIMARY key AUTO_INCREMENT,
  `nroCuenta` int(11) DEFAULT NULL,
  `idBanco` int(11) DEFAULT NULL,
    tipoCuenta varchar(30),
    moneda varchar(10),
    razonSocial varchar(50),
  `deleted_at` date DEFAULT NULL,
    FOREIGN key(idBanco) REFERENCES banco(id)
);

CREATE TABLE IF NOT EXISTS `transaccionpago` (
`id` int(11) PRIMARY key AUTO_INCREMENT,
  `idPago` int(11) DEFAULT NULL,
  `idBanco` int(11) DEFAULT NULL,
  `idCuenta` int(11) DEFAULT NULL,
  `nroDocumento` int(11) DEFAULT NULL,
  `monto` decimal(9,2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `tipo` char(4) NOT NULL DEFAULT 'i',
  `deleted_at` date DEFAULT NULL,
    FOREIGN key (idPago) REFERENCES detallecuota(id)
);

