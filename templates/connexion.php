<?php
declare(strict_types=1);

include 'templates/navBar.php';

echo '<div class="container">';
    echo '<div class="form">';
        echo '<h1 class="title">Connexion</h1>';
        echo '<form class="form2" method="post">';
            echo '<input class="tf" type="text" name="username" placeholder="Nom d\'utilisateur">';
            echo '<input class="tf" type="password" name="password" placeholder="Mot de passe">';
            echo '<div class="btns">';
                echo '<button class="btn">Connexion</button>';
                echo '<button class="btn">Inscription</button>';
            echo '</div>';
        echo '</form>';
    echo '</div>';
echo '</div>';