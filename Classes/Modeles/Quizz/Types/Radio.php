<?php
declare(strict_types=1);

namespace Quizz\Types;

use Quizz\Type;

final class Radio extends Type
{
    public function __construct()
    {
        parent::__construct("radio");
    }
}
