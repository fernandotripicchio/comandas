CREATE TABLE IF NOT EXISTS  `productos` (
 `id` INT( 11 ) NOT NULL AUTO_INCREMENT ,
 `nombre` VARCHAR( 500 ) COLLATE utf8_spanish2_ci NOT NULL ,
 `descripcion` VARCHAR( 500 ) COLLATE utf8_spanish2_ci NOT NULL ,
 `precio_local` DECIMAL COLLATE utf8_spanish2_ci NOT NULL ,
 `precio_normal` DECIMAL COLLATE utf8_spanish2_ci NOT NULL ,
 `active` INT( 2 ) NOT NULL DEFAULT  '1',
PRIMARY KEY (  `id` )
) ENGINE = INNODB DEFAULT CHARSET = utf8 COLLATE = utf8_spanish2_ci