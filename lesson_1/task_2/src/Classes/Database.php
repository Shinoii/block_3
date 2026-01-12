<?php
namespace App\task2\Classes;

use PDO;
use PDOException;

class Database
{
    private string $host = 'localhost';
    private string $name = 'my_database';
    private string $username = 'root';
    private string $password = '';
    private PDO $pdo;

    public function connect(): string
    {
        try{
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->name;charset=utf8", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return 'Подключение успешно';
        } catch(PDOException $exception){
            return 'Ошибка подключения: ' . $exception->getMessage();
        }
    }
    public function getUsers(): array
    {
        return $this->pdo->query('SELECT * FROM `users`')->fetchAll();
    }
}