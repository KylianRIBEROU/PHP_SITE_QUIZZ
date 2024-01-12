<?php
declare(strict_types=1);

namespace Modeles\ExceptionQuizz;

use Exception;

final class ExceptionTypeInconnu extends Exception
{
    public function __construct()
    {
        parent::__construct("Le type de question est inconnu");
    }
}