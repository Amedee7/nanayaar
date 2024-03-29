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
            'statistique' => 'vrtb',
            'paramètres' => 'vrs,c,r,u,d,rgl,sts,',
            'configuration' => 'rglr',
            'ville'=>'c,r,u,d',
            'role' => 'c,r,u,d',
            'log' => 'cslt',
            'archive' => 'r',
            'tableau de bord' => 'vrs',
            'sauvegarde' => 'c,r,u,d',
            'permission' => 'c,r,u,d',
            'profile' => 'c,r,u,avtr,d',
            'versement' => 'c,r,u,d,rgl,sts',
            'pret' => 'c,r,u,d',
            'status' => 'c,r,u,d,sts',
            'client' => 'c,r,u,d,sts,rgl',
        ],
        'directeur-general' => [
            'utilisateur' => 'c,r,u,d,st',
            'statistique' => 'vrtb',
            'paramètres' => 'vrs',
            'configuration' => 'rglr',
            'ville'=>'c,r,u,d',
            'role' => 'c,r,u,d',
            'log' => 'cslt',
            'archive' => 'r',
            'sauvegarde' => 'c,r,u,d',
            'permission' => 'c,r,u,d',
            'profile' => 'c,r,u,avtr,d',
            'versement' => 'c,r,u,d,rgl,sts',
            'pret' => 'c,r,u,d',
            'status' => 'c,r,u,d,sts',
            'client' => 'c,r,u,d,sts,rgl',
        ],
        'administrateur' => [
            'utilisateur' => 'c,r,u',
            'paramètres' => 'vrs',
            'statistique' => 'vrtb',
            'ville'=>'c,r,u,d',
            'profile' => 'r,u,avtr',
            'versement' => 'c,r,u,d,rgl,sts',
            'pret' => 'c,r,u,d',
            'status' => 'c,r,u,d,sts',
            'client' => 'c,r,u,d,sts,rgl',
            'log' => 'cslt',
        ],
        'caissiere' => [
            'utilisateur' => 'c,r,u',
            'paramètres' => 'vrs',
            'statistique' => 'vrtb',
            'ville'=>'c,r,u,d',
            'profile' => 'c,r,u,avtr',
            'versement' => 'c,r,u,d,rgl,sts',
            'pret' => 'c,r,u,d',
            'status' => 'c,r,u,d,sts',
            'client' => 'c,r,u,d,sts,rgl',
            'log' => 'cslt',

        ],
        'utilisateur' => [
            'agent' => 'r',
            'profile' => 'r,avtr,u',
            'versement' => 'r',
            'pret' => 'r',
            'status' => 'r',
            'client' => 'r',
        ],
        'agent-commercial' => [
            'agent' => 'r',
            'profile' => 'r,avtr,u',
            'versement' => 'r',
            'pret' => 'r',
            'status' => 'r',
            'client' => 'r',
        ],
        'agent-commercial' => [
            'agent'     => 'r',
            'profile'   => 'r,avtr,u',
            'versement' => 'r',
            'pret'      => 'r',
            'status'    => 'r',
            'client'    => 'r',
        ],
        'directeur-commercial' => [
            'agent'     => 'r',
            'profile'   => 'r,avtr,u',
            'versement' => 'r',
            'pret'      => 'r',
            'client'    => 'r',
            'status'    => 'r',
        ]
    ],

    'permissions_map' => [
        'c'         => 'creer',
        'r'         => 'lire',
        'u'         => 'modifier',
        'd'         => 'supprimer',
        'st'        => 'changer statut',
        'vrtb'      => 'voir sur tableau de bord',
        'rglr'      => 'regler',       
        'cslt'     => 'consulter',
        'gnr'       => 'générer',
        'vrs'       => 'voir',
        'rgl'       => 'règlement',
        'sts'       => 'status',
        'avtr'       => 'avatar',

    ]
];
