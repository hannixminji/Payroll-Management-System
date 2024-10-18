<?php

class DepartmentValidator
{
    private readonly Department $department;

    public function __construct(Department $department)
    {
        $this->department = $department;
    }

    public function validate(): string
    {
        //
    }

    private function sanitize(int|string $input): int|string
    {
        //
    }

    private function escape(int|string $input): int|string
    {
        //
    }
}

    private function validateName(string $name): string
    {
        $sanitizedName = filter_var($name, FILTER_SANITIZE_STRING);
        if ($name !== $sanitizedName) {
            return '';
        }

        $escapedOutput = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        if ($name !== $escapedOutput) {
            return '';
        }

        if (trim($name) === '') {
            return '';
        }

        $length = strlen($name); 
        if (length < MINIMUM_NAME_LENGTH && length > MAXIMUM_NAME_LENGTH) {
            return '';
        }
    }

    private function validateName(string $name): string
    {
        $sanitizedName = $this->sanitize($name, FILTER_SANITIZE_STRING);
        if ($name !== $sanitizedName) {
            return '';
        }

        $escapedName = $this->escapeString($name);
        if ($name !== $escapedString) {
            return '';
        }
    }
