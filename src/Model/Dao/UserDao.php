<?php

namespace Batch\Sample\Model\Dao;
use PDO;

class UserDao
{
    /** @var  PDO */
    private $pdo;

    /**
     * UserDao constructor.
     * @param $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return \PDOStatement
     */
    public function findAll(){
        return $this->pdo->query("SELECT * FROM users;");
    }

}
