<?php
declare(strict_types=1);

namespace Modeles\Quizz\Types\TypeQuestion;

use Modeles\Quizz\Type;

final class Checkbox extends Type
{
    public function __construct(int $id_typeQst)
    {
        parent::__construct($id_typeQst, "checkbox");
    }
}
