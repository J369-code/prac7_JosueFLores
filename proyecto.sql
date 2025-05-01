DROP DATABASE IF EXISTS ´proyecto´;

CREATE DATABASE ´proyecto´;

USE ´proyecto´;

CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE posts (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE comments (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    comment TEXT NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    post_id INT UNSIGNED NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE
);

--datos de prueba
INSERT INTO users (user_name, age, email, password) VALUES
('Juan Pérez', 30, 'juan@example.com', '123456'),
('Ana Gómez', 25, 'ana@example.com', 'abcdef'),
('Luis Torres', 35, 'luis@example.com', '654321');

INSERT INTO posts (title, content, user_id) VALUES
('Primera publicación', 'Nuevo contenido pronto.', 1),
('Segunda publicación', 'Para saber de quien es quien.', 2),
('Tercera publicación', 'Luis donde esta la tarea.', 3);

INSERT INTO comments (comment, user_id, post_id) VALUES
('Muy buena noticia, gracias por compartir.', 2, 1),
('¡Interesante!', 3, 2),
('No la hice.', 1, 3);

