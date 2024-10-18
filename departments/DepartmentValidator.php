<?php

class DepartmentValidator
{
    private Department $department;

    public function __construct(Department $department)
    {
        $this->department = $department;
    }

    public function validate(): string
    {
        return '';
    }

    private function validateName(string $name): string
    {
        return '';
    }

    private function validateDescription(string $description): string
    {
        return '';
    }
}
