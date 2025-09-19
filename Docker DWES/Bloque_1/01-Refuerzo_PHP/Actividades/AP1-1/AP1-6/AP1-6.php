<?php
Class Database
{
    private const SERVER = "mariadb-server";
    private const USERNAME = "root";
    private const PASS = "root";
    private const DB = "AP1";
    private mysqli $connect;

    public function __construct()
    {
        try {
            $this->connect = new mysqli(self::SERVER, self::USERNAME, self::PASS, self::DB);
            echo "Conexion con exito" . "<br>";
        } catch (mysqli_sql_exception $e) {
            die ($e->getMessage());

        }
    }
}

