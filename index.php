<?php
header('Content-Type: text/html; charset=utf-8');
include('includes/db.php');
?>
<!DOCTYPE html>
<html>
<head>
      <meta charset="UTF-8">
    <title>Blog Básico (PHP y MySQL) by ESD Labs</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <h1>¡Bienvenid@ a mi blog!</h1>
        <a href="index.php">Inicio |</a> 
        <a href="https://esdlabs.es/" target="_blank">ESD Labs |</strong></a>
        <a href="https://github.com/esdlabs-tech" target="_blank">Mi GitHub |</a>  
        
    </header>
    <section>
        <hr>
        <?php
        $sql = "SELECT * FROM posts ORDER BY created_at DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<article>";
                echo "<h2><a href='post.php?id=" . $row['id'] . "'>" . htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8') . "</a></h2>";
                echo "<p>" . htmlspecialchars(substr($row['content'], 0, 150), ENT_QUOTES, 'UTF-8') . "...</p>";
                echo "<small>Publicado el " . $row['created_at'] . "</small>";
                echo "</article><hr>";
            }
        } else {
            echo "No hay posts aún.";
        }

        $conn->close();
        ?>
    </section>
</body>
<footer><p> Creado por &#129354 <strong><a href="https://esdlabs.es/">ESD Labs</strong></a> &#129354 </p></footer>
</html>

