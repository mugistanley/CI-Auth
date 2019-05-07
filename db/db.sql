CREATE DATABASE ci_auth;

USE ci_auth;

CREATE TABLE IF NOT EXISTS user (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(128) DEFAULT NULL,
  password varchar(128) DEFAULT NULL,
  salt varchar(128) DEFAULT NULL,
  role tinyint(2) NOT NULL DEFAULT '2',
  lastLogin datetime DEFAULT '0000-00-00 00:00:00',
  createdOn datetime DEFAULT NULL,
  lastModified datetime DEFAULT NULL,
  PRIMARY KEY (id)
);

INSERT INTO user (id, username, password, salt, role, lastLogin, createdOn, lastModified) VALUES
(1, 'admin', '71189f9379e8e9e0ae2ed434e6abe17cb924ba31', '8527974635af01663274712.44306103', 1 , '0000-00-00 00:00:00', '2018-05-07 12:03:31', '0000-00-00 00:00:00');