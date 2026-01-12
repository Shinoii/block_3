<?php
use App\Entity\User;

require 'vendor/autoload.php';
require_once __DIR__ . '/bootstrap.php';

//  Задание 4: Использование репозитория (Doctrine)
//  Задача:
//  Создать UserRepository, который содержит метод findByEmail($email).
//  Проверка:

try{
    $userRepository = $entityManager->getRepository(User::class);
    $user = $userRepository->findByEmail("anna@example.com");
    print_r($user);
} catch (Exception $exception){
    echo $exception->getMessage();
}
// ✅ Выводит данные пользователя Иван