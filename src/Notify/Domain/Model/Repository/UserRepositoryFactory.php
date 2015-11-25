<?php

namespace JLaso\Notify\Domain\Model\Repository;

use JLaso\Notify\Infrastructure\Persistence\Sqlite\SqliteUserRepository;

class UserRepositoryFactory
{
    /**
     * @param array $config
     * @return UserRepositoryInterface
     * @throws \Exception
     */
    public static function create($config)
    {
        $driver = trim(strtolower($config['driver']));
        switch ($driver) {

            case "pdo_sqlite":
                return new SqliteUserRepository($config);
                break;

            default:
                throw new \Exception("Unknown PDO driver " . $config['driver']);

        }
    }

}