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

    public function isValidName(string $name)
    {
        //
    }
}
