<?php
require 'vendor/autoload.php';

use App\task1\Classes\MySQL;

//  Задание 1: Использование подготовленных запросов (prepare, execute)
//  Задача:
//  Написать метод getUserByEmail($email), который извлекает пользователя по email с использованием подготовленных запросов.
//  Проверка:
$db = new MySQL();
print_r($db->getUserByEmail("ivan@example.com"));
// ✅ Выводит данные пользователя

$db->getUserByEmail("hacker@example.com' OR 1=1 --");
// ✅ Не должно возвращать всех пользователей