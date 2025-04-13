-- db_mysql_docker.auth definition

CREATE TABLE `auth` (
  `id` int NOT NULL AUTO_INCREMENT,
  `token` varchar(100) DEFAULT NULL,
  `session_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `time_session` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- db_mysql_docker.cadastro definition

CREATE TABLE `cadastro` (
  `nome` varchar(100) DEFAULT NULL,
  `telefone` varchar(12) DEFAULT NULL,
  `nome_arquivo` varchar(100) DEFAULT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  UNIQUE KEY `cadastro_unique` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;