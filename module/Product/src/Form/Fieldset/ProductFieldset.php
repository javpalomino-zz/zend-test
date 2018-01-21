<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 19/01/18
 * Time: 08:48 PM
 */

namespace Product\Form\Fieldset;


use Zend\Form\Fieldset;

class ProductFieldset extends Fieldset
{
    public function init()
    {
        $this->add([
            'name' => 'id',
            'type' => 'hidden'
        ]);

        $this->add([
            'name' => 'name',
            'type' => 'text',
            'options' => [
                'label' => 'Product name',
                'label_attributes' => [
                    'class' => 'control-label'
                ]
            ],
            'attributes' => [
                'class' => 'form-control'
            ]
        ]);

        $this->add([
            'name' => 'price',
            'type' => 'text',
            'options' => [
                'label' => 'Product price',
                'label_attributes' => [
                    'class' => 'control-label'
                ]
            ],
            'attributes' => [
                'class' => 'form-control'
            ]
        ]);

        $this->add([
            'name' => 'sku',
            'type' => 'text',
            'options' => [
                'label' => 'Product sku',
                'label_attributes' => [
                    'class' => 'control-label'
                ]
            ],
            'attributes' => [
                'class' => 'form-control'
            ]
        ]);
    }
}