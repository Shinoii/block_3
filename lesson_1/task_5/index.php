<?php
require 'vendor/autoload.php';

use App\task5\Classes\Database;

//  Задание 5: Удаление данных (DELETE)
//  Задача:
//  Создать метод deleteUser($id), который удаляет пользователя по ID.
//  Проверка:
$db = new Database();
$db->connect();
$db->deleteUser(1);
print_r($db->getUsers());

// ✅ Пользователь с ID 1 удален