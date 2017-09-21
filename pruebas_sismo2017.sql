use id2987913_sismo2017acopios;

INSERT INTO centro_acopio (Nombre, Calle, Colonia, Numero, CodigoPostal, Zona, Estado, Telefono, Contacto, Horarios, TipoCentro, URLMapa) 
VALUES ( 'Centro de Prueba 1', 'Calle de Prueba 1', 'Colonia de Prueba 1', 1, 1, 'Ecatepec', 'Estado de Mexico', '5548662066', 'Señor 1', '10 a 10', 'Cruz roja', 'https://www.google.com/maps/dir/37.3621424,-120.4241858//@37.3671052,-120.4184781,15z');

INSERT INTO centro_acopio (Nombre, Calle, Colonia, Numero, CodigoPostal, Zona, Estado, Telefono, Contacto, Horarios, TipoCentro, URLMapa) 
VALUES ( 'Centro de Prueba 2', 'Calle de Prueba 2', 'Colonia de Prueba 2', 1, 1, 'Mordor', 'CDMX', '5548662067', 'Señor 2', '10 a 10', 'Cruz roja', 'https://www.google.com/maps/dir/37.3621424,-120.4241858//@37.3671052,-120.4184781,15z');


INSERT INTO articulos (centro_acopio_id, Nombre, Cantidad, Prioridad, Categoria) VALUES ( 1, 'Pilas', 20, 0, 'Misc');
INSERT INTO articulos (centro_acopio_id, Nombre, Cantidad, Prioridad, Categoria) VALUES ( 1, 'Leche', 20, 0, 'Misc');
INSERT INTO articulos (centro_acopio_id, Nombre, Cantidad, Prioridad, Categoria) VALUES ( 1, 'Pañales', 20, 5, 'Misc');
INSERT INTO articulos (centro_acopio_id, Nombre, Cantidad, Prioridad, Categoria) VALUES ( 1, 'Sopa', 20, 2, 'Misc');
INSERT INTO articulos (centro_acopio_id, Nombre, Cantidad, Prioridad, Categoria) VALUES ( 1, 'Jabon', 20, 3, 'Misc');
INSERT INTO articulos (centro_acopio_id, Nombre, Cantidad, Prioridad, Categoria) VALUES ( 1, 'Sabanas', 20, 1, 'Misc');
INSERT INTO articulos (centro_acopio_id, Nombre, Cantidad, Prioridad, Categoria) VALUES ( 2, 'Pilas', 20, 0, 'Misc');
INSERT INTO articulos (centro_acopio_id, Nombre, Cantidad, Prioridad, Categoria) VALUES ( 2, 'Leche', 20, 0, 'Misc');
INSERT INTO articulos (centro_acopio_id, Nombre, Cantidad, Prioridad, Categoria) VALUES ( 2, 'Pañales', 20, 5, 'Misc');
INSERT INTO articulos (centro_acopio_id, Nombre, Cantidad, Prioridad, Categoria) VALUES ( 1, 'Sopa', 20, 2, 'Misc');
INSERT INTO articulos (centro_acopio_id, Nombre, Cantidad, Prioridad, Categoria) VALUES ( 2, 'Jabon', 20, 3, 'Misc');
INSERT INTO articulos (centro_acopio_id, Nombre, Cantidad, Prioridad, Categoria) VALUES ( 2, 'Sabanas', 20, 1, 'Misc');

INSERT INTO usuarios (username, pass, centroAcopioId) VALUES ('acopios', 'acopios', 1);
