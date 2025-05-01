<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creacion de Post</title>
    <link rel="stylesheet" href="../styles/estilos.css">
</head>
<body>
<h1 class="form-title">Crear nueva publicación</h1>

<div>
    <form action="../controllers/post_create.php" method="POST" class="post-form">
        <label for="title">Título:</label><br>
        <input type="text" name="title" required><br><br>
    
        <label for="content">Contenido:</label><br>
        <textarea name="content" rows="5" required></textarea><br><br>
    
        <button type="submit">Guardar</button>
    </form>
</div>

<a href="post_index.php" class="back-link">Volver</a>

</body>
</html>