<?php
/**
 * Copyright (c) 2019 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
namespace PetStore\Database;

use \PDO;

/**
 * Class Connection
 * @package PetStore\Database
 */
class Connection
{

    /**
     * @param array $config
     * @return PDO
     */
    public static function make(array $config)
    {
        try {
            $pdo = new PDO(
                $config['driver'] . ':host=localhost' . ';dbname=' . $config['database'],
                $config['user'],
                $config['password'],
                $config['options']
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        return $pdo;
    }
}
