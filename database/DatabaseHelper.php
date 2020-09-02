<?php

class DatabaseHelper
{
    private const DSN = 'mysql:dbname=sql12363087;host=sql12.freemysqlhosting.net';
    private const USER = 'sql12363087';
    private const PASSWORD = 'y9fDDGWheS';

    protected $databasePDO;

    public function __construct()
    {
        $this->databasePDO = new PDO(self::DSN, self::USER, self::PASSWORD);
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
        return $this->databasePDO->query($sql, PDO::FETCH_NUM);
    }
}