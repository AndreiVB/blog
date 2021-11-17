<?php

declare(strict_types=1);

class FormController
{
    private array $formDatas;
    private array $errors;

    public function __construct(array $form): void {
        $this->formDatas = $form;
        $this->errors = [];
    }

    public function isEmpty(): bool {
        foreach ($this->formDatas as $key => $field) {
            if (empty($field))
                array_push($this->errors, [$key => $field]);
        }

        return count($this->errors) > 0 ? false : true;
    }

    public function getErrors(): array {
        return $this->errors;
    }

    // isStr , isNumber , isMatch

}