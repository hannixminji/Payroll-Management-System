<?php

require_once __DIR__ . '/../database/database.php';

class DepartmentRepository
{
    private PDO $pdo;

    private const DUPLICATE_ENTRY_ERROR_CODE = '1062';

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
}
