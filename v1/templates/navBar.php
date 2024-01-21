<?php
declare(strict_types=1);

echo '<div class="bar">';
    echo "<a href='accueil.php' class='titre'>Kik's Quizz</a>";
    echo "<div class='right'>";
        echo "<button class='btn-add' onclick=\"window.location.href='/creation.php'\">Créer un quizz</button>";
        echo "<a href='/connexion.php'><img class='img-user' src='/Assets/img/user.png'></a>";
    echo "</div>";
echo '</div>';
