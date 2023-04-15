<?php

class RadioButtonField extends FormField
{
    private array $options;

    public function __construct(string $name, array $validators, array $options)
    {
        parent::__construct($name, $validators);
        $this->options = $options;
    }

    public function render(): string
    {
        $html = '<div>';
        $html .= '<label for="' . $this->getName() . '">' . ucfirst($this->getName()) . '</label>';
        foreach ($this->options as $option) {
            $html .= '<label for="' . $this->getName() . '">';
            $html .= '<input type="radio" name="' . $this->getName() . '" id="' . $this->getName() . '" value="' . $option . '">';
            $html .= $option . '</label>';
        }
        $html .= '</div>';
        return $html;
    }
}