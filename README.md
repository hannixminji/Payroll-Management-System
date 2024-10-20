<?php

    public function add(Department $department, int $userId): int
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

            return SUCCESS;

        } catch (PDOException $exception) {
            error_log('Database Error: An error occurred while adding the department. ' .
                      'Exception: ' . $exception->getMessage());

            if ($exception->getCode() === self::DUPLICATE_ENTRY_ERROR_CODE) {
                return DUPLICATE_ENTRY_ERROR;
            }

            return FAILURE;
        }
    }

    public function get(
    ): int {
    }

    public function update(Department $department, int $userId): int
    {
        $query = '
            UPDATE departments
            SET
                name = :name,
                department_head_id = :department_head_id,
                description = :description,
                status = :status,
                updated_by = :updated_by
            WHERE
                id = :id
        ';

        try {
            $statement = $this->pdo->prepare($query);

            $statement->execute([
                ':id'                 => $department->getId(),
                ':name'               => $department->getName(),
                ':department_head_id' => $department->getDepartmentHeadId(),
                ':description'        => $department->getDescription(),
                ':status'             => $department->getStatus(),
                ':updated_by'         => $userId
            ]);

            return SUCCESS;

        } catch (PDOException $exception) {
            error_log('Database Error: An error occurred while updating the department. ' .
                      'Exception: ' . $exception->getMessage());

            if ($exception->getCode() === self::DUPLICATE_ENTRY_ERROR_CODE) {
                return DUPLICATE_ENTRY_ERROR;
            }

            return FAILURE;
        }
    }

    public function softDelete(int $departmentId, int $userId): int
    {
        $query = '
            UPDATE departments
            SET
                status = "Archived",
                deleted_at = NOW(),
                deleted_by = :deleted_by
            WHERE
                id = :id
        ';

        try {
            $statement = $this->pdo->prepare($query);

            $statement->execute([
                ':id'         => $departmentId,
                ':deleted_by' => $userId
            ]);

            return SUCCESS;

        } catch (PDOException $exception) {
            error_log('Database Error: An error occurred while soft deleting the department. ' .
                      'Exception: ' . $exception->getMessage());

            return FAILURE;
        }
    }

$currentPage
$numberOfEntriesPerPage
$offset

$searchTerm

$sortBy
$sortDirection
$groupBy

$filter

Number of entries = [10, 20, 50, 100, custom]
Pagination
Search Box
Sort By
    Name
    Status
    Date Created
    Date Modified
Sort Direction
    Ascending
    Descending
Group By
    (None)
    Name
    Status
    Date Created
    Date Modified
Filter By
    All
    Status
        - Active
        - Inactive
        - Archived
    Date Created
        - Start Date
        - End Date
    Date Modified
        - Start Date
        - End Date

id
name
department_head_id
description
status
created_at
created_by
updated_at
updated_by
deleted_at
deleted_by

Number of entries per page: [10, 20, 50, 100, custom] [Default Value: 10] good
Pagination: [Default current page: 1] good
Search Box: [Default Value: '']

Sort By: [Name, Status, Date Created, Date Modified] [Default Value: Name]
Sort Direction: [Ascending, Descending] [Default Value: Ascending]
Group By: [Name, Status, Date Created, Date Modified] [Default Value: Date Created]

Filter By: [All, Status (Active, Inactive, Archived), Date Created (Start and end date), Date Modified (Start and end date)] [Default Value: All]

<?php

$query = '
    SELECT
        *
    FROM departments
    WHERE 1
        
';

Testing
