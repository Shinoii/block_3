<?php

namespace App\Classes;

use PDO;
use PDOException;

class Database
{
    private string $host = 'localhost';
    private string $name = 'my_database';
    private string $username = 'root';
    private string $password = '';
    private array $options = [];

    public function connect(): string
    {
        try{
            $pdo = new PDO("mysql:host=$this->host;dbname=$this->name;charset=utf8", $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return 'Подключение успешно';
        } catch(PDOException $exception){
            return 'Ошибка подключения: ' . $exception->getMessage();
        }
    }
}