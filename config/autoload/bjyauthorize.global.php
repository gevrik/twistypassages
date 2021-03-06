<?php

return [
    'bjyauthorize' => [

        'default_role' => 'guest',

        'identity_provider' => 'BjyAuthorize\Provider\Identity\AuthenticationIdentityProvider',

        'role_providers'        => array(
            // using an object repository (entity repository) to load all roles into our ACL
            'BjyAuthorize\Provider\Role\ObjectRepositoryProvider' => array(
                'object_manager'    => 'doctrine.entitymanager.orm_default',
                'role_entity_class' => 'TmoAuth\Entity\Role',
            ),
        ),

        'resource_providers' => [
            'BjyAuthorize\Provider\Resource\Config' => [
                'profile' => [],
                'story' => [],
            ],
        ],

        'rule_providers' => [
            'BjyAuthorize\Provider\Rule\Config' => [
                'allow' => [
                    // allow guests and users (and admins, through inheritance)
                    ['user', 'profile', ['detail']],
                    ['admin', 'profile', ['update']],
                    [['guest', 'user'], 'story', ['index', 'detail']],
                    ['user', 'story', ['create']],
                ],

                'deny' => [
                    // ...
                ],
            ],
        ],

        /* Currently, only controller and route guards exist
         *
         * Consider enabling either the controller or the route guard depending on your needs.
         */
        'guards' => [

            'BjyAuthorize\Guard\Controller' => [
                ['controller' => 'TmoAuth\Controller\User', 'action' => ['login', 'index', 'register'], 'roles' => ['guest', 'user']],
                ['controller' => 'TmoAuth\Controller\User', 'action' => ['logout', 'changepassword'], 'roles' => 'user'],
                ['controller' => 'Application\Controller\Index', 'roles' => ['guest', 'user']],
                ['controller' => 'TwistyPassages\Controller\Profile', 'roles' => ['user']],
                ['controller' => 'TwistyPassages\Controller\Story', 'action' => ['index', 'detail'], 'roles' => ['guest', 'user']],
                ['controller' => 'TwistyPassages\Controller\Story', 'action' => ['create'], 'roles' => ['user']],
                ['controller' => 'DoctrineModule\Controller\Cli', 'roles' => ['guest']],
            ],

        ],
    ],
];