<?php

/**
 * The Singleton pattern is a creational design pattern that ensures that a class has only one instance and provides a global point of access to it.
 * This way, the client code always uses the same instance of the class, regardless of where it is used in the application.
 * Example:
 */

class Database
{
    private static Database $instance;

    private function __construct() {}

    public static function getInstance(): Database
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    // Other database methods
}

$db1 = Database::getInstance();
$db2 = Database::getInstance();

var_dump($db1 === $db2); // true


/**
 * In this example, the Database class implements the Singleton pattern.
 * The getInstance method is used to get the single instance of the class and ensure that only one instance of the class is created.
 * The client code always uses the same instance of the class, regardless of where it is used in the application.
 */
