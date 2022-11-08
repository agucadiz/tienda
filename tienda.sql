DROP TABLE IF EXISTS articulos CASCADE;

CREATE TABLE articulos (
    id          bigserial       PRIMARY KEY,
    codigo      varchar(13)     NOT NULL UNIQUE,
    descripcion varchar(255)    NOT NULL,
    precio      numeric(7, 2)   NOT NULL
);

--Carga inicial de datos de prueba:

INSERT INTO articulos (codigo, descripcion, precio)
VALUES ('2138972198', 'Yogurt piña', 200.50),
       ('4324324324', 'Bollicao', 50.10),
       ('3243243243', 'PC', 1001.10),
       ('3444324113', 'ratón', 191.10);