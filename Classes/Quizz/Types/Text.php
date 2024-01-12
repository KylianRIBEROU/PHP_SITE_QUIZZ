<?php
declare(strict_types=1);

namespace Quizz\Types;

use Quizz\Type;

final class Text extends Type
{
    public function __construct()
    {
        parent::__construct("text");
    }
}
