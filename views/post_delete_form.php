<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar publicación</title>
    <link rel="stylesheet" href="../styles/estilos.css">
</head>
<body>
    <h1 class="page-title">¿Estás seguro que deseas eliminar esta publicación?</h1>

    <div class="delete-box">
        <p><strong><?= htmlspecialchars($postData['title']) ?></strong></p>
        <p><?= nl2br(htmlspecialchars($postData['content'])) ?></p>

        <form action="post_delete.php" method="POST">
            <input type="hidden" name="id" value="<?= $postData['id'] ?>">
            <button type="submit" class="btn-danger">Sí, eliminar</button>
        </form><br>
        <a href="post_index.php" class="back-link">Cancelar</a>
    </div>
</body>
</html>
