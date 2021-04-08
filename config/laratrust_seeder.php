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
            'admins' => 'c,r,u,d',
            'roles' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'regions' => 'c,r,u,d',
            'employers' => 'c,r,u,d,s,v',
            'jobSeekers' => 'c,r,u,d,s,v',
            'jobs' => 'c,r,u,d',
            'trainings' => 'c,r,u,d',
            'teams' => 'c,r,u,d',
            'verifyAccounts' => 'r,v,d'
        ],
        'admin' => [],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        's' => 'show',
        'v' => 'verify'
    ]
];
