<?php

require_once __DIR__ . '/../database/database.php';

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

            $statement = $pdo->prepare($query);

            $statement->execute([
                ':name'               => 'Okay 2',
                ':department_head_id' => 2,
                ':description'        => 'Okay 2',
                ':status'             => 'Active',
                ':created_by'         => 1,
                ':updated_by'         => 1
            ]);
