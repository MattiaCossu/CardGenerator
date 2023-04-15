<?php

class SelectField extends FormField
{
    private array $options;

    public function __construct(string $name, array $validators, array $options)
    {
        parent::__construct($name, $validators);
        $this->options = $options;
    }

    public function render(): string
    {
        $html = '<div class="form-group">';
        $html .= '<label for="' . $this->getName() . '">' . ucfirst($this->getName()) . '</label>';
        $html .= '<select class="form-control" id="' . $this->getName() . '" name="' . $this->getName() . '">';
        $html .= '<option value="" selected disabled hidden default>Choose ' . $this->getName() . '</option>';
        foreach ($this->options as $option) {
            $html .= '<option value="' . $option . '">' . $option . '</option>';
        }
        $html .= '</select>';
        $html .= '</div>';
        return $html;
    }
}