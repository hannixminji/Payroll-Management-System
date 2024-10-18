<?php

require_once __DIR__ . '/../database/database.php';

class DepartmentRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function add(Department $department, int $userId)
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
                ':name'               => $department->getName(),
                ':department_head_id' => $department->getDepartmentHeadId(),
                ':description'        => $department->getDescription(),
                ':status'             => $department->getStatus(),
                ':created_by'         => $userId,
                ':updated_by'         => $userId
            ]);

        } catch (PDOException $exception) {

        } finally {
            $statement = null;
        }
    }
}
