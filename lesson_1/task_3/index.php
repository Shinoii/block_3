<?php
require 'vendor/autoload.php';

use App\task3\Classes\Database;

//  Задание 3: Добавление данных (INSERT)
//  Задача:
//  Написать метод addUser($name, $email), который добавляет нового пользователя в таблицу users.
//  Проверка:

$db = new Database();
$db->connect();
$db->addUser("Иван2", "ivan@example.com");
print_r($db->getUsers());

// ✅ В списке появился "Иван"