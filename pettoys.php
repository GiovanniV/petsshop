<?php
/**
 * Copyright (c) 2019 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
use PetStore\Database\Connection;
use PetStore\Database\QueryBuilder;
use PetStore\Source\PetToys;

require 'vendor/autoload.php';

$config = require 'config.php';

$queryBuilder = new QueryBuilder(
    Connection::make($config['database'])
);

$pets = new PetToys('pet shop5', 207, 6, 12, 4, 4, 4, $queryBuilder);

 $queryBuilder->insert('animals', [
    'name' => $pets->name,
    'price' => $pets->price,
    'age' => $pets->age,
    'lifespan' => $pets->lifespan,
    'pettype' => $pets->pettype,
    'color' => $pets->color,
    'itemtype' => $pets->itemtype,
]);

  $results=$pets->getAllPetToys();
  echo '<pre>'; print_r($results);
