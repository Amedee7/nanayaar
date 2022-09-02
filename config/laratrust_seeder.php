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
        'super-administrateur' => [
            'utilisateur' => 'c,r,u,d,st',
            'élève' => 'c,r,u,d',
            'statistique' => 'vrtb',
            'configuration' => 'rglr',
            'ville'=>'c,r,u,d',
            'role' => 'c,r,u,d',
            'log' => 'r',
            'archive' => 'r',
            'sauvegarde' => 'c,r,u,d',
            'permission' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'administrateur' => [
            'utilisateur' => 'c,r,u',
            'élève' => 'c,r,u',
            'statistique' => 'vrtb',
            'ville'=>'c,r,u,d',
            'profile' => 'r,u'
        ],
        'utilisateur' => [
            'agent' => 'c,r,u',
            'profile' => 'r,u',
        ]
    ],

    'permissions_map' => [
        'c' => 'creer',
        'r' => 'lire',
        'u' => 'modifier',
        'd' => 'supprimer',
        'st' => 'changer statut',
        'vrtb' => 'voir sur tableau de bord',
        'rglr' => 'regler'
    ]
];
