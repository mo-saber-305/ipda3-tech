<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'super_admin' => [
            'users' => 'c,r,u,d',
            'articles' => 'c,r,u,d',
            'projects' => 'c,r,u,d',
            'clients' => 'c,r,u,d',
            'services' => 'c,r,u,d',
            'pages' => 'c,r,u,d',
            'settings' => 'r,u',
        ],
        'admin' => [],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        's' => 'show',
        'u' => 'update',
        'd' => 'delete'
    ]
];
