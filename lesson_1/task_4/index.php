<?php
require 'vendor/autoload.php';

use App\task4\Classes\Database;

//  Задание 4: Защита от SQL-инъекций (Prepared Statements)
//  Задача:
//  Использовать подготовленные запросы (prepare, execute) в методе addUser(), чтобы предотвратить SQL-инъекции.
//  Проверка:

$db = new Database();
$db->connect();
$db->addUser("Алексей', 'hacked@example.com'); DROP TABLE users; --", "hacker@example.com");
print_r($db->getUsers());

// ✅ Таблица `users` НЕ удалена