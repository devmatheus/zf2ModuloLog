CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registro_id` varchar(45) COLLATE utf8_unicode_ci NULL,
  `acao` int(1) NOT NULL,
  `usuario_id` int(11) NULL,
  `registro_antigo` longblob NULL,
  `registro_novo` longblob NULL,
  `formulario_recebido` longblob NULL,
  `data_hora` datetime NOT NULL,
  `entity` varchar(45) COLLATE utf8_unicode_ci NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;