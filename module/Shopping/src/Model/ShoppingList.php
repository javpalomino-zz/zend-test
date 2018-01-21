<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 20/01/18
 * Time: 08:01 PM
 */

namespace Shopping\Model;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\Document(collection="shopping_lists") */
class ShoppingList
{
    /** @ODM\Id */
    private $id;

    /** @ODM\Field(type="date") */
    private $registerDate;

    /** @ODM\Field(type="boolean") */
    private $isActive;

    /** @ODM\EmbedMany(targetDocument="\Product\Model\Product") */
    private $products;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getRegisterDate()
    {
        return $this->registerDate->format('Y-m-d H:i:s');
    }

    /**
     * @param mixed $registerDate
     */
    public function setRegisterDate($registerDate): void
    {
        $this->registerDate = $registerDate;
    }

    /**
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param mixed $products
     */
    public function setProducts($products): void
    {
        $this->products = $products;
    }

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive): void
    {
        $this->isActive = $isActive;
    }


}