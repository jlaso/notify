<?php

namespace JLaso\Notify\Repositories;

use JLaso\Notify\Domain\Model\User;
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
    preferred_notify_way CHAR(25) NOT NULL
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
        $tableName = self::TABLE;
        $sql = "SELECT * FROM `{$tableName}` WHERE `id` = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $user = $statement->fetch();

        return User::createFromArray($user);
    }

    /**
     * @return UserInterface[]
     */
    public function findAll()
    {
        $tableName = self::TABLE;
        $sql = "SELECT * FROM `{$tableName}`";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $users = $statement->fetchAll();
        // mapping part / hydrate part ?
        $result = array();
        foreach ($users as $user){
            $result[] = User::createFromArray($user);
        }
        unset($users);

        return $result;
    }

    /**
     * @param UserInterface $user
     * @return bool
     */
    public function save(UserInterface $user)
    {
        $tableName = self::TABLE;
        $sql = <<<SQL
            INSERT INTO `{$tableName}`
            (`id`, `phone_number`, `email`, `preferred_notify_way`)
            VALUES
            (:id, :phone_number, :email, :preferred_notify_way);
SQL;
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id', $user->getId()->getValue(), \PDO::PARAM_STR);
        $statement->bindValue(':phone_number', $user->getPhoneNumber()->getValue(), \PDO::PARAM_STR);
        $statement->bindValue(':email', $user->getEmail()->getValue(), \PDO::PARAM_STR);
        $statement->bindValue(':preferred_notify_way', $user->getPreferredNotifyWay()->getValue(), \PDO::PARAM_STR);

        $statement->execute();
    }

    /**
     * @param UserInterface $user
     * @return bool
     */
    public function update(UserInterface $user)
    {
        $tableName = self::TABLE;
        $sql = <<<SQL
            UPDATE `{$tableName}`
            SET `phone_number` = ':phone_number',
                `email` : ':email', `preferred_notify_way` = ':preferred_notify_way'
            WHERE
              `id` = ':id'
SQL;
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(
            array(':id', ':phone_number', ':email', ':preferred_notify_way'),
            array(
                $user->getId()->getValue(),
                $user->getPhoneNumber()->getValue(),
                $user->getEmail()->getValue(),
                $user->getPreferredNotifyWay()->getValue()
            )
        );
        $statement->execute();
    }

}