<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 17/01/18
 * Time: 11:35 PM
 */

namespace Product\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class ProductController extends AbstractActionController
{
    public function indexAction() {

        return "product";
    }

    public function detailAction() {
        die($this->params()->fromRoute());
        return "product detail";
    }

    public function detail() {
        //die($this->params()->fromRoute());
        return "product detail";
    }
}