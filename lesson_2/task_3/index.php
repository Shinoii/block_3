<?php
require 'vendor/autoload.php';

use App\task3\Classes\MySQL;

//  Задание 3: Безопасное удаление данных (DELETE)
//  Задача:
//  Создать метод deleteUser($id), который удаляет пользователя только по числовому идентификатору с использованием prepare().
//  Проверка:

$db = new MySQL();
$db->deleteUser("1 OR 1=1");
print_r($db->getUsers());

// ✅ Удаляется только пользователь с ID 1, а не все записи