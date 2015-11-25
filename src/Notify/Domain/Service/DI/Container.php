<?php

namespace JLaso\Notify\Domain\Service\DI;

use DI\ContainerBuilder;
use DI\Container as DI_Container;

class Container
{
    /** @var DI_Container */
    protected static $instance = null;
    protected static $env = "dev";

    const CONFIG_FILE_PATTERN = "container-config-%s.php";

    /**
     * @return DI_Container
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            new static();
        }

        return self::$instance;
    }

    /**
     * @throws \Exception
     */
    protected function __construct()
    {
        $builder = new ContainerBuilder();
        $builder->useAutowiring(false);
        $builder->useAnnotations(false);

        $configFile = sprintf(dirname(dirname(dirname(dirname(dirname(__DIR__))))) . '/config/' . self::CONFIG_FILE_PATTERN, self::$env);
        if (!file_exists($configFile)) {
            throw new \Exception(sprintf("The config file expected '%s' doesn't exist", $configFile));
        }
        $builder->addDefinitions($configFile);

        $container = $builder->build();
        self::$instance = $container;
    }

    /**
     * @param string $newEnv
     * @throws \Exception
     */
    public static function setEnv($newEnv)
    {
        if (self::$instance) {
            throw new \Exception("You cannot set the environment once started the container");
        }
        self::$env = $newEnv;
    }
}