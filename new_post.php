<?php include('includes/db.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Post</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Nuevo Post</h1>
    <a href="index.php">Volver al Inicio</a>
    <hr>
    <form action="new_post.php" method="post">
        <label for="title">Nombre de la entrada:</label><br>
        <input type="text" id="title" name="title"><br>
        <label for="content">Contenido:</label><br>
        <textarea id="content" name="content" rows="10" cols="30"></textarea><br>
        <input type="submit" value="Publicar">
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $content = $_POST['content'];

        if ($title && $content) {
            $stmt = $conn->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
            $stmt->bind_param("ss", $title, $content);

            if ($stmt->execute()) {
                echo "Post publicado exitosamente.";
            } else {
                echo "Error al publicar el post: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Por favor, llena todos los campos.";
        }
    }

    $conn->close();
    ?>
</body>
</html>
