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
                                'controller' => Controller\ProductController::class,
                                'action' => 'detail'
                            ]
                        ]
                    ]
                ]
            ],
            'product-category' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/product-category',
                    'defaults' => [
                        'controller' => Controller\ProductCategoryController::class,
                        'action' => 'index'
                    ]
                ]
            ]
        ]
    ],

    'controllers' => [
        'factories' => [
            Controller\ProductController::class => InvokableFactory::class,
            Controller\ProductCategoryController::class => InvokableFactory::class,
        ]
    ],

    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];