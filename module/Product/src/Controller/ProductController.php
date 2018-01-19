<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 17/01/18
 * Time: 11:35 PM
 */

namespace Product\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ODM\MongoDB\DocumentManager;
use Product\Model\Product;

class ProductController extends AbstractActionController
{
    protected $documentManager;
    protected $product_repository;

    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager;
        $this->product_repository = $this->documentManager->getRepository(Product::class);
    }

    public function indexAction()
    {
        $viewModel = new ViewModel();

        $products = $this->product_repository->findAll();

        $viewModel->setVariable("products", $products);

        return $viewModel;
    }

    public function createAction()
    {
        if($this->getRequest()->isPost()) {
            $params = $this->params()->fromPost();
            $product = new Product();

            $product->setName($params['name']);
            $product->setPrice($params['price']);
            $product->setSku($params['sku']);

            $this->documentManager->persist($product);
            $this->documentManager->flush();

            return $this->redirect()->toRoute('product');
        }
        return new ViewModel();
    }

    public function detailAction()
    {
        $params = $this->params()->fromRoute();

        return "product detail";
    }

    public function detail()
    {
        //die($this->params()->fromRoute());
        return "product detail";
    }
}