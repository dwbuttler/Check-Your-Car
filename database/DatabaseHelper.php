<?php

class DatabaseHelper
{
    private const HOST = 'sql12.freemysqlhosting.net';
    private const USER = 'sql12363087';
    private const PASSWORD = 'y9fDDGWheS';

    protected $databasePDO;

    public function __construct()
    {
        $this->databasePDO = new PDO(self::HOST, self::USER, self::PASSWORD);
    }

    public function insert(string $sql): int
    {
        return $this->databasePDO->exec($sql);
    }

    public function update(string $sql): int
    {
        return $this->databasePDO->exec($sql);
    }

    public function delete(string $sql): int
    {
        return $this->databasePDO->exec($sql);
    }

    public function select(string $sql): PDOStatement
    {
        return $this->databasePDO->query($sql);
    }
}