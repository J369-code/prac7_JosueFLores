<?php
require_once 'Connection.php';
class Post extends Connection {
    public $id;
    public $user_id;
    public $title;
    public $content;
    public $created_at;
    public $updated_at;

    //Crear
    public function create() {
        $this->connect();
        $stmt = mysqli_prepare(
            $this->connection,
            "INSERT INTO posts (user_id, title, content) VALUES (?, ?, ?)"
        );
        $stmt->bind_param("iss", $this->user_id, $this->title, $this->content);
        $stmt->execute();
        $stmt->close();
    }

    //Obtener todas las publicaciones
    public function getAll() {
        $this->connect();
        $stmt = mysqli_prepare($this->connection, "SELECT * FROM posts ORDER BY created_at DESC");
        $stmt->execute();
        $result = $stmt->get_result();
        $posts = [];

        while ($row = $result->fetch_assoc()) {
            $userStmt = mysqli_prepare($this->connection, "SELECT user_name FROM users WHERE id = ?");
            mysqli_stmt_bind_param($userStmt, "i", $row['user_id']);
            mysqli_stmt_execute($userStmt);
            $userResult = mysqli_stmt_get_result($userStmt);
            $user = $userResult->fetch_assoc();

            $row['user_name'] = $user['user_name'] ?? 'Desconocido';
            $posts[] = $row;
        }

        return $posts;
    }

    //Obtener por ID
    public function getFirst($id) {
        $this->connect();
        $stmt = mysqli_prepare($this->connection, "SELECT * FROM posts WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $post = $result->fetch_assoc();

        if ($post) {
            $userStmt = mysqli_prepare($this->connection, "SELECT user_name FROM users WHERE id = ?");
            $userStmt->bind_param("i", $post['user_id']);
            $userStmt->execute();
            $userResult = $userStmt->get_result();
            $user = $userResult->fetch_assoc();
            $post['user_name'] = $user['user_name'] ?? 'Desconocido';
        }

        return $post;
    }

    //Actualizar
    public function update($id) {
        $this->connect();
        $stmt = mysqli_prepare(
            $this->connection,
            "UPDATE posts SET title = ?, content = ? WHERE id = ?"
        );
        $stmt->bind_param("ssi", $this->title, $this->content, $id);
        $stmt->execute();
        $stmt->close();
    }

    //Eliminar
    public function delete($id) {
        $this->connect();

        $stmt1 = mysqli_prepare($this->connection, "DELETE FROM comments WHERE post_id = ?");
        $stmt1->bind_param("i", $id);
        $stmt1->execute();
        $stmt1->close();

        $stmt2 = mysqli_prepare($this->connection, "DELETE FROM posts WHERE id = ?");
        $stmt2->bind_param("i", $id);
        $stmt2->execute();
        $stmt2->close();
    }
}
