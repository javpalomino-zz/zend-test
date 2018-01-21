<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 17/01/18
 * Time: 11:35 PM
 */

namespace Product\Controller;

use Product\Form\ProductForm;
use Zend\Form\Form;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ODM\MongoDB\DocumentManager;
use Product\Model\Product;

class ProductController extends AbstractActionController
{
    protected $documentManager;
    protected $productRepository;

    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager;
        $this->productRepository = $this->documentManager->getRepository(Product::class);
    }

    public function indexAction()
    {
        $viewModel = new ViewModel();

        $products = $this->productRepository->findAll();

        $viewModel->setVariable("products", $products);

        return $viewModel;
    }

    public function createAction()
    {
        $form = new ProductForm();

        if ($this->getRequest()->isPost()) {
            $params = $this->params()->fromPost();
            $form->setData($params);

            if ($form->isValid()) {
                $product = new Product();

                $data = $form->getData();
                $product->fillFromArray($data['product']);

                $this->documentManager->persist($product);
                $this->documentManager->flush();

                return $this->redirect()->toRoute('product');
            }

            return $this->redirect()->toRoute('product/create');
        }

        return new ViewModel(['form' => $form]);
    }

    public function detailAction()
    {
        $params = $this->params()->fromRoute();

        $product = $this->productRepository->find($params['id']);

        $form = new ProductForm();
        $form->populateValues(['product' => $product->toArray()]);

        if ($this->getRequest()->isPost()) {
            $params = $this->params()->fromPost();
            $form->setData($params);

            if($form->isValid()) {
                $data = $form->getData();
                $product->fillFromArray($data['product']);

                $this->documentManager->persist($product);
                $this->documentManager->flush();

                return $this->redirect()->toRoute('product');
            }

            return $this->redirect()->toRoute('product/detail', ['id' => $params['id']]);
        }

        return new ViewModel(['form' => $form]);
    }

    private function getCreateProductForm()
    {
        $form = new Form;


        return $form;
    }
}