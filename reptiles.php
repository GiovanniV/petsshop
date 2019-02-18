<?php
/**
 * Copyright (c) 2019 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
use PetStore\Database\Connection;
use PetStore\Database\QueryBuilder;
use PetStore\Source\Reptiles;

require 'vendor/autoload.php';

$config = require 'config.php';

$queryBuilder = new QueryBuilder(
    Connection::make($config['database'])
);

$ret = new Reptiles('pet shop3', 207, 6, 12, 3, 3, 3, $queryBuilder);

 $queryBuilder->insert('animals', [
    'name' => $ret->name,
    'price' => $ret->price,
    'age' => $ret->age,
    'lifespan' => $ret->lifespan,
    'pettype' => $ret->pettype,
    'color' => $ret->color,
   'itemtype' => $ret->itemtype,

]);
  $results=$ret->getAllReptiles();
  echo '<pre>'; print_r($results);
