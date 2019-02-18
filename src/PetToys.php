<?php
/**
 * Copyright (c) 2019 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
namespace PetStore\Source;

use PetStore\Database\QueryBuilder;

/**
 * Class PetToys
 * @package PetStore\Source
 */
class PetToys extends Animals
{
    /**
     * @var
     */
    public $name;
    /**
     * @var
     */
    public $price;
    /**
     * @var
     */
    public $lifespan;
    /**
     * @var
     */
    public $age;
    /**
     * @var string
     */
    public $pettype;
    /**
     * @var string
     */
    public $color;
    /**
     * @var
     */
    public $itemtype;

    /**
     * PetToys constructor.
     * @param string $name
     * @param int $price
     * @param int $lifespan
     * @param int $age
     * @param string $pettype
     * @param string $color
     * @param string $itemtype
     * @param QueryBuilder $q
     */
    public function __construct(
     string $name,
     int $price,
     int $lifespan,
     int $age,
     string $pettype,
     string $color,
     string $itemtype,
     QueryBuilder $q
    ) {
        parent::__construct($name, $price, $lifespan, $age, $itemtype, $q);
        $this->color = $color;
        $this->pettype = $pettype;
    }

    /**
     * @param int $id
     * @return array
     */
    public function getAllAttributes(int $id)
    {
        $rows = $this->q->selects($id, parent::getTable(), parent::getTypes());

        return $rows;
    }

    /**
     * @return array
     */
    public function getAllPetToys()
    {
        $rows = $this->q->getAllItemswise(parent::getTable(), parent::getTypes());
        return $rows;
    }
}
