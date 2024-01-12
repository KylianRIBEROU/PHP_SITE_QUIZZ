<?php
declare(strict_types=1);

namespace ExceptionQuizz;

use Exception;

final class ExceptionAucunQuizz extends Exception
{
    public function __construct()
    {
        parent::__construct("Aucun quizz n'a été trouvé lors du parsing du fichier JSON");
    }
}