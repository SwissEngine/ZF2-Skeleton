<?php
namespace Core;

use Core\Controller;
use Core\Factory;
use Zend\Mvc\Router\Http;

return [
    'router' => [
        'routes' => [
            'app' => [
                'type' => Http\Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'action'     => 'index',
                        'controller' => Controller\IndexController::class,
                    ]
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'index' => [
                        'type'    => Http\Segment::class,
                        'options' => [
                            'route'    => 'index[/:action]',
                            'defaults' => [
                                'controller'    => Controller\IndexController::class,
                                '__NAMESPACE__' => (new ReflectionClass(
                                    Controller\IndexController::class
                                ))->getNamespaceName(),
                            ]
                        ],
                        'may_terminate' => true,
                    ],
                ],
            ],
        ],
    ],
    'console' => [
        'router' => [
            'routes' => [
                'index' => [
                    'options' => [
                        'route' => 'index',
                        'defaults' => [
                            'controller' => Controller\IndexController::class,
                            'action'     => 'index'
                        ],
                    ],
                ],
            ],
        ],
    ],
    'service_manager' => [
        'aliases' => [
            'translator' => 'MvcTranslator',
        ],
    ],
    'translator' => [
        'locale' => 'fr_FR',
        'translation_file_patterns' => [
            [
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => Factory\Controller\IndexControllerFactory::class
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
