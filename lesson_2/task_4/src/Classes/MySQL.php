<?php
namespace App\task4\Classes;

use App\task4\Traits\PasswordBuilder;
use App\task4\Traits\ResponseBuilder;
use PDO;
use PDOException;

class MySQL
{
    use ResponseBuilder, PasswordBuilder;
    private string $host = 'localhost';
    private string $name = 'my_database';
    private string $username = 'root';
    private string $password = '';
    private PDO $pdo;
    public function __construct()
    {
        $this->connect();
    }
    private function connect(): string
    {
        try{
            $this->pdo = new PDO(
                "mysql:host=$this->host;dbname=$this->name;charset=utf8", $this->username, $this->password
            );
            $this->setAttribute();
            return $this->getResponse('Подключение успешно', true, 200);
        } catch(PDOException $exception){
            return $this->getResponse('Ошибка подключения: ' . $exception->getMessage(), false, 500);
        }
    }
    public function getUsers(): string
    {
        try{
            $sql = "SELECT * FROM users";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();

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
    public function addUser(string $name, string $email, string $password): string
    {
        try{
            $this->hashPassword($password);
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);

            $stmt->execute();
            return $this->getResponse('Пользователь создан', true, 201);
        } catch(PDOException $exception){
            return $this->getResponse(
                'Ошибка при создании пользователя: ' . $exception->getMessage(),false, 500
            );
        }
    }
    public function deleteUser(int $id): string
    {
        try{
            $sql = "DELETE FROM users WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                'id' => $id
            ]);
            return $this->getResponse("Пользователь с id = $id удален", true, 200);
        } catch(PDOException $exception){
            return $this->getResponse(
                'Ошибка при удалении пользователя: ' . $exception->getMessage(), false, 500
            );
        }
    }
    public function getUserByEmail(string $email): string
    {
        try{
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch();
            if(empty($result)){
                return $this->getResponse('Пользователь не найден', true ,200);
            }
            return $this->getResponse($result, true, 200);
        } catch (PDOException $exception){
            return $this->getResponse(
                'Ошибка: ' . $exception->getMessage(), false, 500
            );
        }
    }

    private function setAttribute(): void
    {
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
}