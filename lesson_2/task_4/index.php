<?php
require 'vendor/autoload.php';

use App\task4\Classes\MySQL;

//  Задание 4: Экранирование данных (bindParam, bindValue)
//  Задача:
//  В методах getUserByEmail() и addUser() использовать bindParam() или bindValue(), чтобы убедиться, что переменные корректно экранируются.
//  Проверка:

$db = new MySQL();
$db->addUser("Oleg", "oleg@example.com", "password");
print_r($db->getUserByEmail("oleg@example.com"));

// ✅ Пользователь найден, SQL-инъекция невозможна