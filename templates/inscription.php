<?php
declare(strict_types=1);

include 'templates/navBar.php';

echo '<div class="container">';
    echo '<div class="form">';
        echo '<div class="top">';
            echo '<a><img class="img-back" src="Assets/img/back.png"></a>';
            echo '<h1 class="title">Inscription</h1>';
        echo '</div>';
        echo '<form class="form2" method="post">';
            echo '<input class="tf" type="text" name="username" placeholder="Nom d\'utilisateur">';
            echo '<input class="tf" type="password" name="password" placeholder="Mot de passe">';
            echo '<input class="tf" type="password2" name="password2" placeholder="Vérification mot de passe">';
            echo '<div class="btn-1">';
                echo '<button class="btn">Inscription</button>';
            echo '</div>';
        echo '</form>';
    echo '</div>';
echo '</div>';