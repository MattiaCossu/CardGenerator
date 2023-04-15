<?php
class FormValidator {
    private string $name;
    private array $formFields = [];
    private array $errors = [];

    public function __construct(string $name, array $formFields)
    {
        $this->name = $name;
        $this->formFields = $formFields;
    }

    public function addField(FormField $formField): self
    {
        $this->formFields[] = $formField;

        return $this;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function getFields(): array
    {
        return $this->formFields;
    }

    public function setFieldsValue(array $values): self
    {
        $values = array_values($values);
        for ($i = 0; $i < count($this->formFields); $i++) {
            $value = $values[$i] ?? ''; 
            $this->formFields[$i]->setValue($value);
        }
        return $this;
    }

    public function getErrorsByField(string $fieldName): array
    {
        $errors = [];
        foreach ($this->errors as $error) {
            if ($error->getName() === $fieldName) {
                foreach ($error->getErrors() as $error) {
                    $errors[] = $error;
                }
            }
        }
        return $errors;
    }

    public function getValues(): array
    {
        $values = [];
        foreach ($this->formFields as $formField) {
            array_push($values, $formField->getValue());
        }
        return $values;
    }

    public function validate(): bool
    {
        foreach ($this->formFields as $formField) {
            if (!$formField->validate()) {
                $this->errors[] = $formField;
            }
        }
        return count($this->errors) === 0;
    }

    public function render(): string 
    {
        $html = '<form action="#" method="POST">';
        foreach ($this->formFields as $formField) {
            if ($this->getErrorsByField($formField->getName())) {
                $html .= '<div class="error">';
                $html .= $formField->render();
                foreach ($this->getErrorsByField($formField->getName()) as $error) {
                    $html .= '<p>' . $error . '</p>';
                }
                $html .= '</div>';
            } else {
                $html .= $formField->render();
            }
        }
        $html .= '<span class="divider"></span>';
        $html .=    '<div style="padding: 0;">
                        <button type="submit" name="SubmitButton">Submit</button>
                    </div>';
        $html .= '</form>';
        return $html;
    }
}