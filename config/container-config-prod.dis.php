<?php

include_once __DIR__ . '/../vendor/autoload.php';

use JLaso\Notify\Domain\Service\DI\Container;

$config = require_once (sprintf(__DIR__ . '/' . Container::CONFIG_FILE_PATTERN, 'dev'));

$config['database']['path'] = __DIR__ . '/../db/database.prod.sqlite';

return $config;