<?php
declare(strict_types=1);
namespace UserInput\Radio;

use UserInput\InputRenderInterface;


class RadioGroup implements InputRenderInterface{

    private $radioBoutons;

    public function __construct()
    {
        $this->radioBoutons = [];
    }


    public function getRadioBoutons(): array{
        return $this->radioBoutons;
    }

    public function addRadioButton(RadioButton $radioButton): void{
        array_push($this->radioBoutons, $radioButton);
    }

    public function __toString(): string{
        return $this->render();
    }

    public function render(): string
    {
        $BalisesHtml = '';
        foreach ($this->radioBoutons as $radioBouton) {
            $BalisesHtml .= $radioBouton->render();
        }
        return $BalisesHtml;
    }
}
