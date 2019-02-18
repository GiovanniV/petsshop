<?php
/**
 * Copyright (c) 2019 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
namespace PetStore\Source;

use PetStore\Database\QueryBuilder;

/**
 * Class Animals
 * @package PetStore\Source
 */
abstract class Animals
{

    /**
     * @var string
     */
    protected $name;
    /**
     * @var int
     */
    protected $lifespan;
    /**
     * @var int
     */
    protected $age;
    /**
     * @var float
     */
    protected $price;
    /**
     * @var int
     */
    protected $itemtype;
    /**
     * @var QueryBuilder
     */
    protected $q;

    /**
     * Animals constructor.
     * @param string $name
     * @param float $price
     * @param int $lifespan
     * @param int $age
     * @param int $itemtype
     * @param QueryBuilder $q
     */
    public function __construct(string $name, float $price, int $lifespan, int $age, int $itemtype, QueryBuilder $q)
    {
        $this->name = $name;
        $this->lifespan = $lifespan;
        $this->age = $age;
        $this->price = $price;
        $this->itemtype = $itemtype;
        $this->q = $q;
    }

    /**
     * @return string
     */
    public static function getTable()
    {
        return 'animals';
    }

    /**
     * @return bool|string
     */
    public static function getTypes()
    {
        $className = get_called_class();
        $types = substr(strtolower($className), strrpos($className, '\\') + 1);
        
        switch ($types) {
        case 'cats':  return 'cat';
        case 'dogs':  return 'dog';
        case 'toyscarriers':  return 'Pet Carriers';
        case 'pettoys':  return 'Pet toys';
        case 'reptiles':  return 'Reptiles';
        }
        return $types;
    }

    /**
     * @param int $id
     * @param string $attr
     * @return mixed
     */
    public function getAttribute(int $id, string $attr)
    {
        return $this->q->selectAttribute($id, $attr, self::getTable(), self::getTypes());
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getAnimalsName(int $id)
    {
        $results = $this->q->select($id, self::getTable(), self::getTypes());

        return $results[0]->name;
    }

    /**
     * @return mixed
     */
    public function getAnimalsList()
    {
        $results = $this->q->getAnimaltype(self::getTable(), self::getTypes());

        return $results[0]->name;
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $results = $this->q->getAllItemswise(self::getTable(), self::getTypes());

        return $results;
    }
}
