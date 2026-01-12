<?php
require 'vendor/autoload.php';
use App\Classes\Database;

//  Задание 1: Установка соединения с БД
//  Задача:
//  Создать класс Database, который устанавливает соединение с MySQL через PDO.
//  Проверка:

$db = new Database();
echo $db->connect();

// ✅ "Подключение успешно"