<?php
/**
 * Copyright (c) 2019 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
namespace PetStore\Database;

use PetStore\Source\Product;
use \PDO;
use \PDOException;

/**
 * Class QueryBuilder
 * @package PetStore\Database
 */
class QueryBuilder
{

    /**
     * @var PDO
     */
    private $pdo;

    /**
     * QueryBuilder constructor.
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param int $id
     * @param string $table
     * @param string $types
     * @return array
     */
    public function select(int $id, string $table, string $types)
    {
        $query = $this->pdo->prepare("SELECT * FROM $table WHERE id = :id");
        $query->execute([':id' => $id]);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param int $id
     * @param string $table
     * @param string $types
     * @return array
     */
    public function selects(int $id, string $table, string $types)
    {
        $query = $this->pdo->prepare("SELECT an.name,an.price,an.age, an.lifespan,cl.name as color,it.title as itemtype,pet.title as  pettype FROM $table as an, color as cl,itemtype as it, pettype as pet WHERE an.pettype=pet.id and an.itemtype=it.id and an.color=cl.id and an.id= $id");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param string $table
     * @param string $types
     * @return array
     */
    public function getAnimaltype(string $table, string $types)
    {
        $query = $this->pdo->prepare("SELECT it.title as name FROM $table as an,itemtype as it where an.itemtype=it.id group by an.itemtype");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param int $id
     * @param string $attr
     * @param string $table
     * @param string $types
     * @return mixed
     */
    public function selectAttribute(int $id, string $attr, string $table, string $types)
    {
        try {
            $query = $this->pdo->prepare("SELECT $attr FROM $table WHERE id = :id");
            $query->execute([':id' => $id]);

            return $query->fetchAll(PDO::FETCH_OBJ)[0]->$attr;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * @param string $title
     * @return mixed
     */
    public function AttributeItemsType(string $title)
    {
        try {
            $query = $this->pdo->prepare("SELECT id FROM itemtype WHERE title = '$title'");
            $query->execute();

            return $query->fetchAll(PDO::FETCH_OBJ)[0]->id;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * @param string $table
     * @param int $types
     * @param int $color
     * @param int $pets
     * @param float $disc
     * @return array
     */
    public function getAllItems(string $table, int $types=0, int $color=0, int $pets=0, float $disc=0.0)
    {
        $where='';
        if ($types) {
            $where.=" and an.itemtype=$types";
        }
        if ($color) {
            $where.=" and an.color=$color";
        }
        if ($pets) {
            $where.=" and an.pettype=$pets";
        }
        try {
            $query = $this->pdo->prepare("SELECT an.name,an.price,an.age, an.lifespan,cl.name as color,it.title as itemtype,pet.title as  pettype FROM $table as an, color as cl,itemtype as it, pettype as pet WHERE an.pettype=pet.id and an.itemtype=it.id and an.color=cl.id $where order by an.id");
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
			if($disc>0)
			{
			foreach($results as $result)			
			{
			if($result->age <= $result->lifespan/2) $result->price=$result->price-($result->price*.01*$disc);
			}
			return $results;
			}
			else
			{
			return $results;
			
	     	}
            
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * @param string $table
     * @param string $types
     * @param int $color
     * @param int $pets
     * @param float $disc
     * @return array
     */
    public function getAllItemswise(string $table, string $types, int $color=0, int $pets=0, float $disc=0.0)
    {
        $item=$this->AttributeItemsType($types);
        $where='';
        if ($item) {
            $where.=" and an.itemtype=$item";
        }
        if ($color) {
            $where.=" and an.color=$color";
        }
        if ($pets) {
            $where.=" and an.pettype=$pets";
        }
        try {
            $query = $this->pdo->prepare("SELECT an.name,an.price,an.age, an.lifespan,cl.name as color,it.title as itemtype,pet.title as  pettype FROM $table as an, color as cl,itemtype as it, pettype as pet WHERE an.pettype=pet.id and an.itemtype=it.id and an.color=cl.id $where order by an.id");
            $query->execute();
            if($disc>0)
			{
			foreach($results as $result)			
			{
			if($result->age <= $result->lifespan/2) $result->price=$result->price-($result->price*.01*$disc);
			}
			return $results;
			}
			else
			{
			return $results;
			
	     	}
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    /**
     * @param string $table
     * @param array $data
     * @return bool
     */
    public function insert(string $table, array $data)
    {
        $keys = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));
        $where='where ';
        $i=0;
        foreach ($data as $key=>$val) {
            if ($i==0) {
                $where.=$key."='$val'";
            } else {
                $where.=' and '.$key.'='.$val;
            }
            $i++;
        }
        try {
            $countryquery = $this->pdo->prepare("select * from $table $where");
            $countryquery->execute();
            $count=$countryquery->fetchAll(PDO::FETCH_OBJ);
            if (count($count)==0) {
                $query = $this->pdo->prepare("INSERT INTO $table ($keys) VALUES ($values)");
                return $query->execute($data);
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
