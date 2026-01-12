<?php
namespace App\task3\Classes;

use App\task3\Traits\ResponseBuilder;
use PDO;
use PDOException;

class Database
{
    use ResponseBuilder;
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
            return $this->getResponse('Подключение успешно', true, 200);
        } catch(PDOException $exception){
            return $this->getResponse('Ошибка подключения: ' . $exception->getMessage(), false, 500);
        }
    }
    public function getUsers(): string
    {
        try{
            $result = $this->pdo->query('SELECT * FROM `users`')->fetchAll();
            if(empty($result)){
                return $this->getResponse('Данные пользователей не найдены', true, 204);
            }
            return $this->getResponse($result, true, 200);
        } catch(PDOException $exception){
            return $this->getResponse(
                'Ошибка получения данных пользователей: ' . $exception->getMessage(),false, 500
            );
        }
    }
    public function addUser(string $name, string $email): string
    {
        try{
            $sql = "INSERT INTO `users` (`name`, `email`) VALUES ('$name', '$email')";
            $this->pdo->query($sql);
            return $this->getResponse('Пользователь создан', true, 201);
        } catch(PDOException $exception){
            return $this->getResponse(
                'Ошибка при создании пользователя: ' . $exception->getMessage(),false, 500
            );
        }
    }
}