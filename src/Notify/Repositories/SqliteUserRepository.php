<?php

namespace JLaso\Notify\Repositories;

use JLaso\Notify\Infrastructure\UserInterface;
use JLaso\Notify\Infrastructure\UserRepositoryInterface;

class SqliteUserRepository implements UserRepositoryInterface
{
    /** @var  \PDO */
    protected $pdo;
    const TABLE = 'users';

    public function initSchema()
    {
        $tableName = self::TABLE;
        $this->pdo->exec(<<<SQL
DROP TABLE IF EXISTS {$tableName};
CREATE TABLE {$tableName} (
    id CHAR(25) PRIMARY KEY,
    phone_number CHAR(25) NOT NULL,
    email CHAR(50) NOT NULL,
    preferred_notify_way CHAR(25) NOT NULL,
    created_at DATETIME NOT NULL
)
SQL
); }

    public function __construct($config = array())
    {
        $db = $config['path'];
        $this->pdo = new \PDO("sqlite:{$db}");
    }

    /**
     * @param string $id
     * @return UserInterface
     */
    public function find($id)
    {
        $sql = "SELECT * FROM `{self::TABLE }` WHERE `id` = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(":id", $id);

        return $statement->execute();
    }

    /**
     * @param UserInterface $user
     * @return bool
     */
    public function save(UserInterface $user)
    {
        // TODO: Implement save() method.
    }

    /**
     * @param UserInterface $user
     * @return bool
     */
    public function update(UserInterface $user)
    {
        // TODO: Implement update() method.
    }


//    public function select($from, $where = array(), $limit = null)
//    {
//        $whereClause = "";
//        foreach ($where as $fld => $value) {
//            $whereClause .= "`{$fld}` = :{$fld}";
//        }
//        $sql = "SELECT * FROM `{$from}` WHERE {$whereClause}";
//        if ($limit) {
//            $sql .= " LIMIT " . intval($limit);
//        }
//        $statement = $this->db->prepare($sql);
//        foreach ($where as $fld => $value) {
//            $statement->bindValue(":{$fld}", $value);
//        }
//        return $statement->execute();
//
//    }


}