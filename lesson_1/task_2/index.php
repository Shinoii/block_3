<?php
require 'vendor/autoload.php';

use App\task2\Classes\Database;

// Задание 2: Выполнение SELECT-запроса
// Задача:
// Написать метод getUsers(), который извлекает всех пользователей из таблицы users.
// Проверка:

$db = new Database();
$db->connect();
print_r($db->getUsers());

// ✅ Выводит массив пользователей из БД