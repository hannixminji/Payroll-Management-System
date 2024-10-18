<?php

class Department
{
    private   string $name            ;
    private ? int    $departmentHeadId;
    private ? string $description     ;
    private   string $status          ;

    public function __construct(array $department)
    {
        $this->name             = $department['name'            ];
        $this->departmentHeadId = $department['departmentHeadId'];
        $this->description      = $department['description'     ];
        $this->status           = $department['status'          ];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDepartmentHeadId(): ?int
    {
        return $this->departmentHeadId;
    }

    public function setDepartmentHeadId(?int $departmentHeadId): void
    {
        $this->departmentHeadId = $departmentHeadId;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
}