<?php

namespace Product;

use Zend\Router\Http\Segment;
use Zend\Router\Http\Literal;
use Zend\ServiceManager\Factory\InvokableFactory;


return [
    'router' => [
        'routes' => [
            'product' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/product',
                    'defaults' => [
                        'controller' => Controller\ProductController::class,
                        'action' => 'index'
                    ]
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'product-detail' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/:id',
                            'constraints' => [
                                'id' => '[a-zA-Z][a-zA-Z0-9_-]+'
                            ],
                            'defaults' => [
                                'action' => 'detail'
                            ]
                        ]
                    ],
                    'create' => [
                        'type' => Literal::class,
                        'options' => [
                            'route' => '/create',
                            'defaults' => [
                                'action' => 'create'
                            ],
                        ],
                    ],
                ],
            ],
            'product-category' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/product-category',
                    'defaults' => [
                        'controller' => Controller\ProductCategoryController::class,
                        'action' => 'index'
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'product-category-detail' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/:id',
                            'constraints' => [
                                'id' => '[a-zA-Z][a-zA-Z0-9_-]+'
                            ],
                            'defaults' => [
                                'controller' => Controller\ProductCategoryController::class,
                                'action' => 'detail'
                            ],
                        ],
                    ],
                    'create' => [
                        'type' => Literal::class,
                        'options' => [
                            'route' => '/create',
                            'defaults' => [
                                'controller' => Controller\ProductCategoryController::class,
                                'action' => 'create'
                            ]
                        ]
                    ]
                ],
            ],
        ],
    ],

    'controllers' => [
        'factories' => [
            Controller\ProductController::class => Controller\Factory\ControllerFactory::class,
            Controller\ProductCategoryController::class => Controller\Factory\ControllerFactory::class,
        ]
    ],

    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],

    'doctrine' => [
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => 'Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver',
                'paths' => [__DIR__ . '/../src/' . __NAMESPACE__ . '/Model']
            ],
            'odm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Model' => __NAMESPACE__ . '_driver'
                ]
            ]
        ]
    ]
];