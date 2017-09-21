use id2987913_sismo2017acopios;

INSERT INTO centro_acopio (Nombre, Calle, Colonia, Numero, CodigoPostal, Del_Municipio, Estado, URLMapa) VALUES ( 'Centro de Prueba 1', 'Calle de Prueba 1', 'Colonia de Prueba 1', 1, 1, 'Ecatepec', 'Estado de Mexico', 'https://www.google.com/maps/dir/37.3621424,-120.4241858//@37.3671052,-120.4184781,15z');
INSERT INTO centro_acopio (Nombre, Calle, Colonia, Numero, CodigoPostal, Del_Municipio, Estado, URLMapa) VALUES ( 'Centro de Prueba 2', 'Calle de Prueba 2', 'Colonia de Prueba 2', 2, 2, 'GAM', 'Ciudad de Mexico', 'https://www.google.com/maps/dir/37.3621424,-120.4241858//@37.3671052,-120.4184781,15z');
INSERT INTO centro_acopio (Nombre, Calle, Colonia, Numero, CodigoPostal, Del_Municipio, Estado, URLMapa) VALUES ( 'Centro de Prueba 3', 'Calle de Prueba 3', 'Colonia de Prueba 3', 3, 3, 'Cuahutemoc', 'Ciudad de Mexico', 'https://www.google.com/maps/dir/37.3621424,-120.4241858//@37.3671052,-120.4184781,15z');
INSERT INTO centro_acopio (Nombre, Calle, Colonia, Numero, CodigoPostal, Del_Municipio, Estado, URLMapa) VALUES ( 'Centro de Prueba 4', 'Calle de Prueba 4', 'Colonia de Prueba 4', 4, 4, 'Acoxpa', 'Puebla', 'https://www.google.com/maps/dir/37.3621424,-120.4241858//@37.3671052,-120.4184781,15z');

INSERT INTO articulos (centro_acopio_id, Nombre, Cantidad, Prioridad, Categoria) VALUES ( 1, 'Pilas', 20, 0, 'Misc');
INSERT INTO articulos (centro_acopio_id, Nombre, Cantidad, Prioridad, Categoria) VALUES ( 1, 'Leche', 20, 0, 'Misc');
INSERT INTO articulos (centro_acopio_id, Nombre, Cantidad, Prioridad, Categoria) VALUES ( 1, 'Pañales', 20, 5, 'Misc');
INSERT INTO articulos (centro_acopio_id, Nombre, Cantidad, Prioridad, Categoria) VALUES ( 1, 'Sopa', 20, 2, 'Misc');
INSERT INTO articulos (centro_acopio_id, Nombre, Cantidad, Prioridad, Categoria) VALUES ( 1, 'Jabon', 20, 3, 'Misc');
INSERT INTO articulos (centro_acopio_id, Nombre, Cantidad, Prioridad, Categoria) VALUES ( 1, 'Sabanas', 20, 1, 'Misc');
INSERT INTO articulos (centro_acopio_id, Nombre, Cantidad, Prioridad, Categoria) VALUES ( 2, 'Pilas', 20, 0, 'Misc');
INSERT INTO articulos (centro_acopio_id, Nombre, Cantidad, Prioridad, Categoria) VALUES ( 3, 'Leche', 20, 0, 'Misc');
INSERT INTO articulos (centro_acopio_id, Nombre, Cantidad, Prioridad, Categoria) VALUES ( 4, 'Pañales', 20, 5, 'Misc');
INSERT INTO articulos (centro_acopio_id, Nombre, Cantidad, Prioridad, Categoria) VALUES ( 1, 'Sopa', 20, 2, 'Misc');
INSERT INTO articulos (centro_acopio_id, Nombre, Cantidad, Prioridad, Categoria) VALUES ( 2, 'Jabon', 20, 3, 'Misc');
INSERT INTO articulos (centro_acopio_id, Nombre, Cantidad, Prioridad, Categoria) VALUES ( 3, 'Sabanas', 20, 1, 'Misc');

INSERT INTO usuarios (username, pass, centroAcopioId) VALUES ('acopios', 'acopios', 1);
