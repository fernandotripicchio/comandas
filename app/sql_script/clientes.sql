CREATE TABLE IF NOT EXISTS  `clientes` (
 `id` INT( 11 ) NOT NULL AUTO_INCREMENT ,
 `nombre` VARCHAR( 500 ) COLLATE utf8_spanish2_ci ,
 `direccion` VARCHAR( 200 ) COLLATE utf8_spanish2_ci  ,
 `telefono` VARCHAR ( 20 ) COLLATE utf8_spanish2_ci  ,
 `observaciones` VARCHAR ( 300 ) COLLATE utf8_spanish2_ci  ,
 `active` INT( 2 ) NOT NULL DEFAULT  '1',
PRIMARY KEY (  `id` )
) ENGINE = INNODB DEFAULT CHARSET = utf8 COLLATE = utf8_spanish2_ci