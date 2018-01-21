<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 20/01/18
 * Time: 05:34 PM
 */

namespace Shopping\Controller;


use Shopping\Model\ShoppingList;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ODM\MongoDB\DocumentManager;

class ShoppingController extends AbstractActionController
{
    protected $documentManager;
    protected $shoppingRepository;

    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager;
        $this->shoppingRepository = $this->documentManager->getRepository(ShoppingList::class);
    }

    public function indexAction()
    {
        $shopping_lists = $this->shoppingRepository->findAll();

        return new ViewModel(['shopping_lists' => $shopping_lists]);
    }

    public function detailAction() {
        $params = $this->params()->fromRoute();

        $shopping_list = $this->shoppingRepository->find($params['id']);

        return new ViewModel(['shopping_list' => $shopping_list]);
    }
}

