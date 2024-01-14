<?php 
declare(strict_types=1);

namespace UserInput\Radio;

use UserInput\InputRenderInterface;

class RadioButton implements InputRenderInterface{

    private string $name;
    private string $value;
    
    private string $id;

    private string $label;

    public function __construct(string $name, string $value, string $id, string $label){
        $this->name = $name;
        $this->value = $value;
        $this->id = $id;
        $this->label = $label;
    }

    public function getName(): string{
        return $this->name;
    }

    public function getValue(): string{
        return $this->value;
    }

    public function getId(): string{
        return $this->id;
    }

    public function getLabel(): string{
        return $this->label;
    }

    public function __toString(): string{
        return $this->render();
    }



    public function render(): string{
        // balise html d'un radio button
        return sprintf(
            '<input type="radio" name="%s" value="%s" id="%s" /> <label for="%s">%s</label>',
            $this->name,
            $this->value,
            $this->id,
            $this->id, // 2e id renseigné pour le label
            $this->label);
    }
}