<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar publicación</title>
    <link rel="stylesheet" href="../styles/estilos.css">
</head>
<body>
    <h1 class="page-title">Editar publicación</h1>
    <div>
        
    <form action="" method="POST" class="form-container">
        <label for="title">Título:</label><br>
        <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" required><br><br>

        <label for="content">Contenido:</label><br>
        <textarea name="content" rows="5" required><?= htmlspecialchars($post['content']) ?></textarea><br><br>

        <button type="submit">Actualizar</button>
    </form>

    </div>
    <a href="post_index.php" class="back-link">Volver</a>
</body>
</html>
