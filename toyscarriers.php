<?php
/**
 * Copyright (c) 2019 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
use PetStore\Database\Connection;
use PetStore\Database\QueryBuilder;
use PetStore\Source\ToysCarriers;

require 'vendor/autoload.php';

$config = require 'config.php';

$queryBuilder = new QueryBuilder(
    Connection::make($config['database'])
);

$carriers = new ToysCarriers('pet shop2', 207, 6, 12, 1, 4, 5, $queryBuilder);
 $queryBuilder->insert('animals', [
    'name' => $carriers->name,
    'price' => $carriers->price,
    'age' => $carriers->age,
    'lifespan' => $carriers->lifespan,
    'pettype' => $carriers->pettype,
    'itemtype' => $carriers->itemtype,
    'color' => $carriers->color,
]);


  $results=$carriers->getAllToysCarriers();
  echo '<pre>'; print_r($results);
