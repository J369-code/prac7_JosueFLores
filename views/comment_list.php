<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comentarios</title>
    <link rel="stylesheet" href="../styles/estilos.css">
</head>
<body>
    <h1 class="page-title">Comentarios</h1>
    
    <a href="post_index.php" class="back-link">Volver a la publicación</a>

    <div class="comments-section">
        <h2>Comentarios:</h2>
        <ul class="comment-list">
            <?php foreach ($commentsList as $comment): ?>
                <li class="comment-item">
                    <strong>Usuario <?= htmlspecialchars($comment['user_id']) ?>:</strong>
                    <p><?= htmlspecialchars($comment['comment']) ?></p>
                    <form action="../controllers/comment_delete.php" method="POST" class="delete-comment-form">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($comment['id']) ?>">
                        <input type="hidden" name="post_id" value="<?= htmlspecialchars($_GET['post_id']) ?>">
                        <button type="submit">Eliminar comentario</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="comment-form-container">
        <h2>Añadir comentario</h2>
        <form action="../controllers/comment_store.php" method="POST" class="comment-form">
            <textarea name="response" required placeholder="Escribe tu comentario aquí..."></textarea><br><br>
            <input type="hidden" name="post_id" value="<?= htmlspecialchars($_GET['post_id']) ?>">          
            <label for="user_id">Selecciona tu usuario:</label><br>
            <select name="user_id" required>
                <option value="1">Usuario 1</option>
                <option value="2">Usuario 2</option>
                <option value="3">Usuario 3</option>
            </select><br><br>
            
            <button type="submit">Añadir comentario</button>
        </form>
    </div>
</body>
</html>
