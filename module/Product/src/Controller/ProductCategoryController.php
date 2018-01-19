<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 18/01/18
 * Time: 12:29 AM
 */

namespace Product\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ODM\MongoDB\DocumentManager;
use Product\Model\ProductCategory;

class ProductCategoryController extends AbstractActionController
{
	protected $documentManager;
	protected $productCategoryRepository;

	public function __construct(DocumentManager $documentManager)
	{
		$this->documentManager = $documentManager;
		$this->productCategoryRepository = $this->documentManager->getRepository(ProductCategory::class);
	}

    public function indexAction()
    {
        $viewModel = new ViewModel();

        $product_categories = $this->productCategoryRepository->findAll();

        $viewModel->setVariable("product_categories", $product_categories);

        return $viewModel;
    }

    public function createAction()
    {
    	$viewModel = new ViewModel();

    	if($this->getRequest()->isPost()) {
    		$params = $this->params()->fromPost();

    		$productCategory = new ProductCategory;

    		$productCategory->setName($params['name']);

    		$this->documentManager->persist($productCategory);

    		$this->documentManager->flush();
    		return $this->redirect()->toRoute('product-category');
    	}

    	return $viewModel;
    }
}