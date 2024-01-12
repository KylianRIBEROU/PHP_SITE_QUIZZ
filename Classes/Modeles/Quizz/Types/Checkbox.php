<?php
declare(strict_types=1);

namespace Modeles\Quizz\Types;

use Modeles\Quizz\Type;

final class Checkbox extends Type
{
    public function __construct()
    {
        parent::__construct("checkbox");
    }
}
