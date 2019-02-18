<?php
/**
 * Copyright (c) 2019 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
use PetStore\Database\Connection;
use PetStore\Database\QueryBuilder;
use PetStore\Source\Cats;

require 'vendor/autoload.php';

$config = require 'config.php';

$queryBuilder = new QueryBuilder(
    Connection::make($config['database'])
);

$cats = new Cats('pet shop4', 207, 6, 12, 1, 4, 1, $queryBuilder);

 $queryBuilder->insert('animals', [
    'name' => $cats->name,
    'price' => $cats->price,
    'age' => $cats->age,
    'lifespan' => $cats->lifespan,
    'pettype' => $cats->pettype,
    'itemtype' => $cats->itemtype,
    'color' => $cats->color,
]);
  $results=$cats->getAllCats();
  echo '<pre>'; print_r($results);
