<?php
declare(strict_types=1);

namespace Modeles\Quizz\Types;

use Modeles\Quizz\Type;

final class Text extends Type
{
    public function __construct()
    {
        parent::__construct("text");
    }
}
