<?php 
declare(strict_types=1);
namespace UserInput;

interface InputRenderInterface
{
    public function render(): string;
}