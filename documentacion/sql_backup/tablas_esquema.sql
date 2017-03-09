CREATE TABLE migrations
(
    migration VARCHAR(255) NOT NULL,
    batch INT(11) NOT NULL
);
CREATE TABLE password_resets
(
    email VARCHAR(255) NOT NULL,
    token VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
);
CREATE INDEX password_resets_email_index ON password_resets (email);
CREATE INDEX password_resets_token_index ON password_resets (token);
CREATE TABLE users
(
    id INT(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    remember_token VARCHAR(100)
);
CREATE UNIQUE INDEX users_email_unique ON users (email);
CREATE TABLE roles
(
    id INT(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL,
    description VARCHAR(255),
    level INT(11) DEFAULT '1' NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
CREATE UNIQUE INDEX roles_slug_unique ON roles (slug);
CREATE TABLE permission_role
(
    id INT(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    permission_id INT(10) unsigned NOT NULL,
    role_id INT(10) unsigned NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    CONSTRAINT permission_role_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES permissions (id) ON DELETE CASCADE,
    CONSTRAINT permission_role_role_id_foreign FOREIGN KEY (role_id) REFERENCES roles (id) ON DELETE CASCADE
);
CREATE INDEX permission_role_permission_id_index ON permission_role (permission_id);
CREATE INDEX permission_role_role_id_index ON permission_role (role_id);
CREATE TABLE permission_user
(
    id INT(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    permission_id INT(10) unsigned NOT NULL,
    user_id INT(10) unsigned NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    CONSTRAINT permission_user_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES permissions (id) ON DELETE CASCADE,
    CONSTRAINT permission_user_user_id_foreign FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE
);
CREATE INDEX permission_user_permission_id_index ON permission_user (permission_id);
CREATE INDEX permission_user_user_id_index ON permission_user (user_id);
CREATE TABLE permissions
(
    id INT(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL,
    description VARCHAR(255),
    model VARCHAR(255),
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
CREATE UNIQUE INDEX permissions_slug_unique ON permissions (slug);
CREATE TABLE role_user
(
    id INT(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    role_id INT(10) unsigned NOT NULL,
    user_id INT(10) unsigned NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    CONSTRAINT role_user_role_id_foreign FOREIGN KEY (role_id) REFERENCES roles (id) ON DELETE CASCADE,
    CONSTRAINT role_user_user_id_foreign FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE
);
CREATE INDEX role_user_role_id_index ON role_user (role_id);
CREATE INDEX role_user_user_id_index ON role_user (user_id);
CREATE TABLE competencia_user
(
    id INT(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    user_id INT(10) unsigned NOT NULL,
    competencia_id INT(10) unsigned NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    CONSTRAINT competencia_user_user_id_foreign FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
    CONSTRAINT competencia_user_competencia_id_foreign FOREIGN KEY (competencia_id) REFERENCES competencias (id) ON DELETE CASCADE
);
CREATE INDEX competencia_user_competencia_id_foreign ON competencia_user (competencia_id);
CREATE INDEX competencia_user_user_id_foreign ON competencia_user (user_id);
CREATE TABLE competencias
(
    id INT(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    org_partidos ENUM('admin_competencia', 'admin_equipo') NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
CREATE UNIQUE INDEX competencias_nombre_unique ON competencias (nombre);
CREATE TABLE equipo_user
(
    id INT(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    user_id INT(10) unsigned NOT NULL,
    equipo_id INT(10) unsigned NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    CONSTRAINT equipo_user_user_id_foreign FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
    CONSTRAINT equipo_user_equipo_id_foreign FOREIGN KEY (equipo_id) REFERENCES equipos (id) ON DELETE CASCADE
);
CREATE INDEX equipo_user_equipo_id_foreign ON equipo_user (equipo_id);
CREATE INDEX equipo_user_user_id_foreign ON equipo_user (user_id);
CREATE TABLE equipos
(
    id INT(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    apodo VARCHAR(255) NOT NULL,
    fundado DATE NOT NULL,
    fundadores VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
CREATE TABLE localidades
(
    id INT(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    provincia_id INT(10) unsigned NOT NULL,
    CONSTRAINT localidades_provincia_id_foreign FOREIGN KEY (provincia_id) REFERENCES provincias (id)
);
CREATE INDEX localidades_provincia_id_foreign ON localidades (provincia_id);
CREATE TABLE paises
(
    id INT(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL
);
CREATE TABLE provincias
(
    id INT(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    pais_id INT(10) unsigned NOT NULL,
    CONSTRAINT provincias_pais_id_foreign FOREIGN KEY (pais_id) REFERENCES paises (id)
);
CREATE INDEX provincias_pais_id_foreign ON provincias (pais_id);
CREATE TABLE scaffoldinterfaces
(
    id INT(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    package VARCHAR(255) NOT NULL,
    migration VARCHAR(255) NOT NULL,
    model VARCHAR(255) NOT NULL,
    controller VARCHAR(255) NOT NULL,
    views VARCHAR(255) NOT NULL,
    tablename VARCHAR(255) NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
CREATE TABLE torneos
(
    id INT(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    fecha_inicio DATE NOT NULL,
    descripcion TEXT NOT NULL,
    estado ENUM('activo', 'inactivo') NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
CREATE TABLE estadios
(
    id INT(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    alias VARCHAR(255) NOT NULL,
    capasidad INT(11) NOT NULL,
    iluminado TINYINT(1) NOT NULL,
    arquitectos VARCHAR(255) NOT NULL,
    dueños VARCHAR(255) NOT NULL,
    inauguracion DATE NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
CREATE UNIQUE INDEX estadios_nombre_unique ON estadios (nombre);
CREATE TABLE direcciones
(
    id INT(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    calle VARCHAR(255) NOT NULL,
    altura VARCHAR(255) NOT NULL,
    piso INT(11),
    dpto VARCHAR(255),
    estadio_id INT(10) unsigned NOT NULL,
    pais_id INT(10) unsigned,
    provincia_id INT(10) unsigned,
    localidad_id INT(10) unsigned,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    CONSTRAINT direcciones_estadio_id_foreign FOREIGN KEY (estadio_id) REFERENCES estadios (id) ON DELETE CASCADE,
    CONSTRAINT direcciones_pais_id_foreign FOREIGN KEY (pais_id) REFERENCES paises (id),
    CONSTRAINT direcciones_provincia_id_foreign FOREIGN KEY (provincia_id) REFERENCES provincias (id),
    CONSTRAINT direcciones_localidad_id_foreign FOREIGN KEY (localidad_id) REFERENCES localidades (id)
);
CREATE INDEX direcciones_estadio_id_foreign ON direcciones (estadio_id);
CREATE INDEX direcciones_localidad_id_foreign ON direcciones (localidad_id);
CREATE INDEX direcciones_pais_id_foreign ON direcciones (pais_id);
CREATE INDEX direcciones_provincia_id_foreign ON direcciones (provincia_id);
CREATE TABLE equipo_estadio
(
    id INT(10) unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    estadio_id INT(10) unsigned NOT NULL,
    equipo_id INT(10) unsigned NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    CONSTRAINT equipo_estadio_estadio_id_foreign FOREIGN KEY (estadio_id) REFERENCES estadios (id) ON DELETE CASCADE,
    CONSTRAINT equipo_estadio_equipo_id_foreign FOREIGN KEY (equipo_id) REFERENCES equipos (id) ON DELETE CASCADE
);
CREATE INDEX equipo_estadio_equipo_id_index ON equipo_estadio (equipo_id);
CREATE INDEX equipo_estadio_estadio_id_index ON equipo_estadio (estadio_id);