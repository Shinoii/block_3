<?php
require 'vendor/autoload.php';

use App\task5\Classes\MySQL;

//  Задание 5: Ограничение ввода данных (валидация)
//  Задача:
//  Добавить валидацию email перед выполнением запроса в getUserByEmail(), чтобы проверять, что переданный email имеет корректный формат.
//  Проверка:
$db = new MySQL();
echo $db->getUserByEmail("неправильный_адрес");

// ✅ Должна быть ошибка "Неверный формат email"