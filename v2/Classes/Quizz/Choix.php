<?php
declare(strict_types=1);

namespace Quizz;

use Quizz\Render\RenderInterface;

/**
 * Class Choix
 * @package Quizz
 */
class Choix implements RenderInterface
{

    /**
     * @var string
     * Le label du choix
     */
    private string $label;

    /**
     * Choix constructor.
     * @param string $label
     */
    public function __construct(string $label)
    {
        $this->label = $label;
    }

    /**
     * Récupère le label du choix
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * Rendu en HTML
     * @return string
     */
    public function render(): string
    {
        return $this->label;
    }
}