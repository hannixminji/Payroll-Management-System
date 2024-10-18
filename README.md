<?php

    public function store(Department $department): void
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
            $statement = $pdo->prepare($query);

        } catch (PDOException $exception) {
            //
        } finally {
            //
        }
    }
