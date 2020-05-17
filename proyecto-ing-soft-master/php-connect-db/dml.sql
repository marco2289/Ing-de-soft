INSERT INTO TBL_GENEROS(GENERO,ABREVIATURA) VALUES ('Masculino','M');
INSERT INTO TBL_GENEROS(GENERO,ABREVIATURA) VALUES ('Femenino','F');
INSERT INTO TBL_GENEROS(GENERO,ABREVIATURA) VALUES ('Otro','O');


INSERT INTO TBL_ESTADO_CIVIL(ESTADO_CIVIL,ABREV_ESTADO_CIVIL) VALUES ('Soltero','S');
INSERT INTO TBL_ESTADO_CIVIL(ESTADO_CIVIL,ABREV_ESTADO_CIVIL) VALUES ('Casado','C');
INSERT INTO TBL_ESTADO_CIVIL(ESTADO_CIVIL,ABREV_ESTADO_CIVIL) VALUES ('Divorciado','D');
INSERT INTO TBL_ESTADO_CIVIL(ESTADO_CIVIL,ABREV_ESTADO_CIVIL) VALUES ('Viudo','V');
INSERT INTO TBL_ESTADO_CIVIL(ESTADO_CIVIL,ABREV_ESTADO_CIVIL) VALUES ('Otro','O');

INSERT INTO TBL_ESTATUS_EMPLEADO(STATUS,DESCRIPCION_ESTATUS) VALUES ('Contratado','El empleado labora actualmente en la empresa sin ningun problema con un sueldo fijo.');
INSERT INTO TBL_ESTATUS_EMPLEADO(STATUS,DESCRIPCION_ESTATUS) VALUES ('Ausente','Empleado que labora en la empresa y tiene sueldo pero no se encuentra laborando debido a problemas personales o laborales en el aspecto de capacitacion');
INSERT INTO TBL_ESTATUS_EMPLEADO(STATUS,DESCRIPCION_ESTATUS) VALUES ('Despedido','Empleado que no va a laborar mas en dicha empresa por algun problema.');


INSERT INTO TBL_TITULACIONES (TITULACION , DESCRIPCION) VALUES ('Certificacion Tecnica','Persona con conocimientos aquiridos en una academia y que como prueba de ello cuenta con un titulo');
INSERT INTO TBL_TITULACIONES (TITULACION , DESCRIPCION) VALUES ('Conocimiento Empirico','Persona que a recibido mentoria de personas profesionales o afines al campo pero no tiene un titulo que lo valide como especialista');
INSERT INTO TBL_TITULACIONES (TITULACION , DESCRIPCION) VALUES ('Lic Administracion','Persona titulada y por ende certificada para dirigir la empresa');
INSERT INTO TBL_TITULACIONES (TITULACION , DESCRIPCION) VALUES ('Titulacion Universitaria','Persona que cuenta con conocimiento universitario y esta validado por un titulo para ejercer el trabajo en el area de electronicos');


INSERT INTO TBL_SUCURSALES (NOMBRE_SUCURSAL,DIRECCION_SUCURSAL,TELEFONO_SUCURSAL,FAX_SUCURSAL,CORREO_SUCURSAL,FECHA_CREACION_SUCURSAL) VALUES 
('Sucursal 1','Direccion 1','2777-77-77',NULL,'sucursal1@gmail.com',NOW());
INSERT INTO TBL_SUCURSALES (NOMBRE_SUCURSAL,DIRECCION_SUCURSAL,TELEFONO_SUCURSAL,FAX_SUCURSAL,CORREO_SUCURSAL,FECHA_CREACION_SUCURSAL) VALUES 
('Sucursal 2','Direccion 2','2777-77-77',NULL,'sucursal2@gmail.com',NOW());
INSERT INTO TBL_SUCURSALES (NOMBRE_SUCURSAL,DIRECCION_SUCURSAL,TELEFONO_SUCURSAL,FAX_SUCURSAL,CORREO_SUCURSAL,FECHA_CREACION_SUCURSAL) VALUES 
('Sucursal 3','Direccion 3','277-77-77',NULL,'sucursal3@gmail.com',NOW());

INSERT INTO TBL_CARGO_EMPLEADO(DESCRIPCION_CARGO_EMPLEADO,REQUISITOS_CARGO_EMPLEADO) VALUES ('Usuario Autentificado','Empleado que solo puede realizar operaciones basicas como introducir una reparacion o compra, inicio de sesion y cambio de contraseña');
INSERT INTO TBL_CARGO_EMPLEADO(DESCRIPCION_CARGO_EMPLEADO,REQUISITOS_CARGO_EMPLEADO) VALUES ('Administrador','Empleado que Tiene acceso global al sistema comprobar y tomar acciones sobre los demas usuarios , control de inventarios entre otros');



INSERT INTO TBL_TIPO_NOTIFICACION (TIPO_NOTIFICACION,DESCRIPCION_TIPO_NOTIF) VALUES ('Insercion Cliente','Aqui es Cuando el Administrador o Usuario Autentificado realiza el trabajo de reparacion o compra de electronicos de dicho cliente en la base de datos'); 

INSERT INTO TBL_TIPO_BITACORA (BITACORA,DESCRIPCION) VALUES ('Inicio Sesion','Cada vez que un empleado inicia sesion en el sistema queda como comprobacion el tipo de accion que hizo en este caso login');
INSERT INTO TBL_TIPO_BITACORA (BITACORA,DESCRIPCION) VALUES ('Cierre Sesion','Cada vez que un empleado cierra sesion en el sistema queda como comprobacion el tipo de accion que hizo en este caso log out');
INSERT INTO TBL_TIPO_BITACORA (BITACORA,DESCRIPCION) VALUES ('Venta','Cada vez que un empleado realiza una venta de electronico o servicio en el sistema queda como comprobacion el tipo de accion que hizo en este caso Venta de Electronico');
INSERT INTO TBL_TIPO_BITACORA (BITACORA,DESCRIPCION) VALUES ('Compra','Cada vez que un empleado realiza una compra en el sistema queda como comprobacion el tipo de accion que hizo en este caso Compra de electronico');
INSERt INTO tbl_tipo_bitacora (BITACORA,DESCRIPCION) VALUES ('Creacion Cuenta','Cuando el Administrador inserta un nuevo empleado queda guardado en la tabla la accion que realizo');
INSERT INTO TBL_TIPO_BITACORA (BITACORA,DESCRIPCION) values ("Cambio Clave","El Empleado realizo un cambio de clave, dicho cambio queda registrado en la base de datos");
INSERT INTO TBL_TIPO_BITACORA (BITACORA,DESCRIPCION) values ("Cambio Correo","El Empleado realizo un cambio de correo, dicho cambio queda registrado en la base de datos");
INSERT INTO TBL_TIPO_BITACORA (BITACORA,DESCRIPCION) VALUES ("Cambio Estatus","Se cambio el estatus de un actual empleado, sea para moverlo a otra sucursal o bien para ausentarlo, despedirlo o volverlo a poner en funcion de sus labores");
INSERT INTO TBL_TIPO_BITACORA (BITACORA,DESCRIPCION) VALUES ("Cambio Privilegios","Se le asigno un nuevo cargo a un empleado como gerente, administrador etc");
INSERT INTO TBL_TIPO_BITACORA (BITACORA,DESCRIPCION) VALUES ("Insercion Sucursal","Se agrego y almaceno una nueva sucursal a la base de datos donde puede trabajar nuevos empleados");
INSERT INTO TBL_TIPO_BITACORA (BITACORA,DESCRIPCION) VALUES ("Insercion Proveedor","Se agrego y almaceno un nuevo proveedor a la base de datos");
INSERT INTO TBL_TIPO_BITACORA (BITACORA,DESCRIPCION) VALUES ("Inactivacion Proveedor","Se desabilita el proveedor");
INSERT INTO TBL_TIPO_BITACORA (BITACORA,DESCRIPCION) VALUES ("Activacion Proveedor","Se habilita el proveedor");
INSERT INTO TBL_TIPO_BITACORA (BITACORA,DESCRIPCION) VALUES ("Inactivacion Sucursal","Se desabilita la sucursal");
INSERT INTO TBL_TIPO_BITACORA (BITACORA,DESCRIPCION) VALUES ("Activacion Sucursal","Se habilita la sucursal");