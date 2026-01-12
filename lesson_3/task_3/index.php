<?php
use App\Entity\User;

require 'vendor/autoload.php';
require_once __DIR__ . '/bootstrap.php';

//  Задание 3: Doctrine – создание сущности
//  Задача:
//  Создать сущность UserController в Doctrine с атрибутами id, name, email.
//  Проверка:

try{
    $user = new User();
    $user->setName("Анна");
    $user->setEmail("anna@example.com");
    $entityManager->persist($user);
    $entityManager->flush();
} catch(\Exception $e) {
    echo $e->getMessage();
}

// ✅ Пользователь добавлен в БД