<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 19/01/18
 * Time: 08:57 PM
 */

namespace Product\Form;


use Zend\Form\Form;

class ProductForm extends Form
{
    public function __construct()
    {
        parent::__construct('product-form');
        $this->add([
            'name' => 'product',
            'type' => Fieldset\ProductFieldset::class
        ]);

        $this->add([
            'type' => 'submit',
            'name' => 'submit',
            'attributes' => [
                'value' => 'Accept',
                'class' => 'btn btn-primary'
            ]
        ]);

        $this->setAttribute('method', 'post');
    }
}