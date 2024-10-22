<?php

class Department
{
    private ? int    $id              ;
    private   string $name            ;
    private ? int    $departmentHeadId;
    private ? string $description     ;
    private   string $status          ;

    public function __construct(array $department)
    {
        $this->id               = $department['id'              ] ?? null;
        $this->name             = $department['name'            ] ?? ''  ;
        $this->departmentHeadId = $department['departmentHeadId'] ?? null;
        $this->description      = $department['description'     ] ?? null;
        $this->status           = $department['status'          ] ?? ''  ;
    }

    public function getId(): ?int
    {
        return $this->id;
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
