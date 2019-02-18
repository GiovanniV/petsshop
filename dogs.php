<?php
/**
 * Copyright (c) 2019 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
use PetStore\Database\Connection;
use PetStore\Database\QueryBuilder;
use PetStore\Source\Dogs;

require 'vendor/autoload.php';

$config = require 'config.php';

$queryBuilder = new QueryBuilder(
    Connection::make($config['database'])
);

$dogs = new Dogs('pet shop1', 20, 40, 18, 2, 3, 2, $queryBuilder);

 $queryBuilder->insert('animals', [
    'name' => $dogs->name,
    'price' => $dogs->price,
    'age' => $dogs->age,
    'lifespan' => $dogs->lifespan,
    'pettype' => $dogs->pettype,
    'itemtype' => $dogs->itemtype,
    'color' => $dogs->color,
]);

  $results=$dogs->getAllDogs();
  echo '<pre>'; print_r($results);
