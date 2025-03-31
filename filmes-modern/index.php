<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes Modern</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <h1 class="logo">Filmes<span>Modern</span></h1>
            <ul>
                <li><a href="#">Início</a></li>
                <li><a href="#">Filmes</a></li>
                <li><a href="#">Séries</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>Bem-vindo ao Filmes Modern</h1>
                <p>Explore nossa coleção de filmes e séries</p>
            </div>
        </section>

        <section class="content">
            <h2>Catálogo</h2>
            <div class="grid">
                <?php
                $sql = "SELECT * FROM filmes";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="card">';
                        echo '<img src="' . $row['imagem'] . '" alt="' . $row['titulo'] . '">';
                        echo '<div class="card-info">';
                        echo '<h3>' . $row['titulo'] . '</h3>';
                        echo '<p>' . $row['descricao'] . '</p>';
                        echo '<span class="category">' . $row['categoria'] . '</span>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "<p>Nenhum filme encontrado.</p>";
                }

                mysqli_close($conn);
                ?>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Filmes Modern. Todos os direitos reservados.</p>
    </footer>
</body>
</html>