<?php

require_once '/../database/database.php';

class DepartmentRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function add(Department $department): void
    {
        $query = '
            INSERT INTO departments (
                name,
                department_head_id,
                description,
                status,
                created_by,
                updated_by
            )
            VALUES (
                :name,
                :department_head_id,
                :description,
                :status,
                :created_by,
                :updated_by
            )
        ';

        try {
            $statement = $this->pdo->prepare($query);

            $statement->execute([
                $department->getName            (),
                $department->getDepartmentHeadId(),
                $department->getDescription     (),
                $department->getStatus          (),
            ]);

        } catch (PDOException $exception) {
            //
        }
    }
}
