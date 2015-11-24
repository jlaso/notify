<?php

namespace JLaso\Notify\DI;

use DI\ContainerBuilder;
use DI\Container as DI_Container;

class Container
{
    /** @var DI_Container  */
    protected static $instance = null;

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

    protected function __construct()
    {
        $builder = new ContainerBuilder();
        $builder->useAutowiring(false);
        $builder->useAnnotations(false);

        $builder->addDefinitions(__DIR__ . '/../../../config/container-config-dev.php');

        $container = $builder->build();
        self::$instance = $container;
    }
}