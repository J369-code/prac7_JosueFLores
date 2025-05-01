<?php
include 'Connection.php';
class Comment extends Connection {
    public $id;
    public $response;
    public $post_id;
    public $user_id;
    public $created_at;
    public $updated_at;

    //Crear
    public function create() {
        $this->connect();
        $stmt = mysqli_prepare(
            $this->connection,
            "INSERT INTO comments (comment, post_id, user_id) VALUES (?, ?, ?)"
        );
        $stmt->bind_param("sii", $this->response, $this->post_id, $this->user_id);
        $stmt->execute();
        $stmt->close();
    }

    public function getByPost($post_id) {
        $this->connect();
        $stmt = mysqli_prepare($this->connection, "SELECT * FROM comments WHERE post_id = ? ORDER BY created_at DESC");
        $stmt->bind_param("i", $post_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $comments = array();

        while ($row = $result->fetch_assoc()) {
            array_push($comments, $row);
        }

        return $comments;
    }

    //Eliminar
    public function delete($id) {
        $this->connect();
        $stmt = mysqli_prepare($this->connection, "DELETE FROM comments WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
?>
