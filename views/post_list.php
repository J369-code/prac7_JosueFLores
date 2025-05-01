<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Publicaciones</title>
    <link rel="stylesheet" href="../styles/estilos.css">
</head>
<body>
    <h1>Publicaciones</h1>

    <a href="post_create.php" class="back-link">Crear nueva publicación</a>

    <?php if (!empty($posts)): ?>
        <?php foreach ($posts as $post): ?>
            <div>
                <h2><?= htmlspecialchars($post['title']) ?></h2>
                <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
                <p><strong>Autor:</strong> <?= htmlspecialchars($post['user_name']) ?></p>

                <a href="post_edit.php?id=<?= htmlspecialchars($post['id']) ?>">Editar</a> |
                <a href="post_delete.php?id=<?= htmlspecialchars($post['id']) ?>">Eliminar</a> |
                <a href="comment_index.php?post_id=<?= htmlspecialchars($post['id']) ?>">Comentar</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No hay publicaciones.</p>
    <?php endif; ?>
</body>
</html>
