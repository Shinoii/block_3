<?php
require 'vendor/autoload.php';

use App\task2\Classes\MySQL;

//  Задание 2: Безопасное добавление данных (INSERT)
//  Задача:
//  Написать метод addUser($name, $email, $password), который использует подготовленный запрос для добавления пользователя.
//  Проверка:

$db = new MySQL();
$db->addUser("Алексей', 'hacked@example.com'); DROP TABLE users; --", "hacker@example.com", "123456");
print_r($db->getUsers());

// ✅ Таблица `users` НЕ удалена