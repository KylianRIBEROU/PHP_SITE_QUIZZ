<?php
declare(strict_types=1);

namespace Quizz\Render;

/**
 * Interface RenderInterface
 * Interface pour les classes de rendu en HTML
 */
interface RenderInterface
{

    /**
     * Rendu en HTML
     * @return string
     */
    public function render(): string;
}