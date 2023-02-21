<?php
function getDatabaseConfig(): array{
    return [
        "database" => [
            "test" => [
                "url" => "mysql:host = localhost:3306;dbname=php_user_management_test",
                "username" => 'root',
                "passoword" => ""
            ],
            "prod" => [
                "url" => "mysql:host = localhost:3306;dbname=php_user_management",
                "username" => 'root',
                "passoword" => ""
            ]
        ]
    ];
}