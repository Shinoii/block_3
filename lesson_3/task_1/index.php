<?php
require 'config.php';
require_once 'vendor/autoload.php';

use App\Models\Database;
use App\Models\User;

$db = new Database();

//  Задание 1: Создание модели (Eloquent)
//  Задача:
//  Создать модель UserController, которая будет соответствовать таблице users.
//  Добавить атрибуты: name, email, password.
//  Проверка:

try{
    $user = new User();
    $user->name = "Иван";
    $user->email = "ivan@example.com";
    $user->password = password_hash("password", PASSWORD_BCRYPT);
    $user->save();
} catch (Exception $e) {
    echo 'Ошибка: ' . $e->getMessage();
}

// ✅ Данные сохранены в базе