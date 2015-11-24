<?php

namespace JLaso\Notify\Repositories;

use JLaso\Notify\Infrastructure\PDOAdaptorInterface;
use JLaso\Notify\Infrastructure\UserInterface;
use JLaso\Notify\Infrastructure\UserRepositoryInterface;
use JLaso\Telegram\Models\User;

class UserRepository implements UserRepositoryInterface
{
    /** @var  UserRepositoryInterface */
    protected $bridge;

    /**
     * UserRepository constructor.
     */
    public function __construct($config)
    {
        switch ($config['driver']) {

            case "pdo_sqlite":
                $this->bridge = new SqliteUserRepository($config);
                break;

            default:
                throw new \Exception("Unknown PDO driver " . $config['driver']);

        }
    }

    /**
     * @param string $id
     * @return UserInterface
     */
    public function find($id)
    {
        return $this->bridge->find($id);
    }

    /**
     * @param UserInterface $user
     * @return bool
     */
    public function save(UserInterface $user)
    {
        return $this->bridge->save($user);
    }

    /**
     * @param UserInterface $user
     * @return bool
     */
    public function update(UserInterface $user)
    {
        return $this->bridge->update($user);
    }

    public function initSchema()
    {
        return $this->bridge->initSchema();
    }


}