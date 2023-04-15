<?php

class DateField extends FormField
{
    public function __construct(string $name, array $validators)
    {
        parent::__construct($name, $validators);
    }

    public function render(): string
    {
        $html = '<div>';
        $html .= '<label for="' . $this->getName() . '">' . ucfirst($this->getName()) . '</label>';
        $html .= '<input type="date" id="' . $this->getName() . '" name="' . $this->getName() . '">';
        $html .= '</div>';
        return $html;
    }
}