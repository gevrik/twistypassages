<?php
return array(
    'router' => array(
        'routes' => array(
            'profile' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/profile[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'TwistyPassages\Controller',
                        'controller'    => 'TwistyPassages\Controller\Profile',
                        'action'        => 'index',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
        ),
        'factories' => array(
            'TwistyPassages\Controller\Profile' => 'TwistyPassages\Factory\ProfileControllerFactory'
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
            'TwistyPassages\Service\BaseService' => 'TwistyPassages\Factory\BaseServiceFactory',
            'TwistyPassages\Service\ProfileService' => 'TwistyPassages\Factory\ProfileServiceFactory',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'navigation' => array(
        'default' => array(
            array(
                'label' => _('Profiles'),
                'route' => 'profile',
                'pages' => array(
                    array(
                        'label' => _('Detail'),
                        'route' => 'profile',
                        'action' => 'detail',
                    ),
                ),
            ),
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            'twistypassages' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'paths' => __DIR__ . '/../src/TwistyPassages/Entity',
            ),
            'orm_default' => array(
                'drivers' => array(
                    'TwistyPassages\Entity' => 'twistypassages',
                ),
            ),
        ),
    ),
);