<?php

declare(strict_types=1);

/*
 * This file is part of the "Advertisements Manager" project.
 *
 * (c) 2020 - crolland.fr
 */

namespace AdvertisementsManagerApp;

/**
 * Class DatabaseManager
 *
 * This class init the database connection and interact with the different tables.
 *
 * @author Rolland Csatari <rolland.csatari@gmail.com>
 */
class DatabaseManager
{
    /* Database config. */
    const DATABASE_HOST = 'db';
    const DATABASE_PORT = 'advertisements_manager';
    const DATABASE_NAME = 'advertisements_manager';
    const DATABASE_USER = 'advertisements_manager';
    const DATABASE_PASS = 'advertisements_manager';

    /**
     * @var \PDO
     */
    private $databaseConnection;

    public function __construct()
    {
        /* Build the DSN. */
        $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;charset=utf8',
            static::DATABASE_HOST,
            static::DATABASE_PORT,
            static::DATABASE_NAME
        );

        /* Init database connection */
        $this->databaseConnection = new \PDO($dsn, static::DATABASE_USER, static::DATABASE_PASS);
        $this->databaseConnection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    /**
     * This method fetch the list of users from database..
     */
    public function fetchUserList(): array
    {
        $statement = $this->databaseConnection->prepare('SELECT * FROM users');
        $statement->execute();

        return $statement->fetchAll();
    }

    /**
     * This method fetch the list of advertisement from database.
     */
    public function fetchAdvertisementList(): array
    {
        $statement = $this->databaseConnection->prepare('SELECT advertisements.title as advertisement_title, users.name as user_name FROM advertisements INNER JOIN users ON users.id = advertisements.user_id');
        $statement->execute();

        return $statement->fetchAll();
    }
}
