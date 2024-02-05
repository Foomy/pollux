<?php

namespace App;

use PDO;
use PDOException;

class Database extends PDO
{
    private const ENVKEY_DSN      = 'DSN';
    private const ENVKEY_USERNAME = 'USR';
    private const ENVKEY_PASSWORD = 'PWD';

    private static ?Database $instance = null;

    public function __construct()
    {
        $config = new Config();

        $dsn  = $config->getEnv(self::ENVKEY_DSN);
        $user = $config->getEnv(self::ENVKEY_USERNAME);
        $pass = $config->getEnv(self::ENVKEY_PASSWORD);

        try {
            parent::__construct($dsn, $user, $pass);
        } catch (PDOException $e) {
            (new Logger())->debug($e->getMessage());
            (new Logger())->debug($e->getTraceAsString());

            exit(1);
        }
    }

    public static function create(): Database
    {
        if (null === self::$instance) {
            self::$instance = new self;

            if (self::$instance != null) {
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                self::$instance->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                self::$instance->setAttribute(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL);
            }
        }

        return self::$instance;
    }
}