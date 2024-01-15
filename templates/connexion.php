<?php
declare(strict_types=1);

include 'templates/navBar.php';

echo '<div class="container">';
    echo '<div class="form">';
        echo '<h1 class="title">Connexion</h1>';
        echo '<form class="form2" method="post" action="/connexion.php">';
            echo '<input class="tf" type="text" name="username" placeholder="Nom d\'utilisateur">';
            echo '<input class="tf" type="password" name="password" placeholder="Mot de passe">';
            echo '<div class="btns">';
                echo '<button class="btn" type="submit" >Connexion</button>';
                echo '<a class="btn" href="/inscription.php">Inscription</button>';
            echo '</div>';
        echo '</form>';
    echo '</div>';
echo '</div>';