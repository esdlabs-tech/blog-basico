<?php
header('Content-Type: text/html; charset=UTF-8');
include('includes/db.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ver Post</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Blog Básico by ESD Labs</h1>
    <a href="index.php">Volver al Inicio</a>
    <hr>
    <?php
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $sql = "SELECT * FROM posts WHERE id=$id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<h2>" . $row['title'] . "</h2>";
            echo "<p>" . $row['content'] . "</p>";
            echo "<small>Publicado el " . $row['created_at'] . "</small>";
        } else {
            echo "Post no encontrado.";
        }
    } else {
        echo "ID de post no especificado.";
    }

    $conn->close();
    ?>
    
    <footer><p> Creado por &#129354 <strong><a href="https://esdlabs.es/">ESD Labs</strong></a> &#129354 </p></footer>

</body>
</html>

