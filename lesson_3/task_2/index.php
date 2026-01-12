<?php
require 'config.php';
require_once 'vendor/autoload.php';

use App\Models\Database;
use App\Models\User;
use App\Models\Post;

$db = new Database();

//  Задание 2: Работа с отношениями (Eloquent)
//  Задача:
//  Создать модель Post, которая связана с UserController (отношение один ко многим).
//  Реализовать метод user() в Post, который возвращает автора поста.
//  Проверка:

$post = Post::find(1);
echo $post->user->name;

// ✅ Выводит имя автора поста