DROP TABLE IF EXISTS usuario;

CREATE TABLE usuario (
  idusuario int NOT NULL AUTO_INCREMENT,
  usuario varchar(200) NOT NULL,
  senha varchar(32) NOT NULL,
  nome varchar(100) NOT NULL,
  data_cadastro datetime NOT NULL,
  PRIMARY KEY (idusuario)
) ;


INSERT INTO usuario VALUES (1,'vanessa','e10adc3949ba59abbe56e057f20f883e','vanessa','2023-05-09 15:34:20'),(2,'amanda','e10adc3949ba59abbe56e057f20f883e','amanda','2023-05-09 15:35:14'),(3,'jose','e10adc3949ba59abbe56e057f20f883e','jose','2023-05-09 15:50:46'),(4,'daniel','e10adc3949ba59abbe56e057f20f883e','daniel','2023-05-15 16:35:17'),(5,'Dagmar','e10adc3949ba59abbe56e057f20f883e','Dagmar','2023-05-15 16:47:12'),(6,'Aninha','e10adc3949ba59abbe56e057f20f883e','Aninha','2023-05-15 16:48:22'),(7,'Valeria','e10adc3949ba59abbe56e057f20f883e','Valeria','2023-05-15 16:53:11'),(8,'Maria','e10adc3949ba59abbe56e057f20f883e','Maria','2023-05-15 17:05:08'),(9,'Ana','e10adc3949ba59abbe56e057f20f883e','Ana','2023-05-15 17:07:32'),(10,'Matheus','e10adc3949ba59abbe56e057f20f883e','Matheus','2023-05-15 17:08:28'),(11,'Lucas','e10adc3949ba59abbe56e057f20f883e','Lucas','2023-05-17 17:25:11'),(12,'Celia','e10adc3949ba59abbe56e057f20f883e','Celia','2023-05-17 17:26:36'),(13,'Silvio','e10adc3949ba59abbe56e057f20f883e','Silvio','2023-05-22 16:27:08'),(14,' ','7215ee9c7d9dc229d2921a40e899ec5f',' ','2023-05-29 16:27:44');

DROP TABLE IF EXISTS mensagens;

CREATE TABLE mensagens (
  id int NOT NULL AUTO_INCREMENT,
  Mensagem varchar(500) NOT NULL,
  data datetime NOT NULL,
  nome varchar(100) DEFAULT NULL,
  PRIMARY KEY (id),
  CONSTRAINT id FOREIGN KEY (id) REFERENCES usuario (idusuario) ON DELETE CASCADE ON UPDATE CASCADE
) ;

INSERT INTO mensagens VALUES (1,'ola','2023-05-05 15:23:17','vanessa'),(2,'hello world','2023-05-18 16:49:28',''),(3,'Olá seu site esta incrível!!!','2023-05-18 16:50:00',''),(4,'Teste','2023-05-19 19:21:53',''),(5,'Hola tudo bom','2023-05-29 15:29:26','daniel'),(6,'Obras bonitas','2023-05-29 16:08:10','daniel');

